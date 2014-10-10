$(function () {
    $(".logo-image").hover(
        function () {
            $('.logo-image.color').stop().animate({"opacity": "1"}, 600);
        },
        function () {
            $('.logo-image.color').stop().animate({"opacity": "0"}, 100);
        });

});