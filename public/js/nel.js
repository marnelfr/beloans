jQuery(function ($) {
    $('.range').each(function () {
        var cls = $(this).attr('class');
        var elm = $(this).parent();
        $(this).parent().append('<div class="uirange"></div>');
        $(this).parent().find('.uirange').slider();
    });
});