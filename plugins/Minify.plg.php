<?php

class Minify extends Core
{
    // don't cache, always generate
    private $onthefly = 1;
    // put the files together but without any replacement
    private $dontreplace = 1;
    private $expiretime = 9000;
    private $tmpdir = '/tmp/';
    private $css_files = array();
    private $js_files = array();

    function __construct()
    {
	$this->css_files = array( Config::get('theme_folder').'/Treefault/prism/prism.css',
				  Config::get('theme_folder').'/Treefault/bootstrap/bootstrap.min.css',
				  Config::get('theme_folder').'/Treefault/Treefault.css',
				  Config::get('theme_folder').'/'.Config::get('theme').'/'.Config::get('theme').'.css');

	$this->js_files = array( Config::get('theme_folder').'/Treefault/jquery/jquery-1.11.0.min.js',
				 Config::get('theme_folder').'/Treefault/jquery/toc.min.js',
				 Config::get('theme_folder').'/Treefault/prism/prism.js',
				 Config::get('theme_folder').'/Treefault/bootstrap/bootstrap.min.js',
				 Config::get('theme_folder').'/Treefault/Treefault.js',
				 Config::get('theme_folder').'/'.Config::get('theme').'/'.Config::get('theme').'.js');
    }

    private function getmincnt($t_arr)
    {
	$buffer = '';

	foreach($this->$t_arr as $file)
	{
	    $buffer .= Content::getFromFile($file);
	}

	if($this->dontreplace == 0)
	{
	    // Remove comments
	    $buffer = preg_replace('/^#.*/','',preg_replace('#//.*#','',preg_replace('#/\*(?:[^*]*(?:\*(?!/))*)*\*/#','',($buffer))));
	
	    // Remove space after colons
	    $buffer = str_replace(': ', ':', $buffer);

	    // Remove whitespace
	    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", ' ', ' ', ' '), '', $buffer);
        }

	return $buffer;
    }

    // set expiration header or delete file
    private function expire($file = '')
    {
	if($file == '')
	{
	    $modtime = time()+$this->expiretime;
	}
	else
	{
	    $modtime = filemtime($file)+$this->expiretime;
	    
	    if($modtime < time())
	    {
		unset($file);
		return FALSE;
	    }
	}

	header('Expires: '.gmdate('D, d M Y H:i:s', $modtime).' GMT');
	return TRUE;
    }

    function from_router($route)
    {
	$req = $route['RES']['FILE'];
	$type = substr($req,strrpos($req,'.')+1);
	$t_arr = $type.'_files';
	$tmpfile = $this->tmpdir."$req";

	// enable GZip encoding
	ob_start('ob_gzhandler');

	// set the MIME type
	if($type == 'css')
	{
	    header('Content-type: text/css');
	}
	elseif($type == 'js')
	{
	    header('Content-type: application/javascript');
	}

	if(Config::get('minify_onthefly') != '')
	{
	    $this->onthefly == Config::get('minify_onthefly');
	}

	if($this->onthefly == 0)
	{
	    if(file_exists($tmpfile) && $this->expire($tmpfile))
	    {
		if(Config::wasModified($tmpfile))
		{
	            echo Content::getFromFile($tmpfile);
		}

		exit;
	    }
	    else
	    {
		$cnt = $this->getmincnt($t_arr);

		file_put_contents($tmpfile,$cnt);

		$this->expire();

		echo $cnt;
		exit;
	    }
	}

	$this->expire();

	echo $this->getmincnt($t_arr);
	exit;
    }

    function from_main()
    {
	Config::addRoute('minify/{FILE}','GET','CLASS','Minify');
    }
}

?>
