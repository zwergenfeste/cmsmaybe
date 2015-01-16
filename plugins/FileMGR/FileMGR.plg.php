<?php

class FileMGR extends Core 
{
    public $auth = TRUE;
    public $role = 'admin';

    // returns a json message ether successful or failure.
    private static function msg($status, $msg) 
    {
        return json_encode(array('status' => $status,'msg' => $msg));
    }

    // returns human readable filesize
    private function human_readable($bytes, $decimals = 2) 
    {
    	$sz = 'BKMGTP';
    	$factor = floor((strlen($bytes) - 1) / 3);

    	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }

    // builds human readable unix style permission string (taken from php.net)
    private function unix_perm_string($perms) 
    {
    	if (($perms & 0xC000) == 0xC000) {
    	    // Socket
    	    $info = 's';
    	} elseif (($perms & 0xA000) == 0xA000) {
    	    // Symbolic Link
    	    $info = 'l';
    	} elseif (($perms & 0x8000) == 0x8000) {
    	    // Regular
    	    $info = '-';
    	} elseif (($perms & 0x6000) == 0x6000) {
    	    // Block special
    	    $info = 'b';
    	} elseif (($perms & 0x4000) == 0x4000) {
    	    // Directory
    	    $info = 'd';
    	} elseif (($perms & 0x2000) == 0x2000) {
    	    // Character special
    	    $info = 'c';
    	} elseif (($perms & 0x1000) == 0x1000) {
    	    // FIFO pipe
    	    $info = 'p';
    	} else {
    	    // Unknown
    	    $info = 'u';
    	}

	// Owner
	$info .= (($perms & 0x0100) ? 'r' : '-');
        $info .= (($perms & 0x0080) ? 'w' : '-');
        $info .= (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x' ) :
    	    (($perms & 0x0800) ? 'S' : '-'));

    	// Group
    	$info .= (($perms & 0x0020) ? 'r' : '-');
    	$info .= (($perms & 0x0010) ? 'w' : '-');
    	$info .= (($perms & 0x0008) ?
    	    (($perms & 0x0400) ? 's' : 'x' ) :
    	    (($perms & 0x0400) ? 'S' : '-'));

    	// World
    	$info .= (($perms & 0x0004) ? 'r' : '-');
    	$info .= (($perms & 0x0002) ? 'w' : '-');
    	$info .= (($perms & 0x0001) ?
    	    (($perms & 0x0200) ? 't' : 'x' ) :
    	    (($perms & 0x0200) ? 'T' : '-'));

	return $info;
    }

    // set save path and list files
    private function browse($path)
    {
	$dirs = Config::get('content_dirs');

	foreach($dirs as $dir)
	{
	    if($path == "")
	    {
		$files = $dirs;
		break;
	    }
	    
	    if(explode('/',$path)[0] == $dir)
	    {
		$files = scandir($path);
	    }	
	}

	return $files;
    }

    // Takes a given path and prints the content in json format.
    private function get_content($path) 
    {
	$files = array();
	$rd = array();
	$rf = array();

	$files = $this->browse($path);

        // get file infos
        foreach ($files as $k => $v) 
	{
	    if($v == '..' || $v == '.')
	    {
		continue;
	    }

	    if($path != '')
	    {
	        $v = $path.'/'.$v;
	    }

	    $i = array (
                    'name' => end(explode('/',$v)),
                    'link' => $v,
		    'size' => '---',
                    'date' => date('Y-m-d H:i:s', filemtime($v)),
                    'perm' => $this->unix_perm_string(fileperms($v)),
                    'folder' => False
	    );

            if(is_dir($v)) 
	    {
		$i['folder'] = True;

                $rd[] = $i;
            } 
	    else 
	    {
                $i['size'] = $this->human_readable(filesize($v));

                $rf[] = $i;
            }
        }

	// list folders before files
	$result = array_merge($rd,$rf);

        return json_encode(array('status' => 'ok', 'files' => $result));
    }

    // gives back an allowed path
    private function check_path($path)
    {
	$dirs = Config::get('content_dirs');

	if(strpos($path,'../'))
	{
	    return FALSE;
	}
	elseif(in_array(explode('/',$path)[0],$dirs))
	{
	    return $path;
	}

	return FALSE;
    }

    // creates a new folder and returns a message.
    private function create_folder($path) 
    {
        if(is_dir($path))
            return self::msg(False, "folder $path already exists");

        if(!is_writable(pathinfo($path, PATHINFO_DIRNAME)))
            return self::msg(False, "target folder not writable");

        if(file_exists($path))
            return self::msg(False, "file $path already exists");

        if(!@mkdir($path))
            return self::msg(False, "could not create $path");

        return self::msg(True, "folder created");
    }

    // creates a new empty file and returns a message.
    private function create_file($path) 
    {
        if(is_dir($path))
            return self::msg(False, "folder $path already exists");

        if(!is_writable(pathinfo($path, PATHINFO_DIRNAME)))
            return self::msg(False, "target folder not writable");

        if(file_exists($path))
            return self::msg(False, "file $path already exists");

        if(@file_put_contents($path, '') === false)
            return self::msg(False, "could not create $path");

        return self::msg(True, "empty file created");
    }

    // removes target and returns a message.
    private function remove($path) 
    {
        if(!file_exists($path))
            return self::msg(False, "$path does not exist");

        if(!is_writable($path))
            return self::msg(False, "$path is not writable");

        if(is_dir($path))
            $res = @rmdir($path);
        else
            $res = @unlink($path);

        if($res === False)
            return self::msg(False, "$path has not been removed");

        return self::msg(True, "$path has been removed");
    }

    // move target file from src to dst, returns a message.
    private function move($src, $dst) 
    {
        if(!file_exists($src))
            return self::msg(False, 'source file / folder does not exist');

        if(file_exists($dst))
            return self::msg(False, 'destination file / folder already exists');

        if(!file_exists(pathinfo($dst, PATHINFO_DIRNAME)))
            return self::msg(False, 'destination path does not exist');

        if(!is_writable($src))
            return self::msg(False, 'source file / folder is not writable');

        if(!is_writable(pathinfo($dst, PATHINFO_DIRNAME)))
            return self::msg(False, 'destination path is not writable');

        if(!@rename($src, $dst))
            return self::msg(False, 'file / folder was not moved');

        return self::msg(True, 'moved file / folder');
    }

    // receive uploaded files and process them, return a message afterwards.
    private static function upload($path,$files) 
    {
        // check for upload
        if(count($files) == 0)
	{
            return self::msg(False, 'no files uploaded');
	}

	// restructure
	$farr = array();
        foreach ($_FILES['files']['name'] as $n => $v) 
	{
            $farr[$n] = array(
                'name'     => $_FILES['files']['name'][$n],
                'type'     => $_FILES['files']['type'][$n],
                'tmp_name' => $_FILES['files']['tmp_name'][$n],
                'error'    => $_FILES['files']['error'][$n],
                'size'     => $_FILES['files']['size'][$n]
            );
        }
	$files = $farr;

	// check if dest is writable
	if (!is_writable($path))
	{
	    return self::msg(False, 'target '.$path.' is not writable');
	}

        // check upload status
	$MSG = "";
        foreach ($files as $f) 
	{
            if($f['error'] > 0)
	    {
                $MSG .= self::msg(False, 'File '.$f['name'].' not uploaded ('.$f['error'].')');
		continue;
	    }

	    if(file_exists($path.'/'.$f['name']))
	    {
                $MSG .= self::msg(False, 'File '.$f['name'].' already exists');
		continue;
	    }

            if (!move_uploaded_file($f['tmp_name'], $path.'/'.$f['name']))
	    {
                $MSG .= self::msg(False, $f['name'].' was not stored');
		continue;
	    }

	    $MSG .= self::msg(True, 'File '.$f['name'].' uploaded successfully');
        }

        return $MSG;
    }

    // save file contents and return a message.
    private static function save($path,$content) 
    {
        if(@file_put_contents($path,"$content") === false)
	{
            return self::msg(False, 'could not write file');
	}

        return self::msg(True, 'file '.$path.' saved');
    }

    public function from_router($route)
    {
	if($route['URI'] == 'filemgr' && $route['method'] == 'GET')
	{
	    // add placeholder at the end to make things load faster... or something like this
	    Content::add("[TEMPLATE]","</head>","\t<link rel='stylesheet' href='".$this->path.$this->name.".css'>\n\t",0);
	    Content::add("[TEMPLATE]","</head>","\t<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>\n\t",0);
	    Content::add("[TEMPLATE]","</head>","\t<link rel='stylesheet' href='".$this->path."summernote/summernote.css'>\n\t",0);
	    Content::add("[TEMPLATE]","</body>","\t<script type='text/javascript' src='".$this->path."summernote/summernote.min.js'></script>\n\t",0);
	    Content::add("[TEMPLATE]","</body>","\t<script type='text/javascript'>var baseurl = '".Config::get('basedir')."';</script>\n\t",0);
	    Content::add("[TEMPLATE]","</body>","\t\t<script type='text/javascript' src='".$this->path.$this->name.".js'></script>\n\t",0);
	    Content::add("[TEMPLATE]","</body>","\t<script type='text/javascript'>browse('');var baseurl = '".Config::get('basedir')."';</script>\n\t",0);

	    return $this->output();
	}
	else
	{
	    $arg = $route['RES']['PROC'];
	    $path = $route['RES']['ARG'];

	    header('Content-Type: text/plain; charset=utf-8');

	    if($arg == 'browse')
	    {
		echo $this->get_content($path);
		exit;
	    }

	    if(!$path = $this->check_path($path))
	    {
            	echo self::msg(False,'path is not allowed or within basefolders');
		exit;
	    }

            if($arg == 'folder' && $route['method'] == 'POST')
	    {
		echo $this->create_folder($path);
	    }
            elseif($arg == 'file' && $route['method'] == 'POST')
	    {
		echo $this->create_file($path);
	    }
            elseif($arg == 'move')
	    {
		if(!$dest = $this->check_path(Browser::get_r('dest')))
		{
		    echo self::msg(False,'destination is not allowed or within basefolders');
		    exit;
		}

		echo $this->move($path,$dest);
	    }
            elseif($arg == 'upload' && $route['method'] == 'POST')
	    {
                echo $this->upload($path,$_FILES);
	    }
            elseif($arg == 'edit' && $route['method'] == 'GET')
	    {
                echo self::msg(True,file_get_contents($path));
	    }
            elseif($arg == 'save' && $route['method'] == 'POST')
	    {
                echo $this->save($path,$_POST['content']);
	    }
	    elseif($arg == 'remove' && $route['method'] == 'DELETE')
	    {
		echo $this->remove($path);
	    }
            else
	    {
                echo self::msg(False, 'unknown type');
	    }

	    exit;
	}
    }

    public function from_main()
    {
	// set the routes
	Config::addRoute('filemgr/{PROC}/{ARG}','POST','CLASS','FileMGR');
	Config::addRoute('filemgr/{PROC}/{ARG}','GET','CLASS','FileMGR');
	Config::addRoute('filemgr/{PROC}/{ARG}','DELETE','CLASS','FileMGR');
	Config::addRoute('filemgr','GET','CLASS','FileMGR');
    }

    // return the html part
    private function output()
    {
	return $output = '
<div id="browser">
    <div class="well-sm" id="tools">
	<a class="btn btn-default" id="upload-button"><i class="fa fa-upload"></i> Upload</a>
	<a class="btn btn-default" id="new-file-button"><i class="fa fa-file"></i> New File</a>
	<a class="btn btn-default" id="new-folder-button"><i class="fa fa-folder"></i> New folder</a>
	<a class="btn btn-default" id="refresh-button"><i class="fa fa-refresh"></i> Refresh</a>
	<a class="btn btn-default" id="clear-msgbox-button"><i class="fa fa-times-circle"></i> Clear Messages</a>
    </div>

    <ol class="breadcrumb" id="breadcrumb"></ol>

    <table class="table table-hover table-condensed" id="filemanager"></table>
</div>

<div id="editor" style="display: none;">
    <div class="ed-btns">
        <input type="hidden" name="target" id="editor-target" />
	<a class="ed-submit btn btn-default"><i class="fa fa-save"></i> Save</a>
	<a class="ed-close btn btn-default"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
</div>

<!-- progress bar -->
<div id="progress" class="progress progress-striped active">
    <div class="progress-bar progress-bar-success bar"></div>
</div>

<!-- message box -->
<div id="msgbox"></div>

<!-- new modal -->
<div id="new" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>New</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" id="new-type" />
                <label for="new-path">Entry new file / folder name</label>
                <input type="text" class="form-control" id="new-path" />
            </div>
            <div class="modal-footer">
                <a class="submit btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></a>
                <a class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- move modal -->
<div id="move" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Move / Rename</h3>
            </div>
            <div class="modal-body">
                <label for="move-src">From</label>
                <input type="text" class="form-control" id="move-src" />
                <label for="move-dst">To</label>
                <input type="text" class="form-control" id="move-dst" />
            </div>
            <div class="modal-footer">
                <a class="submit btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></a>
                <a class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- remove modal -->
<div id="remove" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Remove</h3>
            </div>
            <div class="modal-body">
                <label for="remove-path">Remove this file / folder</label>
                <input type="text" class="form-control" id="remove-path" disabled />
                <p class="help-block">Only empty directories can be removed.</p>
            </div>
            <div class="modal-footer">
                <a class="submit btn btn-danger" data-dismiss="modal"><i class="fa fa-check"></i></a>
                <a class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- upload modal -->
<div id="upload" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Upload</h3>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="upload" />
                    <input type="hidden" name="path" id="upload-path" />
                    <input type="file" name="files[]" multiple />
                    <p class="help-block">You can select multiple files.</p>
                </form>
            </div>
            <div class="modal-footer">
                <a class="submit btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i></a>
                <a class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i></a>
            </div>
        </div>
    </div>
</div>
';
    }
}

?>
