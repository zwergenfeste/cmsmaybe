<?php

class ThemeSwitcher extends Core 
{
    private $placeholder = '[ThemeSwitcher]';
    private $someChanges = array(
	"LightGray" => array(
		"nav_menu_act" => "nav nav-stacked active",
		"nav_menu" => "nav nav-stacked"
	),
	"DarkFolio" => array(
		"nav_menu_act" => "nav nav-tabs active", 
		"nav_menu" => "nav nav-tabs"
	),
	"Bootpills" => array(
		"nav_menu_act" => "nav nav-pills active", 
		"nav_menu" => "nav nav-pills"
	),
	"SemanticTree" => array(
		"div_menu" => "yes",
		"multiple_menus" => "no",
		"nav_menu_act" => "right menu", 
		"nav_menu" => "right menu",
		"nav_subl_cls" => "menu",
		"nav_lvl1_cls" => "secondary pointing ui dropdown link item",
		"nav_lvl+_cls" => "secondary pointing ui dropdown link item",
		"nav_subl_lnk_en" => "<i class='triangle down icon'></i>",
		"nav_subl_lnkt_cls" => "link",
		"nav_lnkt_cls" => "item"
	),
	"Zergum" => array(
		"nav_menu_act" => "avbar", 
		"nav_menu" => "navbar"
	)
    );

    private function set_ts_div()
    {
	$div = "\t<div id='ThemeSwitcher'>\n";
	$div .= "\t\t<div id='TSbtn'><b class='TScaret'></b>&nbsp;&nbsp;Change Theme</div>\n";
	$div .= "\t\t<div id='TSback'></div>\n";
	$div .= "\t\t<div id='TSwrap'>\n";
	$div .= "\t\t\t<form id='TSform' role='form' method='post'>\n";
	$div .= "\t\t\t\t<div id='TStitle'><b>Select Theme:</b></div>\n";
	$div .= "\t\t\t\t<div id='TSbody'>\n";
	$div .= "\t\t\t\t\t<div id='TSwaiter'></div>\n";
	$div .= "\t\t\t\t</div>\n";
	$div .= "\t\t\t</form>\n";
	$div .= "\t\t</div>\n";
	$div .= "\t</div>\n";

	Content::set($this->placeholder,$div);
    }

    // change the configuration options for the current theme
    private function alter_configs($tpl)
    {
	foreach($this->someChanges as $k => $v)
	{
	    if($k == $tpl)
	    {	
	        foreach($v as $conf => $val)
	        {
		    Config::set("$conf","$val");
	        }
	    }
	}

	Config::set('theme',$tpl);
    }

    private function get_themes()
    {
	$tmf = Config::get('theme_folder');

	$inf = array_diff(scandir($tmf), array('..', '.'));

	$themes = array();

	foreach ($inf as $i)
	{
	    if(is_dir($tmf.'/'.$i) && file_exists($tmf.'/'.$i.'/'.$i.'.tpl'))
	    {
	        $themes[] = $i;
	    }
	}

	return $themes;
    }

    public function from_main()
    {
	// check for action
	$sel_thm = Browser::get_s('selectTheme');
	$sel_thm_ret = Browser::get_r('selectTheme');

	// set session if post found
	if($sel_thm_ret != "")
	{
	    $sel_thm = $sel_thm_ret;
	    Browser::set_s('selectTheme',$sel_thm);
	    header("Location: ".Config::get('URL'));
	    exit;
	}

        // check for theme from session or post
	if($sel_thm != "")
	{
	    // change configs
	    $this->alter_configs($sel_thm);
	}

	// don't load theme changer for titlepage or if site is under construction
	if(Config::get('current_page') == "" && Config::get('site_under_construction') != 'yes')
	{
	    return;
	}

	// add stuff to template only if not run before
	if(!Content::in_adds($this->placeholder))
	{
	    // add placeholder at the end to make things load faster... or something like this
            // ThemeSwitcher needs jquery... add a line for it if you not already have it on your page
	    Content::add("[TEMPLATE]","</body>","\n".$this->placeholder."\n",0);
	    Content::add("[TEMPLATE]","</head>","\t<link rel='stylesheet' href='".$this->path.$this->name.".css'>\n\t",0);
	    Content::add("[TEMPLATE]","</body>","\t<script type='text/javascript'>var baseurl = '".Config::get('basedir')."';</script>\n\t",0);
            Content::add("[TEMPLATE]","</body>","\t<script type='text/javascript' src='".$this->path.$this->name.".js'></script>\n",0);

	    // set route 
	    Config::addRoute('ThemeSwitcher','GET','CLASS','ThemeSwitcher',"$sel_thm");

	    // set the placeholder code
	    $this->set_ts_div();
        }
    }

    public function from_router($route)
    {
        echo json_encode(array( 'status' => TRUE,
				'themes' => $this->get_themes(),
				'theme' => "$route[OPTS]",
				'path' => Content::get('[THEMEFOLDER]')
			));
	exit;
    }
}

?>
