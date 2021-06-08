

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

    $("#header-frame").click(function(e) {
        if (e.shiftKey) {
              $("body").prepend('<label class="btnDebug" for="debug"> Grid <input type="checkbox" id="debug" onclick=\'var e=document.getElementsByTagName("body")[0],c="debug",re=new RegExp("(?:^|\\\\s)"+c+"(?!\\\\S)","g");if(e.className.match(re)){e.className=e.className.replace(re,"");}else{e.className+=" "+c;this.checked=true;}\'></label>');
        }
    });

});
