$(init);

function init (){
    $('.responsive_menu').click(function() {
        $('.responsive_menu, .menu').toggleClass('active');
        $('.menu').toggleClass('responsive');
    });
}