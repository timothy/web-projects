$(window).on('hashchange', function() {
    $('div.tab').hide();
    $(location.hash).show();
});

$('a.hash').on('click', function(e){
    e.preventDefault();
    location.hash = $(this).data('hash');
});