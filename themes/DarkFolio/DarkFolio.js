
$(document).ready(function(){
    $(".tooltips").tooltip({
	html: 'true'
    });

    $("#contactform").submit(function(){
	$("#contactwaiter").toggle();
    });

    $('#login').closest('ul').addClass('pull-right');

    $('#toc').toc({ 'selectors': 'h1,h2'});

    $('#toc').on('affix.bs.affix',function(){
        $('#wrap').removeClass('container').addClass('container-fluid');
        $('#wrap').css('padding','0 13%');
        $('#content').css('padding-right','180px');
	$('#backtotop').show();
	$('#toc-hidden').show();
        $('#toc').wrap('<div id="tocsub"></div>');
    });

    $('#toc').on('affix-top.bs.affix',function(){
        $('#wrap').removeClass('container-fluid').addClass('container');
        $('#wrap').css('padding','0');
        $('#content').css('padding-right','60px');
	$('#backtotop').hide();
	$('#toc-hidden').hide();
        if ( $('#toc').parent().is( "#tocsub" ) ) {
	    $('#toc').unwrap();
        }
    });

    setTimeout(function(){
	// has to load after the event-handler! bs-bug
	var windowWidth = $(window).width();

	// alert(screen.width + '::' + windowWidth);

	if(windowWidth > 970)
	{
	    $('#toc').clone().insertAfter('#toc').attr("id","toc-hidden");

	    $('#toc').prepend('<div id="backtotop"></div>');

	    $('#toc').affix({
		offset: {
		    top: 250
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
		    if ($(this).scrollTop() > 180) 
		    {
			$('#scrollup').fadeIn();
		    } 
		    else 
		    {
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
});
