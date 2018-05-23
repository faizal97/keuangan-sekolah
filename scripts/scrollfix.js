var elementPosition = $('.menu').offset();

    $(window).scroll(function () {
        if ($(window).scrollTop() > elementPosition.top) {
            $('.menu').css('position', 'fixed').css('top', '0');
        } else {
            $('.menu').css('position', 'static');
        }
     });