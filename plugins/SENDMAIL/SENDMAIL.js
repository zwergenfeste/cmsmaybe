
function mailer_msg(msg, type) {
    type = typeof type !== 'undefined' ? type : 'alert-info';

    $('#mailermesg').append(
	$('<div />').addClass('alert').addClass(type).append(
	    msg
	)
    );
    setTimeout(function(){ $('#mailermesg').empty(); }, 2000);
}

// German validate example messages
/*
$("#mailerform").validate({
    messages: {
	CFname: "Bitte gib einen Namen an.",
	CFemail: "Bitte gib deine eMail Adresse an.",
	CFmesg: "Bitte gib eine Nachricht ein."
    }
});
*/

$('#mailerform .submit').click(function(e) {
    e.preventDefault();
    if ( $('#mailerform').valid() ) {
	$('#mailerwait').show(0);
	$.ajax({
	    url: $('#mailerform').attr('action').split('/')[0] + '/ajax/sendmail',
	    cache: false,
	    data: $("#mailerform").serializeArray(),
	    type: 'POST',
            dataType: 'json',
	    success: function (result) {
		mailer_msg(result.msg, result.status ? 'alert-success' : 'alert-danger');
	    },
	    error: function (jqXHR, status) {
		mailer_msg(status, 'alert-danger');
	    }
	});
        $('#mailerwait').hide(0);
    }
});

