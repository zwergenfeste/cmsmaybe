<?php

class OnePage extends Core 
{
    public $priority = 100;
    public $auth = FALSE;

    # fields: page, contents
    # fields: real page, CSS ID, CSS class

    private $pages = array(
	array('onepage','contents' => array(
	    array('Home','home',''),
	    array('Documentation','docu',''),
	    array('Download','download',''),
	    array('Contact','contact',''),
	    array('Donations','donations',''),
	    ),
	),
    );

    function from_router($route)
    {
	foreach($this->pages as $page)
	{
	    if($page[0] == $route['URI'] || ($route['URI'] == '' && $page[0] == Config::get('default_page')))
	    {
		$content = '';

		foreach($page['contents'] as $conts)
		{
		    Config::set('request',array('URI' => $conts[0],'method' => 'GET','status' => '200'));

		    Content::set('[CONTENT]',Config::$Router->load_content());

		    Config::$Plugin->from_after_content();

		    $content .= '<section id="'.$conts[1].'" class="'.$conts[2].'"><div>'.Content::get('[CONTENT]').'</div></section>';
		}

		return $content;
	    }
	}


    }

    function from_main()
    {
	Config::addRoute('onepage','GET','CLASS','OnePage');
    }
}

?>
