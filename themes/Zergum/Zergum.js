
$(document).ready(function(){
    $("#contactform").submit(function(){
	$("#contactwaiter").toggle();
    });

    $('#toc').toc({'selectors': 'h1,h2'});

    setTimeout(function(){
	// has to load after the event-handler! bs-bug
	var windowWidth = $(window).width();

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

	//Click event to scroll to top
	$('#scrollup').click(function(){
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


