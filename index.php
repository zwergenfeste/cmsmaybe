<?php
##############################################################
### vars you want to change
##############################################################
#
# site title
#
$configs['sitetitle'] = "CMSMayBe";

#
# default page - page to load first
#
$configs['default_page'] = "Home";

#
# template folder and .tpl file name
#
$configs['theme'] = "AutumnTree";

#
# default language
#
$configs['default_lang'] = "en";

#
# menu stuff
#
# configuration of menu and it's css classes
#
# return menu as nested divs instead of ul-list
$configs['div_menu'] = "no";
#
# return multiple menus. each top-level in its own ul-list or div
$configs['multiple_menus'] = "yes";
#
# nav_menu_act: set the css class of the selected menu top level: ul or div
$configs['nav_menu_act'] = "nav navbar-nav active";
# nav_menu: set the css class of the not selected menu
$configs['nav_menu'] = "nav navbar-nav";
# nav_act: the active class for link: li, div or a (a only if has no submenu)
$configs['nav_act'] = "active";
# nav_link_cls: add link class: li
$configs['nav_link_cls'] = "";
# nav_lnkt_st: thing you put in front of each link-text: inside span
$configs['nav_lnkt_st'] = "";
# nav_lnkt_en: thing you put in after of each link-text: inside span
$configs['nav_lnkt_en'] = "";
# nav_lvl1_cls: class for first level link if it has sublevel: li or div
$configs['nav_lvl1_cls'] = "dropdown";
# nav_lvl+_cls: class for all other link levels if have sublevels: li or div
$configs['nav_lvl+_cls'] = "dropdown-submenu";
# nav_subl_cls: class for sublevel: ul or div
$configs['nav_subl_cls'] = "dropdown-menu";
# nav_subl_lnk_en: thing you put in after a link-text if it has a sublevel: a
$configs['nav_subl_lnk_en'] = "";
# nav_subl_lnkt_cls: class for a link-text if it has a sublevel: a
$configs['nav_subl_lnkt_cls'] = "";
# nav_lnkt_ao: additional attribute you want to set for a link-text if has sublevel: a
# e.g.: $configs['nav_lnkt_ao'] = "data-toggle='dropdown'";
$configs['nav_lnkt_ao'] = "";
# nav_lnkt_cls: class for link-text if no sublevel: a
$configs['nav_lnkt_cls'] = "";

#
# SSL
#
# use HTTPS - force redirects to https
#
$configs['SSL'] = 'yes';

##############################################################
### vars you don't need to change
##############################################################

#
# logo
#
$configs['logo'] = "logo.png";

#
# static routes
#
# routes for accessing plugin-stuff
# static routes overwrite all other routes
# fields:
# 0 = URI, e.g. /some/route 
# 1 = HTTP method, e.g. GET,POST... 
# 2 = destination (file or class name)
#     file: a file gets included and the return is but to content
#     class: the return of method from_router is but to content
# 3 = other stuff to submit
#
$configs['static_routes'] = array(
#        array('URI' => 'TEST', 'method' => 'GET', 'CLASS' => 'TEST', 'OPTS' => 'Hello,World'),
);

#
# language subfolders
#
# if set to yes, it is expected that there are browser-style language
# folders in both content base folders (content,protected).
#
# default: $config['lang_subfolders'] = "no";
$configs['lang_subfolders'] = "no";

#
# role based protected folders
#
# when activated, role named subfolders in protected_folder are searched 
# and access is only granted to subfolders named like account roles
#
# default: $configs['role_based'] = "no";
$configs['role_based'] = "yes";

#
# plugin folder
#
# folder where the plugins are
#
# default: $configs['plugin_folder'] = "plugins";
$configs['plugin_folder'] = "plugins";

#
# protected content folder
#
# folder where... ah.. you know
#
# default: $configs['protected_folder'] = "protected";
$configs['protected_folder'] = "protected";

#
# content folder
#
# default: $configs['content_folder'] = "content";
$configs['content_folder'] = "content";

#
# theme folder
#
# default: $configs['theme_folder'] = "themes";
$configs['theme_folder'] = "themes";

#
# site under construction - SUC
#
# set this to yes if you want to activate the SUC template
# if set to yes only the SUC page is shown
#
# default: $configs['site_under_construction'] = "no";
$configs['site_under_construction'] = "no";

#
# SUC page template name extension
#
# name extension of the template file for the SUC page
# works only if $site_under_construction is set to yes
#
# default: $configs['SUC_page_tpl_add'] = "_suc";
$configs['SUC_page_tpl_add'] = "_suc";

#
# titlepage template name extension
#
# name extension of the template file for the titlepage
# if the file exists an no resource is called, this template is shown
#
# default: $configs['title_page_tpl_add'] = "_titlepage";
$configs['title_page_tpl_add'] = "_titlepage";

#
# plugin file extension
#
# default: $configs['plugin_file_ext'] = ".plg.php";
$configs['plugin_file_ext'] = ".plg.php";

#
# theme file extension
#
# default: $configs['theme_extension'] = ".tpl";
$configs['theme_extension'] = ".tpl";

#
# editor extension
#
# the extensions (comma seperated list) of your editors cache file which 
# should not be misstaken for a language extension.
#
# default: $configs['editor_extension'] = ".swp";
$configs['editor_extension'] = ".swp";

#
# content file extension
#
# default: $content_file_extension = ".txt";
$configs['content_file_extension'] = ".txt";

#
# default theme
#
# this theme is used if the defined theme can't be loaded
#
# default: $configs['default_theme'] = "<!DOCTYPE html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1'><title>[TITLE]</title><meta http-equiv='X-UA-Compatible' content='IE=edge' /></head><body><header><!-- START HEADER -->[HEADER]<!-- END HEADER --><!-- START MSHINT -->[MSHINT]<!-- END MSHINT --></header><nav><!-- START MENU -->[MENU]<!-- END MENU --></nav><article><!-- START CONTENT -->[CONTENT]<!-- END CONTENT --><!-- START PAGESIGN -->[PAGESIGN]<!-- END PAGESIGN --></article><footer><!-- START PAGEOPTS -->[PAGEOPTS]<!-- END PAGEOPTS --><!-- START FOOTER -->[FOOTER]<!-- END FOOTER --></footer></body></html>";
$configs['default_theme'] = "<!DOCTYPE html><html><head><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1'><title>[TITLE]</title><meta http-equiv='X-UA-Compatible' content='IE=edge' /></head><body><header><!-- START HEADER -->[HEADER]<!-- END HEADER --><!-- START MSHINT -->[MSHINT]<!-- END MSHINT --></header><nav><!-- START MENU -->[MENU]<!-- END MENU --></nav><article><!-- START CONTENT -->[CONTENT]<!-- END CONTENT --><!-- START PAGESIGN -->[PAGESIGN]<!-- END PAGESIGN --></article><footer><!-- START PAGEOPTS -->[PAGEOPTS]<!-- END PAGEOPTS --><!-- START FOOTER -->[FOOTER]<!-- END FOOTER --></footer></body></html>";

#
# default content
#
# only shown if absolutly no content was found
#
# default: $configs['default_content'] = "<h1>It works!</h1><p>This is the default content for CMSMayBe.</p><p>CMSMayBe is running but no content has been added, yet.</p><p>If you need ideas what to do next, <a href='https://cmsmaybe.org/Documentation'>click here</a>";
$configs['default_content'] = "<h1>It works!</h1><p>This is the default content for CMSMayBe.</p><p>CMSMayBe is running but no content has been added, yet.</p><p>If you need ideas what to do next, <a href='https://cmsmaybe.org/Documentation'>click here</a>";

#
# menu file name
#
# A menu line looks like this:
# Level(asterisk/level) <a space> Menu Name|CSS-Class|Ressource(inter or extern)
# e.g.:
# * Home|home-btn|home
# ** News
# * Docs|docs-btn|home#docs
# * File|file-btn|http://some.where/file
# 
# default: $menufile = "._MENU_.txt";
$configs['menu_file'] = "._MENU_";

#
# default menu content
#
# menu content if no usable lines in the menu file could be found
#
# default: $configs['default_menu'] = "<ul><li><a href='https://cmsmaybe.org'><span>CMSMayBe</span></a></li><li><a href='https://github.com/zwergenfeste/cmsmaybe/archive/master.tar.gz'><span>Download</span></a></li></ul>";
$configs['default_menu'] = "<ul><li><a href='https://cmsmaybe.org'><span>CMSMayBe</span></a></li><li><a href='https://github.com/zwergenfeste/cmsmaybe/archive/master.tar.gz'><span>Download</span></a></li></ul>";

#
# page header
#
# default: $configs['header_file'] = "._HEADER_";
$configs['header_file'] = "._HEADER_";

#
# page sign file
#
# thing to put below content
#
# default: $configs['page_sign_file'] = "._PAGESIGN_";
$configs['page_sign_file'] = "._PAGESIGN_";

#
# page footer
#
# default: $configs['footer_file'] = "._FOOTER_";
$configs['footer_file'] = "._FOOTER_";

#
# page options
#
# the things (like socialnet-links) you want to put somewhere on each page
#
# default: $configs['page_options_file'] = "._PAGEOPTS_";
$configs['page_options_file'] = "._PAGEOPTS_";

#
# MSWarning 
#
# checks if agent runs Microsoft and returns contents of following file
#
# default: $configs['dont_use_ms'] = "yes";
$configs['dont_use_ms'] = "yes";
#
# default: $configs['mshint_file'] = "._MSWarning_";
$configs['mshint_file'] = "._MSWarning_";

#
# resource not found file
#
# default: $configs['resource_not_found'] = "404";
$configs['resource_not_found'] = "error/404";
#
# resource not found content if file not found
#
# default: $configs['rnf_error'] = "<br><br><div class='alert alert-danger' role='alert'><b>ERROR 404:</b> The requested resource [PAGE] does not exist!</div><br><br>\n";
$configs['rnf_error'] = "<br><br><div class='alert alert-danger' role='alert'><b>ERROR 404:</b> The requested resource [PAGE] does not exist!</div><br><br>\n";

#
# auth required file
#
# default: $configs['auth_required'] = "404";
$configs['auth_required'] = "error/401";
#
# auth required content if file not found
#
# default: $configs['are_error'] = "<br><br><div class='alert alert-danger' role='alert'><b>ERROR 401:</b> Authorization required for [PAGE]!</div><br>\n";
$configs['are_error'] = "<br><br><div class='alert alert-danger' role='alert'><b>ERROR 401:</b> Authorization required for [PAGE]!</div><br>\n";

#
# login form file
#
# default: $configs['login_file'] = "._AUTHFORM_";
$configs['login_file'] = "._AUTHFORM_";
#
# login form content if login file not exists
#
# default: $configs['lf_error'] = "<br><br><form action='[PAGE]/auth' method='post'>
#        [AUTHMSG]
#	<fieldset>
#	<input placeholder='Account' name='account' type='text' required>
#	<input placeholder='Password' name='password' type='password' required>
#	<input type='submit' value='Login'>
#	</fieldset>
#	</form><br><br>\n";
$configs['lf_error'] = "<br><br><form action='[PAGE]/auth' method='post'>[AUTHMSG]<fieldset><input placeholder='Account' name='account' type='text' required><input placeholder='Password' name='password' type='password' required><input type='submit' value='Login'></fieldset></form><br><br>\n";

#
# login text
#
# special text in menu to replace with users name
#
# default: $config['login_text'] = "Login";
$configs['login_text'] = "Login";

#
# auth error message file
#
# default: $configs['login_error_file'] = "._AUTHMSG_";
$configs['login_error_file'] = "._AUTHMSG_";
#
# if not found, display this
#
# default: $configs['lef_error'] = "<div class='alert alert-danger' role='alert'><b>ERROR:</b> username or password is invalid!</div>";
$configs['lef_error'] = "<div class='alert alert-danger' role='alert'><b>ERROR:</b> username or password is invalid!</div>";

#
# accounts file
#
# default: $configs['acc_file'] = "._ACCOUNTS_";
$configs['acc_file'] = "._ACCOUNTS_";

#
# page includes file
#
# place to define additional placeholders with content
# they can apear on all pages or just on defined ones
# includes can have per page and/or request changing content
# an entry looks like this:
# 
# [PLACEHOLDER]{Page,Page2}Some content#END#
#
# or
#
# [BANNERPLACEHOLDER]
# {*}
# Some content
# #AND#
# Some other text
# #END#
#
# default: $configs['includes_file'] = "._INCLUDES_";
$configs['includes_file'] = "._INCLUDES_";
#
# declaration of include delemiter
#
# default: $configs['includes_split'] = "#END#";
$configs['includes_split'] = "#END#";
#
# declaration of include contents delemiter
#
# default: $configs['includes_split_content'] = "#AND#";
$configs['includes_split_content'] = "#AND#";

#
# default plugin priority
#
# lower number means higher priority
#
# default: $configs['plugin_def_prio'] = "100";
$configs['plugin_def_prio'] = "100";

##############################################################
### classes
##############################################################

class Plugin extends Core
{
    private $order = array();

    // uasort number sort function
    private function sort($a, $b) 
    {
        if ($a == $b)
	{
            return 0;
        }

        return ($a < $b) ? -1 : 1;
    }

    // load file with classname $class
    private function autoloader($class)
    {
	$plgf = Config::get('plugin_folder').'/';

	// if class named folder exists add it to path
	if(is_dir($plgf.$class))
	{
	    $plgf .= $class.'/';
	}

	$file = $plgf.$class.Config::get('plugin_file_ext');

        if(file_exists($file))
	{
            require_once $file;
        }
    }

    // load classes and put them in array
    // classes are loaded local to class plugin
    private function load_all()
    {
    	spl_autoload_register(array($this,'autoloader'));

	$plgf = Config::get('plugin_folder');
	$basedir = Config::get('basedir');

	$plgf_ext = Config::get('plugin_file_ext');

	$list = array();

	if(is_dir($plgf))
	{
	    $files = array_diff(scandir($plgf), array('..', '.'));

	    foreach ($files as $f)
	    {
		$len = strlen($plgf_ext);

		if(substr($f, -$len) == $plgf_ext)
		{
		    $pf = '';
		    $clsname = substr($f, 0, -$len);
		}
		elseif(is_dir($plgf.'/'.$f))
		{
		    $pf = '/'.$f;
	            $clsname = $f;
		}

		if(isset($clsname))
		{
		    if(class_exists($clsname))
		    {
			$this->$clsname = new $clsname;
			$list[] = $clsname;

			// set some default properties
			$this->$clsname->name = $clsname;
			$this->$clsname->path = $basedir.$plgf.$pf.'/';
		    }
		}
	    }
	}

	return $list;
    }

    // sort classes array with priority
    private function build_order($list)
    {
	foreach ($list as $n)
	{
	    if(!isset($this->$n->priority))
	    {
		$this->$n->priority = Config::get('plugin_def_prio');
	    }

	    // the classnames are the array keys
	    $order[$n] = $this->$n->priority;
	}

	$list = $order;

	uasort($list,array($this,'sort'));

	return $list;
    }

    // check if auth or spec. role is needed for plugin and update auth paths
    private function auth_and_role($list)
    {
	$as = Config::$Auth->is();
	$roles = Config::get('account_role');
	$pf = Config::get('plugin_folder');
	$af = Config::get('to_auth');
	$a_list = array();

	foreach ($list as $n)
	{
	    if(isset($this->$n->auth))
	    {
		if($this->$n->auth != FALSE)
		{
		    // add path to auth paths
		    $af[] = $pf."/".$n;

		    // check if auth is ok
		    if($as != "auth_ok")
		    {
			continue;
		    }

		    // check if role is fitting
		    if(isset($this->$n->role))
		    {
			if(!in_array($this->$n->role,$roles))
			{
			    continue;
			}
		    }
		}
	    }

	    $a_list[] = $n;
	}

	// update array of protected folders
	Config::set('to_auth',$af);

	return $a_list;
    }

    // load classes method $meth
    private function call_classes($meth) 
    {
	// make sure all plugins are loaded
	if(count($this->order) == 0)
	{
	    $list = $this->load_all();
	    $list = $this->auth_and_role($list);

	    if(count($list) > 0)
	    {
		$this->order = $this->build_order($list);
	    }
	}

	// call all classes with method
	foreach ($this->order as $cls => $prio)
	{
	    if(method_exists($this->$cls, $meth))
	    {
		$this->$cls->$meth();
	    }
	}
    }

    // public loader for from_after_content
    public function from_after_content() 
    {
	$this->call_classes('from_after_content');
    }

    // public loader functions from_main
    public function from_main() 
    {
	$this->call_classes('from_main');
    }
}

class Browser
{
    // get var from get, post and cookie
    public static function get_r($f)
    {
	if(isset($_REQUEST[$f]))
	{
	    $str = stripslashes(htmlspecialchars($_REQUEST[$f],ENT_QUOTES,'UTF-8'));
	}
	else
	{
	    $str = "";
	}

	return "$str";
    }

    // get var from session
    public static function get_s($f)
    {
	if(isset($_SESSION[$f]))
	{
	    $str = stripslashes(htmlspecialchars($_SESSION[$f],ENT_QUOTES,'UTF-8'));
	}
	else
	{
	    $str = "";
	}

	return "$str";
    }

    // set session var
    public static function set_s($k,$v)
    {
	$_SESSION[$k] = $v;
    }

    // delete session var
    public static function del_s($f)
    {
	unset($_SESSION[$f]);
    }

    // get working directory
    public static function get_basedir()
    {
        $self = stripslashes(htmlspecialchars($_SERVER['PHP_SELF'],ENT_QUOTES,'UTF-8'));
	$bdir = str_replace(basename(__FILE__),'',$self);
	return "$bdir";
    }

    // get request URI
    public static function get_URI()
    {
        $uri = stripslashes(htmlspecialchars(strip_tags($_SERVER['REQUEST_URI']),ENT_QUOTES,'UTF-8'));
	return "$uri";
    }

    // get request method
    public static function get_method()
    {
	$met = stripslashes(htmlspecialchars($_SERVER['REQUEST_METHOD'],ENT_QUOTES,'UTF-8'));
	return "$met";
    }

    // get redirect status
    public static function get_redirect_status()
    {
	$sta = stripslashes(htmlspecialchars(@$_SERVER['REDIRECT_STATUS'],ENT_QUOTES,'UTF-8'));
	return "$sta";
    }

    // get modified since
    public static function get_modified_since()
    {
	$mod = strtotime(stripslashes(htmlspecialchars(@$_SERVER['HTTP_IF_MODIFIED_SINCE'],ENT_QUOTES,'UTF-8')));
	return "$mod";
    }

    // get available browser languages
    public static function get_lang()
    {
	$lang = explode(",",stripslashes(htmlspecialchars(@$_SERVER['HTTP_ACCEPT_LANGUAGE'],ENT_QUOTES,'UTF-8')));
	return $lang;
    }

    // get browser, etc. information
    public static function get_agent()
    {
        $agent = stripslashes(htmlspecialchars(@$_SERVER['HTTP_USER_AGENT'],ENT_QUOTES,'UTF-8'));
	return $agent;
    }

    // get full host URL
    public static function get_hostURL($ssl = 0)
    {
        $host = stripslashes(htmlspecialchars($_SERVER['HTTP_HOST'],ENT_QUOTES,'UTF-8'));
        $prot = stripslashes(htmlspecialchars(@$_SERVER['HTTPS'],ENT_QUOTES,'UTF-8'));

	if($ssl != 0)
	{
	    $prot = '1';
	}

	if($prot != "" && $prot != "off")
	{
	    $prot = 'https';
	}
	else
	{
	    $prot = 'http';
	}
	
	$URL = "$prot://$host";
	return $URL;
    }

    // check if browser, etc. has something to do with Microsoft
    public static function check_ms()
    {
	$agent = Browser::get_agent();

	if(strpos($agent,"MSIE") || strpos($agent,"Windows"))
	{
	    return 1;
	}
	
	return 0;
    }
}

class Router extends Core
{
    // builds request array
    public function get_request()
    {
        $uri = Browser::get_URI();

	$uri = strtr($uri,'?@\\','---');
	
	$uri = substr($uri,strlen(Config::get('basedir')));

	$method = Browser::get_method();

	$status = Browser::get_redirect_status();

	return array('URI' => $uri,'method' => $method,'status' => $status);
    }

    // checks if request matches a static route
    private function chk_static_routes($req)
    {
	$routes = Config::get('static_routes');

	foreach ($routes as $r)
	{
	    $p = $r['URI'];

	    // prepare static route URL regex if var exists
	    if(preg_match('@\{(.*?)\}@',$r['URI'],$go))
	    {
		$p = preg_replace('@\{(.*?)\}@','(.*?)',$r['URI']);
	    }

	    // match static route and method with request
	    if(preg_match("@^$p$@",$req['URI'],$finds) && $req['method'] == $r['method'])
	    {
		// fill vars an pass them on
		if(count($go) > 1)
		{
		    preg_match_all('@\{(.*?)\}@',$r['URI'],$keys);
		    $keys = $keys[1];

		    unset($finds[0]);
		    $finds = array_values($finds);

		    foreach($keys as $k => $key)
		    {
		    	$opts[$key] = $finds[$k];
		    }

		    $r['RES'] = $opts;
		}

		return array('T' => 'static') +  $r;
	    }
	}

	return 0;
    }

    // checks if file/resource exists and gives back a route array
    // files can be in request matching subfolders
    private function build_dyn_route($req)
    {
	$uri = $req['URI'];
	$r_found = 0;
	$basedir = Config::get('basedir');

	if($uri == "")
	{
	    $uri = Config::get('default_page');
	}

	if($req['status'] == '404')
	{
	    return array('T' => 'dyn', 'resource' => '0');
	}

	if($req['status'] == '401')
	{
	    return array('T' => 'dyn', 'resource' => '241');
	}

	// get rid of the / at the end
	if(substr($uri, -1) == "/")
	{
	    $uri = substr($uri,0,-1);
	}

	// check for auth
	if(substr($uri,-5) == '/auth' && $req['method'] == 'POST')
	{
	    $status = Config::$Auth->go();

	    // remove /auth 
	    $uri = substr($uri,0,-5);

	    if(substr($uri,-5) == '/ajax')
	    {
	    	echo json_encode(array('status' => $status,'msg' => Content::get('[AUTHMSG]')));
		exit;
	    }

	    // go to the originaly requested route
	    header("Location: ".Config::get('host_URL').$basedir.$uri);
	    exit;
	}

	// check for logout
	if(substr($uri,-7) == 'un_auth')
	{
	    // unauth / logout
	    Config::$Auth->del();

	    if(substr($uri,-12) == 'ajax/un_auth')
	    {
		exit;
	    }

	    // redirect to the default page
	    header("Location: ".Config::get('host_URL').$basedir.Config::get('default_page'));
	    exit;
	}

	// get the file corresponding to the request
	// working with the file is safer
	if($file = Config::setF($uri))
	{
	    // change file if auth is needed
	    if(Config::$Auth->need($file))
	    {
		header("HTTP/1.0 401 Unauthorized");

	        return array('T' => 'dyn', 'resource' => 199);
	    }

	    // if the requested resource is a file set route to file
	    if($file == $uri)
	    {
		return array('T' => 'file', 'file' => $file);
	    }

	    return array('T' => 'dyn', 'resource' => $file);
	}
	// if no file was found check in menu
	else
	{
	    $blen = strlen($basedir);

	    // return no file if resource is found in menu
	    foreach(Config::get('menu_link_array') as $l)
	    {
	        if(strpos($l['href'],"$uri", -0) == $blen)
	        {
	            return array('T' => 'dyn', 'resource' => 100);
	        }
	    }
	}

	// if resource still not found return error
	header("HTTP/1.0 404 Not Found");

	return array('T' => 'dyn', 'resource' => 0);
    }

    // checks request against static and dynamic routes an gives back route array
    // gives back at least the resource not found route
    private function get_route()
    {
	$req = Config::get('request');

	if($route = $this->chk_static_routes($req))
	{
	    return $route;
	}

	return $this->build_dyn_route($req);
    }

    // gives back the content of the request
    public function load_content()
    {
	$route = $this->get_route();
	
	// if request is file return content
	if($route['T'] == 'file')
	{
	    // dont display files beginning with a dot
	    // should not be used since it is handled by .htaccess
	    if(strpos(end(explode('/',$route['file'])),'.') === 0)
	    {
		exit;
	    }

	    if(Config::wasModified($route['file']))
	    {
	        echo Content::getFromFile($route['file']);
	    	exit;
	    }
	}

	if($route['T'] == 'dyn')
	{
	    // resource was not found
	    if($route['resource'] === 0)
	    {
		return Content::get('[RNFMSG]');
	    }
	    // auth required
	    elseif($route['resource'] === 241)
	    {
		return Content::get('[ARFMSG]');
	    }
	    // resource only in menu
	    elseif($route['resource'] === 100)
	    {
		// do nothing
	    }
	    // send login form
	    elseif($route['resource'] === 199)
	    {
		return Content::get('[AUTHFORM]');
	    }
	    // no files at all were found
	    elseif($route['resource'] === 99)
	    {
		return Config::get('default_content');
	    }

	    Content::set('[PAGEURL]',substr($route['resource'],0,strrpos($route['resource'],'/')));

	    return Content::getFromFile($route['resource']);
	}

        if(array_key_exists('CLASS',$route))
	{
	    if(property_exists(Config::$Plugin,$route['CLASS']))
	    {
		return Config::$Plugin->$route['CLASS']->from_router($route);
	    }
	}
	elseif(file_exists($route['FILE']))
	{
	    return include $route['FILE'];
	}
    }
}

class Menu extends Core
{
    // gathers all menu lines
    private function get_lines()
    {
	$muf = Config::genF('menu_file');

	if(file_exists($muf))
        {
	    $m_arr = file($muf, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

	    foreach ($m_arr as $l)
            {
		if(substr($l, 0, 1) == "*")
		{
		    $menu_lines[] = $l;
		}
	    }
	}
	else
	{
	    $menu_lines = array();
	}

	return $menu_lines;
    }

    // returns the built html menu
    public function get()
    {
	$menu_lines = $this->get_lines();

	// if no usable menu lines were found show def menu
	if(count($menu_lines) == 0)
	{
	    Config::set('menu_link_array',$menu_lines);
	    return Config::get('default_menu');
	}

	// prepare the link arrays
	$menu_lines = $this->gen_links($menu_lines);

	// save link array for later usage
	Config::set('menu_link_array',$menu_lines);

	if(Config::get('multiple_menus') == "yes")
	{
	    return $this->multi_gen_menu($menu_lines);
	}

	return $this->gen_menu($menu_lines);
    }

    // sometimes it is desirable to split a menu at the top level and have multiple menus. this is the function
    private function multi_gen_menu($m_lines)
    {
        $r = 0;
	$arl = count($m_lines);
	
	foreach ($m_lines as $k => $l)
	{
	    if(array_key_exists('act',$l))
	    {
		$multi_mulines[$r]['act'] = 1;
	    }

	    $multi_mulines[$r][] = $l;

	    // check for array end
	    if($k+1 != $arl)
	    {
		
		// if next level is top level rise the array key
	        if($m_lines[$k+1]['lvl'] == 1)
	        {
	            $r++;
	        }
	    }
	}

	$menu = "";

	// exec gen_menu for each menu peace
	foreach ($multi_mulines as $mes)
	{
	    $menu .= $this->gen_menu($mes);
	}

	return $menu;
    }

    // split menu lines and add menu spez (login -> name)
    private function pre_format_links($menu_lines)
    {
	$is_auth = Config::$Auth->is();

	foreach ($menu_lines as $line)
	{
	    // splits the menu lines at the first space and the pipes
	    $l_arr = explode(" ",$line,2);

	    // get level
	    $l = substr_count($l_arr[0],'*');

	    // split rest of menu line
	    $li_arr = explode('|',$l_arr[1]);
	
	    // change menu link text to username if auth
	    if($li_arr[0] == "[LOGINTEXT]" && $is_auth == 'auth_ok')
	    {
		$li_arr[0] = "[NAME]";
	    }

	    $m_arr[] = array_merge(array($l),$li_arr);
	}

	return $m_arr;
    }

    // check for auth/role or sort out auth/role lines
    private function auth_on_menu($menu_lines)
    {
	$is_auth = Config::$Auth->is();
	$roles = Config::get('account_role');

	foreach($menu_lines as $li_arr)
	{
	    // get last array part number
	    $end = count($li_arr)-1;
	    
	    if(array_key_exists('tpl',$li_arr))
	    {
		$end = $end-1;
	    }

	    // check if link is still a sublink of auth needed link
	    if(isset($ab) && $li_arr[0] <= $ab)
	    {
		unset($ab);
		unset($rf);
	    }

	    // check if page has auth and cut it off
	    if(preg_match('/AUTH\[(.*)\]/',$li_arr[$end],$finds))
	    {
		$frs = explode(',',$finds[1]);
		unset($li_arr[$end]);

		// unset so submenu can have other roles
		unset($rf);

		if(count($frs) == 0 || $frs[0] == '')
		{
		    $rf = 1;
		}

		foreach($frs as $fr)
		{
		    if(in_array($fr,$roles))
		    {
			$rf = 1;	
		    }
		}

		// set auth needed link level
		if(!isset($ab))
		{
		    $ab = $li_arr[0];
		}
	    }

	    // remove menu link if no auth but needed
	    if(isset($ab) && ($is_auth != 'auth_ok' || !isset($rf)))
	    {
		continue;
	    }

	    $lines[] = $li_arr;
	}

	return $lines;
    }

    private function get_page_tpl($menu_lines)
    {
	foreach($menu_lines as $li_arr)
	{
	    // get last array part number
	    $end = count($li_arr)-1;

	    if(preg_match('/->.*/',$li_arr[$end]))
	    {
		$atp = explode('->',$li_arr[$end]);
		$li_arr[$end] = $atp[0];
		$li_arr['tpl'] = $atp[1];
	    }

	    $lines[] = $li_arr;
	}

	return $lines;
    }

    // generates a multidimensional array of processed menu lines (still line-based)
    private function gen_links($menu_lines)
    {
	// prepare and sort out links
	$menu_lines = $this->pre_format_links($menu_lines);
	$menu_lines = $this->get_page_tpl($menu_lines);
	$m_arr = $this->auth_on_menu($menu_lines);

	$act = Config::get('basedir').Config::get('current_page');

	$last = array();

	foreach ($m_arr as $l)
	{
	    // level of the link inside the menu
	    $link['lvl'] = $l[0];
	    // link html display name with addons
	    $link['name'] = Config::get('nav_lnkt_st').$l[1].Config::get('nav_lnkt_en');
	    // link css id
	    $link['id'] = strtolower($l[1]);
	    // href url
	    $link['href'] = urlencode($l[1]);
	    // set page template and remove it from $l to make things easier
	    if(array_key_exists('tpl',$l))
	    {
		$link['tpl'] = $l['tpl'];
		unset($l['tpl']);
	    }

	    // looks like this to add more...
	    // counts the pipes and adds the fieldinfos to the array
	    // 1. field could be all... see above
	    // 2. field is css id
	    // 3. field is href -> url or resource
	    if(count($l)-1 >= 2)
	    {
		$link['id'] = $l[2];
	    }

	    if(count($l)-1 == 3)
	    {
		$link['href'] = $l[3];
	    }

	    $current = array($link['lvl'],$link['href']);	

	    $link['href'] = $this->gen_rest_href($last,$current);

	    // checks if the menu is active to set the css classes and spec. theme
	    if($link['href'] == $act)
	    {
		if(array_key_exists('tpl',$link))
		{
		    Config::$Temp->set_tpl_name_ext($link['tpl']);
		}
		
		$link['act'] = 1;
	    }

	    $m_links[] = $link;

	    // if this link is not a resource keep last link. Except spec. resouce Logout
	    if(strpos($current[1],'/') === FALSE && $current[1] != 'Logout')
	    {
	        $last = array($link['lvl'],$link['href']);
	    }
	    else
	    {
		$last = $last;
	    }

	    unset($link);	    
	}

	return $m_links;
    }

    // does the REST url path ("something" to "/path/and part of/something")
    private function gen_rest_href($last,$current)
    {
	// work with normal destinations
	if(strpos($current[1],'/') === FALSE)
	{
	    if($current[1] == "Logout")
	    {
		return Config::get('basedir')."un_auth";
	    }

	    $ua = "/";

	    // check for reference link and build link accordingly
	    if(substr($current[1],0,1) == "#")
	    {
		$current[1] = substr($current[1],1);
		$ua = "#";
	    }

	    // if level 1 start new href base
	    if($current['0'] == 1)
	    {
		$last[1] = Config::get('basedir');
		$last[0] = 1;
	    }

	    // removes #ref last link
            if(strpos($last[1],'#'))
	    {
	        $last[1] = substr($last[1],0,strrpos($last[1],'#'));
		$last[0] = $last[0]-1;
	    }

	    if($last[0] < $current[0])
	    {
	        $href = $last[1].$ua.$current[1];
	    }
	    // if not up, then down or stay... but i have a bad feeling about this, so, i leave it like this
	    elseif($last[0] >= $current[0])
	    {
		$h = $last[1];

		// remove level links
		for($c = $last[0]; substr_count($h,'/')+1 > $current[0]; $c--)
		{
		    $h = substr($h, 0, strrpos($h, '/'));
		}

		$href = $h.$ua.$current[1];
	    }

	    return $href;
	}

	// fix basedir
	if(substr($current[1],0,1) == '/' || substr($current[1],0,9) == '[BASEURL]')
	{
	    $current[1] = Config::get('basedir').end(explode('/',$current[1],2));
	}

	return $current[1];
    }

    // put all together. generates the html menu code
    // its a monster but there are a lot of decisions and addons
    private function gen_menu($mulines)
    {
	$todiv = 0;

	// set if menu is not a ul list but div
	if(Config::get('div_menu') == "yes")
	{
	    $todiv = 1;
	}

	//set the menu active or not-active class
	if($todiv == 0)
	{
	    $menu = "<ul class='";
	}
	elseif($todiv == 1)
	{
	    $menu = "<div class='";
	}

	if(array_key_exists('act',$mulines))
	{
	    $menu .= Config::get('nav_menu_act');
	    unset($mulines['act']);
	}
	else
        {
	    $menu .= Config::get('nav_menu');
	}

	$menu .= "'>\n";

	$arrlen = count($mulines);

	foreach ($mulines as $k => $l) 
	{
	    $lvl = $l['lvl'];
	    
	    // define next level if not end of array
	    if($k+1 != $arrlen)
	    {
		$next_lvl = $mulines[$k+1]['lvl'];
	    }
	    else
	    {
		$next_lvl = 0;
	    }

	    if($todiv == 0)
	    {
		$menu .= "<li class='";

		if(array_key_exists('act',$l))
		{
		    $menu .= Config::get('nav_act')." ";
		}

		if($next_lvl > $lvl)
		{
		    if($lvl == 1)
		    {
			$menu .= Config::get('nav_lvl1_cls')." ";
		    }
		    else
		    {
			$menu .= Config::get('nav_lvl+_cls')." ";
		    }
		}
	    
		$menu .= Config::get('nav_link_cls')."'>\n";
	    }
	    
	    if($todiv == 1 && $next_lvl > $lvl)
	    {
		$menu .= "<div class='";

		if(array_key_exists('act',$l))
		{
		    $menu .= Config::get('nav_act')." ";
		}

		$menu .= Config::get('nav_lvl+_cls')."'>\n";
	    }

	    $menu .= "<a id='".$l['id']."' class='";

	    if($todiv == 1 && array_key_exists('act',$l) && $next_lvl <= $lvl)
	    {
		$menu .= Config::get('nav_act')." ";
	    }

	    if($next_lvl > $lvl)
	    {
		$menu .= Config::get('nav_subl_lnkt_cls');
	    }
	    else
	    {
		$menu .= Config::get('nav_lnkt_cls');
	    }

	    $menu .= "' href='".$l['href'];

	    if($next_lvl > $lvl)
	    {
		$menu .= Config::get('nav_lnkt_ao');
	    }

	    $menu .= "'><span>".$l['name']."</span>";

	    if($next_lvl > $lvl)
	    {
		$menu.= Config::get('nav_subl_lnk_en');
	    }

	    $menu .= "</a>\n";

	    // if level goes down close ul&li or div		
  	    if($lvl > $next_lvl)
  	    {
		$i = $next_lvl;

		if($next_lvl < 1)
	        {
		    $i = 1;
		}

		// do it for all open levels
	  	for($i; $i < $lvl; $i++)
		{
		    if($todiv == 0)
		    {
		    	$menu .= "</li>\n</ul>\n";
		    }
		    elseif($todiv == 1)
		    {
		    	$menu .= "</div>\n</div>\n";
		    }
		}
  	    }

	    // if level gose up open a new ul or div or else close li since next link is on same level
	    if($lvl < $next_lvl)
	    {
		if($todiv == 0)
		{
		    $menu .= "<ul";
		}
		elseif($todiv == 1)
		{
		    $menu .= "<div";
		}

		if($lvl >= 1)
		{
		    $menu .= " class='".Config::get('nav_subl_cls')."'";
		}

		$menu .= ">\n";
	    }
	    else
	    {
		if($todiv == 0)
	        {
		    $menu .= "</li>\n";
		}
	    }
	}

	// close bottom level ul or div
	if($todiv == 0)
	{
	    $menu .= "</ul>\n";
	}
	elseif($todiv == 1)
	{
	    $menu .= "</div>\n";
	}

	return $menu;
    }
}

class Content
{
    private static $contents;
    private static $add_chunks = array();
    private static $replace_chunks = array();

    // bulk content cration
    // overwrites all existing configs
    public static function init($v)
    {
	self::$contents = $v;
    }

    // content get
    public static function get($k)
    {
	return self::$contents[$k];
    }

    // get all contents in array
    public static function getAll()
    {
	return self::$contents;
    }

    // content set
    public static function set($k,$v)
    {
	self::$contents[$k] = $v;
    }

    // set a content from a file. full file path is needed
    public static function setFromFile($k,$f)
    {
	self::$contents[$k] = self::getFromFile($f);
    }

    // get file content. full file path is needed
    public static function getFromFile($f)
    {
	return @file_get_contents($f);
    }

    // change and replace  placeholder content
    public static function alter()
    {
	self::put_chunk(self::$add_chunks);
	self::replace_chunk(self::$replace_chunks);
    }

    // filling the array for function put_chunk
    // array: content (placeholder), before (position to search to place the content), chunk (content), offset (offset to before)
    public static function add($content,$before,$chunk,$offset)
    {
	self::$add_chunks[] = array($content,$before,$chunk,$offset);
    }

    // search if something is in add chunks
    public static function in_adds($search)
    {
	foreach(self::$add_chunks as $chunk)
	{
	    if(strpos($chunk[2],$search))
	    {
		return 1;
	    }
	}

	return 0;
    }

    // add stuff to existing content/placeholder on a specific position
    // look at function add for array structure
    private static function put_chunk($chunks)
    {
	if(count($chunks) > 0)
	{
	    foreach($chunks as $chunk)
	    {
		// checks if the placeholder exists
		if(array_key_exists($chunk[0],self::$contents))
		{
		    $temp = self::$contents[$chunk[0]];
		    $before = $chunk[1];
		    $cuk = $chunk[2];
		    $offset = $chunk[3];

        	    $pos = strpos($temp,$before);

		    // add only if position for before was found
		    // before cant be 1
		    if($pos != "1")
		    {
	    	        $tpl1 = substr($temp, 0, $pos+$offset);
	            	$tpl2 = substr($temp, $pos+$offset);

	            	$temp = $tpl1.$cuk.$tpl2;

			self::$contents[$chunk[0]] = $temp;
		    }
		}
	    }
	}
    }

    // fill array for replace_chunk
    // array: content (placeholder), search (content to replace), replace (content to put in place)
    public static function replace($content,$search,$replace)
    {
	self::$replace_chunks[] = array($content,$search,$replace);
    }

    // replace placeholder content from array replace_chunks
    // look at function replace for array structure
    private static function replace_chunk($chunks)
    {
	if(count($chunks) > 0)
	{
	    foreach($chunks as $chunk)
	    {
		// checks if the placeholder exists
		if(array_key_exists($chunk[0],self::$contents))
		{
		    $temp = self::$contents[$chunk[0]];
		    $search = $chunk[1];
		    $replace = $chunk[2];

		    $temp = str_replace($search,$replace,$temp,$count);

		    // change only if something was replaced
		    if($count > 0)
		    {
			self::$contents[$chunk[0]] = $temp;
		    }
		}
	    }
	}
    }

    /* 
      set page includes (additional placeholders) and could 
      overwrites all other placeholders

      includes are only shown on certain resources
      e.g.: "[MAINBANNER]" is only shown on resource Home

      in addition they can have per request changing content
    */
    public static function setINC($f)
    {
	$file = trim(self::getFromFile($f));
	$page = Config::get('current_page');

	if($page == "")
	{
	    $page = Config::get('default_page');
	}

	// split in different includes
	$far = explode(Config::get('includes_split'),$file);

	$match = array();

	foreach ($far as $in)
	{
	    if($in == "")
	    {
		continue;
	    }

	    // get placeholder out
	    $plh = trim(substr($in,0,strpos($in,"]")+1));
	    // get pages
	    $pag = trim(substr($in,strpos($in,"{")+1,strpos($in,"}")-strpos($in,"{")-1));
	    $pgs = explode(",",$pag);
	    // get content of the include
	    $cnt = trim(substr($in,strpos($in,"}")+1));

	    // only show includes for current page
	    // * can be used to show on all pages
	    if(in_array($page,$pgs) || $pgs[0] == "*")
	    {
		$match[] = array($plh,$cnt);
	    }
	    else
	    {
		// empty unused placeholders
		self::set($plh,"");
	    }
	}

	// select content item to show this request
	foreach($match as $m)
	{
	    $car = explode(Config::get('includes_split_content'),$m[1]);

	    $k = Config::select_item_s('inc_'.$page.'_'.$m[0],$car);

	    self::set($m[0],trim($car[$k]));
	}
    }
}

class Template extends Core
{
    private $tpl_name_ext;

    // get the template content
    public function get()
    {
        if($tpl = $this->select())
	{
            return Content::getFromFile($tpl);
	}

 	return Config::get('default_theme');
    }

    // select the right template out of the template path
    private function select()
    {
	$tpl_ext = Config::get('theme_extension');
	$tpl_name = Config::get('theme');
        $tpl_dir = Config::get('theme_folder')."/".$tpl_name;
	$tpl = $tpl_dir."/".$tpl_name;
	$tit_tpl = $tpl.Config::get('title_page_tpl_add').$tpl_ext;
	$suc_tpl = $tpl.Config::get('SUC_page_tpl_add').$tpl_ext;

	// check if site is under construction
        if(file_exists($suc_tpl) && Config::get('site_under_construction') == 'yes')
        {
	    return $suc_tpl;
	}
	// display titelpage template if present and no resource is set 
	elseif(file_exists($tit_tpl) && Config::get('request')['URI'] == "")
	{
	    return $tit_tpl;
	}

	// add name extension of current page
	if($this->tpl_name_ext != '')
	{
	    $ext = '_'.$this->tpl_name_ext.$tpl_ext;

	    if(file_exists($tpl.$ext) || file_exists($tpl_dir.$ext))
	    {
		$tpl_ext = $ext;
	    }
	}

	if(file_exists($tpl.$tpl_ext))
	{
	    return $tpl.$tpl_ext;
	}
	// return tpl without subfolder
	elseif(file_exists($tpl_dir.$tpl_ext))
	{
	    return $tpl_dir.$tpl_ext;
	}
	else
	{
	    return FALSE;
	}
    }

    // set current page theme name extension to have per page template
    public function set_tpl_name_ext($nameext)
    {
	$this->tpl_name_ext = $nameext;
    }
}

class Page extends Core
{
    // holds the hole page for output and maybe some alteration...
    private $page;

    // puts the page to $this->page
    public function generate()
    {
	// replace all the placeholders with its content. Done twice to replace placeholders in content of placeholders
	$output = str_replace( array_keys(Content::getAll()), Content::getAll(), Content::get('[TEMPLATE]'));
	$output = str_replace( array_keys(Content::getAll()), Content::getAll(), $output );
	$this->page = $output;
    }

    // output: display the page
    public function display()
    {
	header('Content-Type: text/html');

	echo "$this->page";
    }
}

class Language extends Core
{
    private $lang;

    function __construct()
    {
	if($lang = Browser::get_s('language'))
	{
	    $this->lang = $lang;
	}
    }

    // gets first matching browser lang which exists among submitted langs
    public function get($local_langs = array())
    {
	$deflang = Config::get('default_lang');

	if($this->lang != "")
	{
	    return $this->lang;
	}

        $browser_langs = Browser::get_lang();

	foreach ($browser_langs as $l)
	{
	    // remove content negotiation infos
	    $l = explode(';q',$l)[0];

	    if(in_array($l,$local_langs))
	    {
		$lang = $l;
		break;
	    }

	    if($l == $deflang)
	    {
		break;
	    }
	}

	if(!isset($lang))
	{
	    $lang = $deflang;
	}

        return $lang;
    }

    // set the language to use... if set nothing else matters
    public function set($l)
    {
	$this->lang = $l;
    }
}

class Config
{
    // define the standard classes public
    public static $Lang;
    public static $Menu;
    public static $Temp;
    public static $Page;
    public static $Auth;
    public static $Plugin;
    public static $Router;
    private static $cfgs;
    private static $CntFL = array();

    // bulk config cration if 
    // overwrites all existing configs
    public static function init($arr)
    {
	self::$cfgs = $arr;
    }
   
    // bulk config append
    // adds array of configs to class Config
    public static function merge($arr)
    {
	self::$cfgs = array_merge($this->cfgs,$arr);
    }

    // create config if
    public static function set($k,$v)
    {
        self::$cfgs[$k] = $v;
    }

    // get config if
    public static function get($k)
    {
        return self::$cfgs[$k];
    }

    // generates the full file name from the config with language extension
    public static function genF($f)
    {
	return self::setF(self::get($f),1);
    }

    /*
      searches the requested file and gives found file with path

      since it could be in different places with different language extensions
      this function need to do a lot of checking
    */
    public static function setF($s,$intern=0)
    {
	$ext = self::get('content_file_extension');
	$lsubs = self::get('lang_subfolders');
	$edext = explode(',',self::get('editor_extension'));
	$filelist = self::getContentFileList();
	$fa = array();
	$ea = array();
	$sa = array();
	$lex = '';
	$cd = self::get('content_dirs');

	// check filelist is not empty
	if(count($filelist) < 1)
	{
	    return 99;
	}

	// get the resource name only
	$r = end(explode('/',$s));

	// enforce not to show files with a trailing .
	if(strpos($r,'.') === 0 && $intern == 0)
	{
	    return 0;
	}

        // search for possible files
	$sse = "/$r$ext";

	foreach($filelist as $f)
	{
	    if($f == $s)
	    {
		return $f;
	    }

	    if(strstr($f,$sse))
	    {
		$fa[] = $f;
	    }
	}

	// if possible files found go on
	if(count($fa) != 0)
	{
	    // get extensions but not editor extensions
	    foreach($fa as $f)
	    {
		if($lsubs == 'no')
		{
		    $end = end(explode("$ext",$f));

		    if($end != "" && !in_array($end,$edext))
		    {
			$ea[] = substr($end,1);
		    }
		}
		elseif($lsubs == 'yes')
		{
		    $la = explode('/',$f)[1];

		    $ea[] = $la;
		}
	    }
	
	    // set language extension only if found
	    if(count($ea) > 0)
	    {
		$lex = self::$Lang->get($ea);

	    	// add language subfolders if activated
		if($lsubs == 'no' && in_array($lex,$ea))
		{
		    $ext = $ext.'.'.$lex;
		    $lex = '';
		}
		elseif($lsubs == 'yes')
		{
		    $lex = '/'.$lex;
		}
		else
		{
		    $lex = '';
		}
	    }

            // build file/folder selection order
	    foreach($cd as $dir)
	    {
		array_push($sa, $dir.$lex.'/'.$r, $dir.$lex.'/'.$r.'/'.$r, $dir.$lex.'/'.$s, $dir.$lex.'/'.$s.'/'.$r);
	    }

	    if(self::get('role_based') == 'yes' && $s != self::get('acc_file'))
	    {
		$pa = self::get('protected_folder');
		
		$roles = self::$Auth->roles();

		if(self::$Auth->is() == 'auth_ok')
		{
		    $roles = self::get('account_role');
		}

                // add file/folder selection order for roles
		foreach($roles as $ro)
		{
		    $lex = '/'.$ro;

		    array_push($sa, $pa.$lex.'/'.$r,$pa.$lex.'/'.$r.'/'.$r,$pa.$lex.'/'.$s,$pa.$lex.'/'.$s.'/'.$r);
		}
	    }

	    // return the first matching file from selection order
	    // returned is a real existing file name found before and not some patched var
	    foreach($sa as $ss)
	    {
		$k = array_search($ss.$ext,$fa);

		if($k !== FALSE)
		{
		    return $fa[$k];
		}
            }
	}
	
	return 0;
    }

    // get and set next index key of array from/to session var
    public static function select_item_s($k,$arr)
    {
	if(count($arr) <= 1)
	{
	    return 0;
	}

	$old = Browser::get_s($k);

	if($old >= count($arr)-1 || $old == "")
	{
	    $act = 0;
	}
	else
	{
	    $act = $old+1;
	}

	Browser::set_s($k,$act);
	return $act;
    }

    // recuresive list all file/folders of content folders
    public static function getContentFileList()
    {
	if(count(self::$CntFL) == 0)
	{
	    foreach(self::get('content_dirs') as $dir)
	    {
		self::$CntFL = array_merge(self::$CntFL,self::RlistFiles($dir));
	    }
	}

	return self::$CntFL;
    }

    // recursive folder listing used by getContentFileList
    private static function RlistFiles($dir) 
    {
	$dir = rtrim($dir, '\\/');
	$result = array();

	if(!is_dir($dir))
	{
	    return $result;
	}

	foreach (@scandir($dir) as $f) 
	{
	    if ($f != '.' && $f != '..') 
	    {
		if(is_dir("$dir/$f")) 
		{
		    $result = array_merge($result, @self::RlistFiles("$dir/$f"));
        	} 
    		else 
		{
		    $result[] = "$dir/$f";
		}
	    }
	}

 	return $result;
    }

    // check if file was modified and set header
    public static function wasModified($file)
    {
	$modtime = filemtime($file);
	$rmtime = Browser::get_modified_since();

	if($modtime == $rmtime)
	{
	    header('Last-Modified: '.gmdate('D, d M Y H:i:s', $modtime).' GMT', true, 304);
	    return FALSE;
	}
	else
	{
	    header('Last-Modified: '.gmdate('D, d M Y H:i:s', $modtime).' GMT', true, 200);
	    return TRUE;
	}
    }

    // set new routes
    public static function addRoute($URI,$MET,$TYP,$DST,$OPT = '')
    {
	// could be a one-liner but is better readable like this
	$array = Config::get('static_routes');
	$array[] = array('URI' => "$URI", 'method' => "$MET", "$TYP" => "$DST", 'OPTS' => "$OPT");
	Config::set('static_routes',$array);
    }
}

class Auth extends Core
{
    private $auth_status;
    private $auth_folders;
    private $auth_roles;

    // get specifig account details or of all accounts of a role or ...
    // this is and should be the only function which can read the account file
    // takes a array and goes for key and if set the value
    private function get_accDet($r)
    {
	$file = Config::genF('acc_file');
	if($file == FALSE)
	{
	    return 0;
	}
	$arr = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

	foreach($arr as $l)
	{
	    if(substr($l,0,2) == "#>")
	    {
		$l = substr($l,2);
		$mod = explode('|',$l);
	    }
	    elseif(substr($l,0,1) == "#")
	    {
		continue;
	    }
	    else
	    {
		$f_arr[] = $l;
	    }
	}

	if(count($f_arr) > 0 && count($mod) > 1)
	{
	    foreach($f_arr as $al)
	    {
		$acc = explode('|',$al);

		foreach($acc as $k => $i)
		{
		    $a[$mod[$k]] = $i;
		}

		if(array_key_exists('USER',$r))
		{
		    if($a['USER'] == $r['USER'])
		    {
			return $a;
		    }
		}

		if(array_key_exists('ROLE',$r))
		{
		    $role[] = explode(',',$a['ROLE'])[0];
		}
	    }

	    return $role;
	}
    }

    // verify the entered password
    private function verify_pw($usr,$pw)
    {
	$account = $this->get_accDet(array('USER' => $usr));

	if($account != '')
	{
	    $salt = substr($account['PW'],0,strrpos($account['PW'],'$'));

	    if(crypt($pw,$salt) == $account['PW'])
	    {
		foreach($account as $key => $val)
		{
		    if($key == 'PW')
		    {
			continue;
		    }

		    Browser::set_s('account_'.$key,$val);
		}

		return true;
	    }
	}	

	return false;
    }

    // logout/clear account and session
    public function del()
    {
	$account = $this->get_accDet(array('USER' => Config::get('account')));

	foreach($account as $key => $val)
	{
	    if($key == 'PW')
	    {
		continue;
	    }

	    Browser::del_s('account_'.$key);
	}

	Browser::del_s('auth');
    }

    // get all roles
    public function roles()
    {
	if($this->auth_roles == "")
	{
	   if(!$this->auth_roles = $this->get_accDet(array('ROLE' => '')))
	   {
		return array();
	   }
	}

	return $this->auth_roles;
    }

    // does the auth and sets the session values
    public function go()
    {
	$usr = Browser::get_r('account');
	$pw = Browser::get_r('password');

	if($this->verify_pw($usr,$pw) == true)
	{
	    Browser::set_s('auth','auth_ok');
	    $status = 'auth_ok';
	}
	else
	{
	    Browser::set_s('auth','auth_error');
	    $status = 'auth_error';
	}

	return $status;
    }

    // checks if a file needs auth and changes it if needed
    public function need($file)
    {
	$need_auth = 0;
	$need_role = '';

	if($this->auth_folders == '')
	{
	    $this->auth_folders = Config::get('to_auth');
	}

	foreach($this->auth_folders as $dir)
	{
	    if(strpos($file,$dir) === 0)
	    {
		$need_auth = 1;
	    }

	    if($dir == Config::get('protected_folder'))
	    {
		if(Config::get('role_based') == 'yes')
		{
		    if(Config::get('lang_subfolders') == 'yes')
		    {
			$dir .= '/'.Config::$Lang->get();
		    }

		    $need_role = explode('/',substr($file,strlen($dir)+1))[0];

		    if(!is_dir($dir.'/'.$need_role))
		    {
			$need_role = Config::get('account_role')[0];
		    }
		}

	    }
	}

	// set or unset auth fail message
	if($this->auth_status != 'auth_error')
	{
	    Content::set('[AUTHMSG]','');
	}

	if($need_auth == 1)
	{
	    // set need auth status
	    if($this->auth_status != 'auth_ok' || (Config::get('role_based') == 'yes' && !in_array($need_role,Config::get('account_role'))))
	    {
		return TRUE;
	    }
	}

	return FALSE;
    }

    // gives back the auth status
    public function is()
    {
	$a = $this->auth_status;

	if($a == '')
	{
	    $a = Browser::get_s('auth');
	    $this->auth_status = $a;
	}

	if($a == 'auth_error')
	{
	    Browser::del_s('auth');
	}

	return $a;
    }
}


class Core
{
    private $def = array(); // defaults array (contents,configs)
    private $version;

    function __construct()
    {
	// sets the version of CMSMayBe
	$this->version = "0.3.0";
    }

    public function set_defaults($configs)
    {
	// quick way to solve mime type problems
	ini_set('default_mimetype', '');

	// read from config file if it exists
	if(file_exists('.config.php'))
	{
	    require_once('.config.php');
	}

	// add configs and initial contents, define additional useful configs
	$this->def['configs'] = $configs;
	$this->def['contents']['[VERSION]'] = $this->version;
    }

    public function init_objects()
    {
	// put configs in place
	Config::init($this->def['configs']);
	Content::init($this->def['contents']);

	/*
	    no interaction to this point!
	*/

	// redirect to HTTPS if set
	if(Config::get('SSL') == "yes" && explode(':',Browser::get_hostURL(),2)[0] != 'https')
	{
	    header("Location: ".Browser::get_hostURL(1).Browser::get_URI());
	    exit;
	}

	// start session after redirect to HTTPS
	session_cache_limiter(false);
	session_start();

	//set basedir before all
	Config::set('basedir',Browser::get_basedir());

	// init all classes and add them to class Config so they can be altered directly
	Config::$Lang = new Language;
        Config::$Menu = new Menu;
        Config::$Temp = new Template;
        Config::$Page = new Page;
	Config::$Auth = new Auth;
        Config::$Plugin = new Plugin;
        Config::$Router = new Router;

	// Set request and others to be able to change it by a plugin
	Config::set('request',Config::$Router->get_request());
	Config::set('current_page',Config::get('request')['URI']);
	Config::set('language',Config::$Lang->get());
	Config::set('account',Browser::get_s('account_USER'));
	Config::set('account_role',explode(',',Browser::get_s('account_ROLE')));
	Config::set('username',Browser::get_s('account_NAME'));
	Config::set('to_auth',array(Config::get('protected_folder')));
	Config::set('content_dirs',array(Config::get('content_folder'),Config::get('protected_folder'),Config::get('plugin_folder'),Config::get('theme_folder')));

	if(Config::get('SSL') != 'no')
	{
            Config::set('host_URL',Browser::get_hostURL(1));
	}
	else
	{
            Config::set('host_URL',Browser::get_hostURL());
	}

        Config::set('URL',Config::get('host_URL').Config::get('basedir').Config::get('current_page'));
    }

    // load contents to placeholders
    // language support is done be extra file extension in form of browser language var (en,de,en-uk,de-ch,etc...)
    public function set_contents()
    {
	// add some basic placeholders
	Content::set('[TITLE]',Config::get('sitetitle'));
	Content::set('[LOGO]',Config::get('logo'));
	Content::set('[THEME]',Config::get('theme'));
	Content::set('[THEMEPATH]',Config::get('basedir').Config::get('theme_folder')."/".Config::get('theme'));
	Content::set('[THEMEFOLDER]',Config::get('basedir').Config::get('theme_folder'));
	Content::set('[BASEURL]',Config::get('basedir'));
	Content::set('[AGENT]',Browser::get_agent());
	Content::set('[PAGE]',Config::get('basedir').Config::get('current_page'));
	Content::set('[PAGENAME]',Config::get('current_page'));
	Content::set('[USER]',Config::get('account'));
	Content::set('[ROLE]',Browser::get_s('account_ROLE'));
	Content::set('[NAME]',Config::get('username'));
	Content::set('[DEFAULTPAGE]',Config::get('default_page'));
	Content::set('[LOGINTEXT]',Config::get('login_text'));
        Content::set('[LANG]',Config::get('language'));

	// needed content
	Content::setFromFile('[AUTHMSG]',Config::genF('login_error_file'));
	Content::setFromFile('[AUTHFORM]',Config::genF('login_file'));
	Content::setFromFile('[RNFMSG]',Config::genF('resource_not_found'));
	Content::setFromFile('[ARFMSG]',Config::genF('auth_required'));

	// not needed content from files
	Content::setFromFile('[MSHINT]',Config::genF('mshint_file'));
	Content::setFromFile('[PAGESIGN]',Config::genF('page_sign_file'));
	Content::setFromFile('[PAGEOPTS]',Config::genF('page_options_file'));
	Content::setFromFile('[FOOTER]',Config::genF('footer_file'));
	Content::setFromFile('[HEADER]',Config::genF('header_file'));

	// get menu and template
	Content::set('[MENU]',Config::$Menu->get());
        Content::set('[TEMPLATE]',Config::$Temp->get());

	// set INC
	Content::setINC(Config::genF('includes_file'));

	// check for empty needed contents after INC
	if(Content::get('[RNFMSG]') == '')
	{
	    Content::set('[RNFMSG]',Config::get('rnf_error'));
	}

	if(Content::get('[AUTHMSG]') == '')
	{
	    Content::set('[AUTHMSG]',Config::get('lef_error'));
	}

	if(Content::get('[ARFMSG]') == '')
	{
	    Content::set('[ARFMSG]',Config::get('are_error'));
	}

	if(Content::get('[AUTHFORM]') == '')
	{
	    Content::set('[AUTHFORM]',Config::get('lf_error'));
	}
	Content::set('[AUTHCHGFORM]',Content::get('[AUTHFORM]'));
    }

    // calls plugins with function from_router beside from set the content
    public function handle_request()
    {
	if(Config::get('dont_use_ms') == "no" || (!Browser::check_ms() && Config::get('dont_use_ms') == "yes"))
	{
	    Content::set('[MSHINT]','');
	}

    	Content::set('[CONTENT]',Config::$Router->load_content());
	
	// add/replace/remove stuff from placeholder contents
	Content::alter();

	Config::$Plugin->from_after_content();
    }
     
    // calls plugins with function from_main
    public function load_plugins()
    {
	Config::$Plugin->from_main();
    }

    // generates (alter content, replace placeholders) and displays the page
    public function display_page()
    {
        Config::$Page->generate();
        Config::$Page->display();
    }
}

##############################################################
### main - not needed if used as lib
##############################################################

$p = new Core;

// add default configurations to function core and starts phpsession
$p->set_defaults($configs);

// load classes, set configs and redirect to HTTPS before anything else
$p->init_objects();

// exec plugins, so they can change paths before getting contents of files
$p->load_plugins();

// put file content to placeholder content
$p->set_contents();

// should stay after set contents to give plugins access to them
$p->handle_request();

// generate the page / replace the placeholders
$p->display_page();

?>

