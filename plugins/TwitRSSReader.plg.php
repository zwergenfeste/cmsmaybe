<?php

class TwitRSSReader
{
    private $RSS_Content;
    private $URL = 'http://twitrss.me/twitter_user_to_rss/?user=';

    private function RSS_Tags($item, $type)
    {
        $y = array();
        $tnl = $item->getElementsByTagName("title");
        $tnl = $tnl->item(0);
        $title = $tnl->firstChild->textContent;

        $tnl = $item->getElementsByTagName("link");
        $tnl = $tnl->item(0);
        $link = $tnl->firstChild->textContent;
		
        $tnl = $item->getElementsByTagName("pubDate");
        $tnl = $tnl->item(0);
        $date = @$tnl->firstChild->textContent;		

        $tnl = $item->getElementsByTagName("description");
        $tnl = $tnl->item(0);
        $description = $tnl->firstChild->textContent;

        $y["title"] = $title;
        $y["link"] = $link;
        $y["date"] = $date;		
        $y["description"] = $description;
        $y["type"] = $type;
		
        return $y;
    }

    private function RSS_Channel($channel)
    {
        $items = $channel->getElementsByTagName("item");
        $y = $this->RSS_Tags($channel, 0);
        array_push($this->RSS_Content, $y);
	
        foreach($items as $item)
        {
	    $y = $this->RSS_Tags($item, 1);
	    array_push($this->RSS_Content, $y);
        }
    }

    private function RSS_Retrieve($url)
    {
        $doc  = new DOMDocument();
        if(@$doc->load($url))
	{
            $channels = $doc->getElementsByTagName("channel");
	
            $this->RSS_Content = array();
	
            foreach($channels as $channel)
            {
	        $this->RSS_Channel($channel);
            }

	    return TRUE;
	}
	else
	{
	    $this->FAIL = 'Could not load '.$url;
	    return FALSE;
	}	
    }

    private function HTML_Output($url, $size = 200, $site = 0, $withdate = 1)
    {
        $opened = false;
        $page = "";

        $page = "<h1>[PAGENAME]</h1>\n";

        $site = (intval($site) == 0) ? 1 : 0;

        if(!$this->RSS_Retrieve($url))
	{
	    return $this->FAIL;	
	}

        if($size > 0)
        {
            $recents = array_slice($this->RSS_Content, $site, $size + 1 - $site);
        }

        foreach($recents as $article)
        {
	    $type = $article["type"];

	    if($type == 0)
	    {
                if($opened == true)
	        {
		    $page .="</ul>\n";
		    $opened = false;
	        }
	
	        $page .="<b>";
	    }
	    else
	    {
	        if($opened == false) 
	        {
		    $page .= "<ul id='[PAGENAME]'>\n";
		    $opened = true;
	        }
	    }
	
	    $title = $article["title"];
	    $link = $article["link"];
	    $page .= "<li class=\"ui raised segment\"><a href=\"$link\" target=\"_blank\">";

	    if($withdate)
	    {
	        $date = substr($article["date"],0,-6);
	        $page .='<span class="rssdate">'.$date.'</span>';
	    }

	    $description = $article["description"];

	    if($description != false)
	    {
	        $page .= "<span class='rssdesc'>$description</span>";
	    }

	    $page .= "</a></li>\n";			
		
	    if($type==0)
	    {
	        $page .="</b><br />";
	    }
        }

        if($opened == true)
        {	
	    $page .="</ul>\n";
        }

        return $page."\n";
    }

    private function RSS_Output($url)
    {
	header('Content-Type: text/xml');

	echo file_get_contents($url);
	exit;
    }

    function from_router($route)
    {
	$opts = explode(",",$route['OPTS']);

	$kind = $opts[0];

	$url = $this->URL.$opts[1];

	if($kind == 'RSS')
	{
	    return $this->RSS_Output($url);
	}
	else
	{
	    return $this->HTML_Output($url);
	}
    }

    function from_main()
    {
	Config::addRoute('News','GET','CLASS','TwitRSSReader','HTML,CMSMayBe');
	Config::addRoute('RSS','GET','CLASS','TwitRSSReader','RSS,CMSMayBe');
    }
}

?>
