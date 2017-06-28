export default {
    init() {
        // JavaScript to be fired on all pages
        // build scene
        $('.article').mouseenter(function () {            
            if ($(this).data('panel')) {
                $('.panel').hide();
                $('#' + $(this).data('panel')).show();
            }
        });
        $('.article').mouseleave(function () {
            $('.panel').hide();
        });
    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
    },
};
