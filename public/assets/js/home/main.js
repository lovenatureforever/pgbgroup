(function ($) {
	"use strict";

    jQuery(document).ready(function($){



       







        $(".think-active").owlCarousel({
            items:3,
            nav:true,
            dot:true,
            loop:true,
            margin:0,
            navText:['<i class="fal fa-long-arrow-left"></i>','<i class="fal fa-long-arrow-right"></i>'],
            autoplay:false,
            autoplayTimeout:3000,
            smartSpeed:1000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                   
                },
                768:{
                    items:2,
                   
                },
                1000:{
                    items:3,
                   
                }
            }
            
          
        });

       
            //  offcanvas-menu

        //    click-action
        $(".bar").on("click", function() {
            $(".offcanva, .overlay").addClass("active");
            return false;
        });

        $(".cross").on("click", function() {
            $(".offcanva, .overlay").removeClass("active");
        });

        $(".overlay").on("click", function() {
            $(".offcanva, .overlay").removeClass("active");
        });
  


       




    });


    jQuery(window).load(function(){


    });


}(jQuery));	