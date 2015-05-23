<?php

class OnePage extends Core 
{
    public $priority = 100;
    public $auth = FALSE;
    private $pages = array(
	array('main','contents' => array(
	    array('Welcome','welcome','slidepage image-background'),
	    array('Intro','introduction','slidepage image-background row'),
	    array('Idea','idea','slidepage image-background row'),
	    array('More','more','slidepage image-background row'),
	    array('Statuten','statuten','slidepage image-background doccontent'),
	    array('Service-Reglement','reglement','slidepage image-background doccontent'),
	    array('Servicetext','servicetext','slidepage image-background row'),
	    array('Services','services','slidepage image-background row'),
	    array('Membership','membership','slidepage image-background row'),
	    array('Contact','contact','slidepage image-background row'),
	    )
	)
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

		    $this->handle_request();
		
		    #$content .= '<section id="'.$conts[1].'" class="'.$conts[2].'"><div class="wap"></div><div class="int">'.Content::get('[CONTENT]').'</div></section>';
		    $content .= '<section id="'.$conts[1].'" class="'.$conts[2].'"><div>'.Content::get('[CONTENT]').'</div></section>';
		}

		return $content;
	    }
	}


    }

    function from_main()
    {
	Config::addRoute('main','GET','CLASS','OnePage');
	Config::addRoute('','GET','CLASS','OnePage');
    }
}

?>
