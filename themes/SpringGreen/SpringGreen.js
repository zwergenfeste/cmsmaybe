
$('#login').closest('ul').removeClass('pull-right');

$('#toc').on('affix.bs.affix',function(){
    $('#wrap').removeClass('col-md-6 col-md-offset-3');
    $('#wrap').css('padding','0 80px 0 80px');
});

$('#toc').on('affix-top.bs.affix',function(){
    $('#wrap').addClass('col-md-6 col-md-offset-3');
    $('#wrap').css('padding','0');
});


