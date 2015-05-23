
$(document).ready(function(){
    $('#TSform').prepend("\t\t\t\t<span class='TSclose'></span>\n");

    $("#TSbtn, #TSopen").click(function(){
	$('#TSwaiter').show();
	$("#TSback").toggle();
	$("#TSbtn").toggle();
	$("#TSwrap").toggle();

	$.ajax({
	    url: baseurl + 'ThemeSwitcher',
	    dataType: 'json',
	    success: function (r) {
		$('#TSwaiter').hide();
		display_themes(r.themes,r.theme,r.path);
	    }
	});
    });

    $(".TSclose").click(function(){
	$("#TSback").toggle();
	$("#TSbtn").toggle();
	$("#TSwrap").toggle();
        $('.TSradio').remove()
    });

    $('.TSradio').click(function(){
	$('#TSform').submit();	
    });
});

function display_themes(thm_arr,thm_act,path) {
    $.each( thm_arr, function(k,thm){
	if(thm_act == thm) { act = ' TSact'; }
	else { act = ''; }

	$('#TSbody').append('\t\t\t\t\t<button class="TSradio' + act + '" type="submit" name="selectTheme" id="thmrad' + k + '" value="' + thm + '"><span>' + thm + '</span><img class="TSdefault" src="' + path + '/' + thm + '/' + thm + '.png" alt=""></button>\n')
    });	
}

