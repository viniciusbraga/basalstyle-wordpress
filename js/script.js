

$(document).ready(function(){

    // BackToTop: you can change the speed of the scroll below
    jQuery(window).load(function() {
        jQuery("#backtotop").hide().removeAttr("href");
        if (jQuery(window).scrollTop() != "0")
            jQuery("#backtotop").fadeIn("slow")
        var scrollDiv = jQuery("#backtotop");
        jQuery(window).scroll(function(){
            if (jQuery(window).scrollTop() == "0")
                jQuery(scrollDiv).fadeOut("slow")
            else
                jQuery(scrollDiv).fadeIn("slow")
        });
    });

    $('#backtotop').click(function() {
        $('body,html').animate({scrollTop:0},2500,"easeOutQuart");
    });


});
