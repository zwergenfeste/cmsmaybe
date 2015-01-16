
$('#login').closest('ul').addClass('pull-right');

$('#accInput').focus();

// $(document).ready(function(){
    $(".tooltips").tooltip({
	html: 'true'
    });

    $("#contactform").submit(function(){
	$("#contactwaiter").toggle();
    });

    $('#toc').toc({ 'selectors': 'h1,h2', 'highlightOffset': -200 });

    $('#toc').on('affix.bs.affix',function(){
        $('#wrap').removeClass('container').addClass('container-fluid');
        $('nav').hide();
        $('.logo').hide();
        $('body').css('padding','60px 30px 0px 270px');
	$('#backtotop').show();
	$('#toc-hidden').show();
    });

    $('#toc').on('affix-top.bs.affix',function(){
        $('#wrap').removeClass('container-fluid').addClass('container');
        $('body').css('padding','0');
        $('nav').show();
        $('.logo').show();
	$('#backtotop').hide();
	$('#toc-hidden').hide();
    });

    setTimeout(function(){
	// has to load after the event-handler! bs-bug
	var windowWidth = $(window).width();

	if(windowWidth > 970)
	{
	    $('#toc').clone().insertAfter('#toc').attr("id","toc-hidden");
	    $('#toc').prepend('<div id="backtotop"></div>');
	    $('#toc').affix({
		offset: {
		    top: 220
		}
	    });
	}
	else
	{
	    if ( $( "#toc" ).length ) 
	    {
		$('body').prepend('<div id="scrollup"></div>');

		//Check to see if the window is top if not then display button
		$(window).scroll(function(){
		    if ($(this).scrollTop() > 180) {
			$('#scrollup').fadeIn();
		    } else {
			$('#scrollup').fadeOut();
		    }
		});
	    }
	}

	//Click event to scroll to top
	$('#scrollup, #backtotop').click(function(){
	    if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) 
	    {          
		window.scrollTo(0,0);
	    }
	    else
	    {

		$('html,body').animate({scrollTop : 0}, 800, function(){
		    $('html,body').clearQueue();
		});
	    }
	});
    }, 200);
// });
