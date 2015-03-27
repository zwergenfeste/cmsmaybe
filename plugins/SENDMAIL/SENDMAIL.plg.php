<?php

class SENDMAIL extends Core 
{
    private $rcpt = 'info@cmsmaybe.org';
    private $subject = '[CMSMayBe-Mailer]';
    private $lang_out = array();

    function __construct()
    {
        $this->lang_out = array('en' => array('ok' => 'Email was successfully sent.', 
					      'no' => 'Email was not sent!'),
				'de' => array('ok' => 'Nachricht wurde erfolgreich gesendet.', 
					      'no' => 'Nachricht wurde nicht gesendet!')
			  );
    }

    function from_router($route)
    {
	$subject = $this->subject;
        $lang = Config::$Lang->get();

	if($route['URI'] == '{ORIGIN}/ajax/sendmail')
	{
	    $ajax = true;
	}
	else
	{
            $ajax = false;
	}

	$rcpt = Config::get('sendmail_rcpt');

	if($rcpt == '')
	{
	    $rcpt = $this->rcpt;
	}

        $header = "From: $rcpt" . "\r\n" .
                  "Reply-To: $rcpt" . "\r\n" .
                  'X-Mailer: PHP/' . phpversion();

	$name = Browser::get_r('CFname');
	$email = Browser::get_r('CFemail');
	$phone = Browser::get_r('CFphone');
	$mesg = Browser::get_r('CFmesg');
	$subject = Browser::get_r('CFsubject')." $name $email";

	$msg = "$name\n$email\n$phone\n\n$mesg";

	if(mail($rcpt,$subject,$msg))
	{
	    if($ajax)
	    {
	        $status = true;
	        $msg = $this->lang_out[$lang]['ok'];
	    }
	    else
	    {
	        Browser::set_s('sendMail',0);
	    }
	}
	else
	{
	    if($ajax)
	    {
	        $status = false;
	        $msg = $this->lang_out[$lang]['no'];
	    }
	    else
	    {
	        Browser::set_s('sendMail',1);
	    }
	}	

	if($ajax)
	{
	    echo json_encode(array('status' => $status,'msg' => $msg));
	}
	else
	{
	    header("Location: ".Config::get('host_URL').Config::get('basedir').$route['RES']['ORIGIN']);
	}
	exit;
    }

    function from_main()
    {
	// You can remove the comment from the following lines to use sendmail with ajax but it will add more HTTP requests (copy the code of the files is better).
	#Content::add("[TEMPLATE]","</head>","\t<link rel='stylesheet' href='".$this->path.$this->name.".css'>\n\t",0);
	#Content::add("[TEMPLATE]","</body>","\t<script type='text/javascript' src='".$this->path."validate/jquery.validate.min.js'></script>\n\t",0);
	#Content::add("[TEMPLATE]","</body>","\t\t<script type='text/javascript' src='".$this->path.$this->name.".js'></script>\n\t",0);

	Config::addRoute('{ORIGIN}/ajax/sendmail','POST','CLASS','SENDMAIL');
	Config::addRoute('{ORIGIN}/sendmail','POST','CLASS','SENDMAIL');

	$status = Browser::get_s('sendMail');

	if($status != "")
	{
            $lang = Config::get('language');

	    if($status == 0)
	    {
	        $msg = '<div class="alert alert-success ui success message">'.$this->lang_out[$lang]['ok'].'</div>';
	    }
	    else
	    {
	        $msg = '<div class="alert alert-danger ui error message">'.$this->lang_out[$lang]['no'].'</div>';
	    }

	    Content::set('[MAILERMSG]',$msg);

	    Browser::del_s('sendMail');
	}
	else
	{
	    Content::set('[MAILERMSG]','');
	}
    }
}

?>
