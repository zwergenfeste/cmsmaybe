<?php

class MarkDown extends Core 
{
    public $priority = 10;

    function from_after_content() 
    {
	if(file_exists(Config::get('plugin_folder').'/'.$this->name.'/'.'Parsedown.php'))
	{
	    require_once('Parsedown.php');

	    Content::set('[CONTENT]',Parsedown::instance()
		->setBreaksEnabled(false)
		->setMarkupEscaped(false)
		->text(Content::get('[CONTENT]'))
  	    );
	}
    }
}
