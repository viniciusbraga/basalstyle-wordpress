

$(document).ready(function(){

    $(window).scroll(function() {
        if($(this).scrollTop() !== 0) {
            $('.toTop').fadeIn("slow");
        } else {
            $('.toTop').fadeOut("slow");
        }
    });

    $('.toTop').click(function() {
        $('body,html').animate({scrollTop:0},500);
    });


});
