

$(document).ready(function(){

    // Controla a interação do botão Seguir para o Topo

    jQuery(window).load(function() {
        jQuery("#backtotop").hide().removeAttr("href");
        if (jQuery(window).scrollTop() != "0") {
            jQuery("#backtotop").fadeIn("slow");
            if (basalstyle.HeaderFloat)
                jQuery("#header-frame").addClass("header-float");
        }
        var scrollDiv = jQuery("#backtotop");
        jQuery(window).scroll(function(){
            if (jQuery(window).scrollTop() == "0") {
                jQuery(scrollDiv).fadeOut("slow");
                if (basalstyle.HeaderFloat)
                    jQuery("#header-frame").removeClass("header-float");
            } else {
                jQuery(scrollDiv).fadeIn("slow")
                if (basalstyle.HeaderFloat)
                    jQuery("#header-frame").addClass("header-float");
            }
        });
    });

    $('#backtotop').click(function() {
        $('body,html').animate({scrollTop:0},2500,"easeOutQuart");
    });

    $( "article figure, article pre, article .table-wrapper, .entry-title" ).each(function() {
        height_int = Math.ceil( $( this ).outerHeight() / 30);
        $( this ).addClass( 'min-h-' + height_int );
    });


});
