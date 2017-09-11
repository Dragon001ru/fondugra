$(document).ready(function () {

    $('.js-scheme-popup-ctrl').on('click', function (event) {
        event.preventDefault();
        $('.js-scheme-popup-ctrl').not($(this)).siblings('.js-scheme-popup').fadeOut(200).parents('.js-scheme-popup-parent').removeClass('scheme__b_lt_top');
        $(this).siblings('.js-scheme-popup').fadeIn(200).parents('.js-scheme-popup-parent').addClass('scheme__b_lt_top');
    });

    $(document).click(function (e) {
        if ($(e.target).parents().andSelf().filter('.js-scheme-popup, .js-scheme-popup-ctrl').length != 1) {
            $('.js-scheme-popup').fadeOut(300).parents('.js-scheme-popup-parent').removeClass('scheme__b_lt_top');
        }
    });

    $( ".special-set" ).on('click', function() {
        $( ".aa-settings-popup" )
            .toggle();
    });

});