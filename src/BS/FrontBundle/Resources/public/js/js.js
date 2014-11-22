$(function () {
    $(".logo-image").hover(
        function () {
            $('.logo-image.color').stop().animate({"opacity": "1"}, 600);
        },
        function () {
            $('.logo-image.color').stop().animate({"opacity": "0"}, 100);
        });

//    $("img.lazy").lazyload();

    $('.bxslider').bxSlider({
        mode: 'fade',
        auto: false,
//        autoControls: true,
        nextText: "",
        prevText: "",
        pause: 2000,
        slideWidth: 450,
        responsive: false,
        adaptiveHeight: false,
        pager:false

    });
});