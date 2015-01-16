<?php

class SENDMAIL extends Core 
{
    private $rcpt = 'info@cmsmaybe.ch';
    private $subject = '[CMSMayBe-Mailer]';
    private $lang_out = array();

    function __construct()
    {
        $this->lang_out = array('en' => array('ok' => '<div class="alert alert-success ui success message">Email was successfully sent</div>', 
					      'no' => '<div class="alert alert-danger ui error message">Email was not sent.</div>')
			  );
    }

    function from_router($route)
    {
	$subject = $this->subject;

        $header = "From: $this->rcpt" . "\r\n" .
                  "Reply-To: $this->rcpt" . "\r\n" .
                  'X-Mailer: PHP/' . phpversion();

	$name = Browser::get_r('CFname');
	$email = Browser::get_r('CFemail');
	$phone = Browser::get_r('CFphone');
	$mesg = Browser::get_r('CFmesg');
	$subject = Browser::get_r('CFsubject')." $name $email";

	$msg = "$name\n$email\n$phone\n\n$mesg";

	if(mail($this->rcpt,$subject,$msg))
	{
	    Browser::set_s('sendMail',0);
	}
	else
	{
	    Browser::set_s('sendMail',1);
	}	

	header("Location: ".Config::get('host_URL').Config::get('basedir').$route['RES']['ORIGIN']);
	exit;
    }

    function from_main()
    {
	Config::addRoute('{ORIGIN}/sendmail','POST','CLASS','SENDMAIL');

	$status = Browser::get_s('sendMail');

        $lang = Config::get('language');

	if($status != "")
	{
	    if($status == 0)
	    {
	        $msg = $this->lang_out[$lang]['ok'];
	    }
	    else
	    {
	        $msg = $this->lang_out[$lang]['no'];
	    }

	    Content::set('[MAILERMSG]',$msg);
	}
	else
	{
	    Content::set('[MAILERMSG]','');
	}

	Browser::del_s('sendMail');
    }
}

?>
