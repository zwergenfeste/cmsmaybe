<?php

class TEST extends Core 
{
    public $priority = 100;
    public $auth = FALSE;
    public $role = 'admin';
    public $some_setting = 'default value';

    function from_router($route)
    {
	$output = "<h3>You called the test plugin!</h3>\n";
	$output .= "<p>This plugin shall help you to understand how plugins in CMSMayBe work - how to call them and how to pass options.</p>\n";
	$output .= "<p>You can call it over the following URIs:</p>\n";
	$output .= "<p><ul><li>your.domain/TEST</li><li>your.domain/TEST/arg1</li><li>your.domain/TEST/arg1/arg2</li></ul></p>\n";
	$output .= "<p>For more information (on a fresh installation!) click <a href='".Config::get('basedir')."Documentation'>here</a> else go to <a href='https://cmsmaybe.org/Documentation'>cmsmaybe.org/Documentation</a></p>\n";
	$output .= "<p><b>Output from the test plugin:</b></p>";

	$output .= '<br><pre>Configuration: '.$this->some_setting.'</pre>';

	if($route['URI'] == "TEST")
	{
	    $output .= "<pre>".str_replace(","," ",$route['OPTS'])."</pre>"; 
	}

	if(preg_match("/^TEST\/{ARG1}/",$route['URI']))
	{
	    $output .= "<pre>";
	    $output .= print_r($route,true);
	    $output .= "</pre>";
	}

	return $output;
    }

    function from_main()
    {
	Config::addRoute('TEST','GET','CLASS','TEST','Hello,World');
	// strange things like the following work, but you have to respect the order
	Config::addRoute('TEST/{ARG1}/{ARG2}','GET','CLASS','TEST');
	Config::addRoute('TEST/{ARG1}','GET','CLASS','TEST');
    }
}

?>
