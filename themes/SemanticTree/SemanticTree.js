
$(document).ready(function(){
    $(".tooltips").popup({ 
	variation: 'inverted', 
    });

    $('.ui.dropdown').dropdown({ on: 'hover'});

    $('.tp-body #mainbanner').transition('scale in');

    $("#contactform").submit(function(){
	$("#contactwaiter").toggle();
    });

    $('#login').closest('ul').addClass('pull-right');

    if ( $( "#toc" ).length ) {
    	$('#toc').toc({'selectors': 'h1,h2'});
	$('#toc').clone().insertAfter('#toc').attr("id","toc-clone");
	$('body').prepend('<div id="sidebar" class="ui sidebar"></div>');
	$('#toc').prependTo('#sidebar');
	$('#toc').prepend('<div id="backtotop" class="ui button circular icon"><i class="upico"></i></div>');
	$('body').prepend('<div id="sidebarbtn" class="ui right attached black button"><i class="menuico"></i><span>Contents</span></div>');
	$('#sidebarbtn').click(function(){ $('#sidebar').sidebar('toggle');});

	$('#sidebarbtn').hover(function(){
	   $(this).stop().animate({ width: '+=120px' }, 400);
	   $('#sidebarbtn span').show();
	},
	function(){
	   $(this).stop().animate({ width: '-=120px' }, 400);
	   $('#sidebarbtn span').hide();
	});

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
    }
});
