

/***********************************
    MESSAGE
***********************************/

// add a message to a message box, context and type can be omitted.
function add_msg(msg, context, type) {
    context = typeof context !== 'undefined' ? context : 'Info';
    type = typeof type !== 'undefined' ? type : 'alert-info';

    $('#msgbox').append(
	$('<div />').addClass('alert').addClass(type).append(
	    '<a class="close" data-dismiss="alert">&times;</a>',
	    '<strong>' + context + ':</strong> ' + msg
	)
    );
}

/***********************************
    BROWSE
***********************************/

// set breadcrumb
function set_breadcrumb() {
    // clear
    $('ol#breadcrumb').html('<li><a href="">data</a></li>');

    // add parts
    var parts = PATH.split('/');
    var html = '';
    var link = '';

    for (var i = 0; i < parts.length; i++) 
    {
	if (i != parts.length - 1) 
	{
	    link += i == 0 ? parts[i] : '/' + parts[i];
	    html += '<li><a href="' + link + '">' + parts[i] + '</a></li>';
	} 
	else 
	{
	    html += '<li class="active">' + parts[i] + '</li>';
	}
    }

    $('ol#breadcrumb').append(html);

    // register click event
    $('ol#breadcrumb a').click(function (e) {
	e.preventDefault();
	browse($(e.target).attr('href'));
    });
}

// disables tools if path is root
function toggle_tools() {
    if(PATH.length == 0)
    {
	$('#upload-button').addClass('disabled');
	$('#new-file-button').addClass('disabled');
	$('#new-folder-button').addClass('disabled');
    }
    else
    {
	$('#upload-button').removeClass('disabled');
	$('#new-file-button').removeClass('disabled');
	$('#new-folder-button').removeClass('disabled');
    }
}

// ajax request for new path
function browse(path) {
    $.ajax({
	url: baseurl + 'filemgr/browse/' + path,
	dataType: 'json',
	success: function (result) {
	    if (result.status)
	    {
		show_content(path, result.files);
	    }
	    else
	    {
		add_msg(result.msg, 'PHP', 'alert-danger');
	    }
	},
	error: function (jqXHR, status) {
	    add_msg(status, 'AJAX', 'alert-danger');
        }
    });
}

// ajax succaess callback, add breadcrumb and content to table
function show_content(path, files) {
    PATH = path;

    set_breadcrumb();

    toggle_tools();

    $('table#filemanager').empty();

    for (var i = 0; i < files.length; i++) 
    {
	var f = files[i];

	if (f.folder) 
	{
	    f.icon = 'fa fa-folder fa-spcer';
	    f.name = $('<a />').attr('href', f.link).text(f.name).click(function (e) {
		e.preventDefault();
		browse($(e.target).attr('href'));
	    });
	    f.edit = '';
	} 
	else 
	{
	    f.icon = 'fa fa-file-o fa-spcer';
	    f.name = '<a href="' + f.link + '">' + f.name + '</a>';

	    // edit action
	    f.edit = $('<a />').attr('href', f.link).html('<i class="fa fa-pencil"></i>').click(function (e) {
		e.preventDefault();
		$.ajax({
		    url: baseurl + 'filemgr/edit/' + $(e.target).parent().attr('href'),
		    dataType: 'json',
		    success: function (result) {
			if(result.status)
			{
			    $('div#msgbox').empty();
			    $('#editor').prepend('<div class="summernote"></div>');
            		    $('#editor input#editor-target').val($(e.target).parent().attr('href'));
			    $('.summernote').html(result.msg);
			    $('.summernote').summernote({
				height: 300,
				focus: true,
			    });
			    $('#browser').hide();
			    $('#editor').show();
			}
			else
			{
			    add_msg(result, 'PHP', 'alert-danger');
			}
          	    },
		    error: function (jqXHR, status) {
			add_msg(status, 'AJAX', 'alert-danger');
		    }
		});
	    });
	}

	// move action
	f.move = $('<a />').attr('href', f.link).html('<i class="fa fa-arrow-right"></i>').click(function (e) {
	    e.preventDefault();
	    $('div#move input#move-src').val($(e.target).parent().attr('href'));
	    $('div#move input#move-dst').val(PATH == '' ? '' : (PATH + '/'));
	    $('div#move').modal('show');
	});

	// remove action
	f.remove = $('<a />').attr('href', f.link).html('<i class="fa fa-remove"></i>').click(function (e) {
	    e.preventDefault();
	    $('div#remove input#remove-path').val($(e.target).parent().attr('href'));
	    $('div#remove').modal('show');
	});

	// add rows
	$('table#filemanager').append(
	    $('<tr />').append(
		$('<td />').append('<i class="' + f.icon + '"></i> ', f.name),
		$('<td />').text(f.size),
		$('<td />').text(f.date),
		$('<td />').text(f.perm),
		$('<td style="text-align:right">').append(f.edit, ' ', f.move, ' ', f.remove)
	    )
	);
    }
}

/***********************************
   PROGRESS BAR
***********************************/

// callback for progress bar
function progress_bar(e) {
    var done = e.position || e.loaded;
    var total = e.totalSize || e.total;
    var per = (Math.floor(done / total * 1000) / 10);
    $('div#progress > div.bar').css('width', per + '%').text(per + ' %');
}

/***********************************
   MODAL SUBMIT
***********************************/

$('div#new a.submit').click(function (e) {
    $.ajax({
	url: baseurl + 'filemgr/' + $('div#new input#new-type').val() + '/' + $('div#new input#new-path').val(),
	cache: false,
	dataType: 'json',
	type: 'POST',
	success: function (result) {
	    add_msg(result.msg, 'PHP', result.status ? 'alert-success' : 'alert-danger');
	    browse(PATH);
	},
	error: function (jqXHR, status) {
	    add_msg(status, 'AJAX', 'alert-danger');
	}
    });
});

$('div#remove a.submit').click(function (e) {
    $.ajax({
	url: baseurl + 'filemgr/remove/' + $('div#remove input#remove-path').val(),
	cache: false,
	dataType: 'json',
	type: 'DELETE',
	success: function (result) {
	    add_msg(result.msg, 'PHP', result.status ? 'alert-success' : 'alert-danger');
	    browse(PATH);
	},
	error: function (jqXHR, status) {
	    add_msg(status, 'AJAX', 'alert-danger');
	}
    });
});

$('div#move a.submit').click(function (e) {
    $.ajax({
	url: baseurl + 'filemgr/move/' + $('div#move input#move-src').val(),
	cache: false,
	dataType: 'json',
	data: {
	    dest: $('div#move input#move-dst').val()
	},
	type: 'POST',
	success: function (result) {
	    add_msg(result.msg, 'PHP', result.status ? 'alert-success' : 'alert-danger');
	    browse(PATH);
	},
	error: function (jqXHR, status) {
	    add_msg(status, 'AJAX', 'alert-danger');
	}
    });
});

$('div#upload a.submit').click(function (e) {
    $.ajax({
	url: baseurl + 'filemgr/upload/' + $('div#upload input#upload-path').val(),
	cache: false,
	contentType: false,
	processData: false,
	dataType: 'json',
	data: new FormData($('div#upload form')[0]),
	type: 'POST',
	success: function (result) {
	    $('div#progress').hide();
	    add_msg(result.msg, 'PHP', result.status ? 'alert-success' : 'alert-danger');
	    browse(PATH);
	},
	error: function (jqXHR, status) {
	    $('div#progress').hide();
	    add_msg(status, 'AJAX', 'alert-danger');
	},
	xhr: function() {
	    var x = $.ajaxSettings.xhr();
	    if (x.upload)
		x.upload.addEventListener('progress', progress_bar, false);
	    return x;
	}
    });

    $('div#progress div.bar').css('width', 0);
    $('div#progress').show();
});


/***********************************
    TOOLBOX BUTTONS
***********************************/

$('div#tools a#upload-button').click(function (e) {
    e.preventDefault();
    $('div#upload input#upload-path').val((PATH == '' ? '' : (PATH + '/')));
    $('div#upload').modal('show');
});

$('div#tools a#new-file-button').click(function (e) {
    e.preventDefault();
    $('div#new input#new-type').val('file');
    $('div#new input#new-path').val(PATH == '' ? '' : (PATH + '/'));
    $('div#new').modal('show');
});

$('div#tools a#new-folder-button').click(function (e) {
    e.preventDefault();
    $('div#new input#new-type').val('folder');
    $('div#new input#new-path').val(PATH == '' ? '' : (PATH + '/'));
    $('div#new').modal('show');
});

$('div#tools a#refresh-button').click(function (e) {
    browse(PATH);
});

$('div#tools a#clear-msgbox-button').click(function (e) {
    $('div#msgbox').empty();
});


/***********************************
    EDITOR BUTTONS
***********************************/

$('#editor .ed-close').click(function (e) {
    e.preventDefault();
    $('#editor').hide();
    $('#browser').show();
    $('.summernote').destroy().remove();
});

$('#editor .ed-submit').click(function (e) {
    content = $('div#editor .note-editable').html();

    if($('div.note-editor').hasClass('codeview'))
    {
	content = $('div#editor .note-codable').val();
    }

  $.ajax({
    url: baseurl + 'filemgr/save/' + $('div#editor input#editor-target').val(),
    cache: false,
    dataType: 'json',
    data: { content: content },
    type: 'POST',
    success: function (result) {
      add_msg(result.msg, 'PHP', result.status ? 'alert-success' : 'alert-danger' );
    },
    error: function (jqXHR, status) {
      add_msg(status, 'AJAX', 'alert-danger' );
    }
  });
});


