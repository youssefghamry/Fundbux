/* ===================================================================
    Author          : Modina Theme
    Version         : 1.3.1
* ================================================================= */

(function($) {
    "use strict";

    $(document).ready( function() {

        new WOW().init();

        if($('.brands-carousel-active').length > 0) {
            $(".brands-carousel-active").owlCarousel({ 
                margin: 30,                                                                          
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items: 1,                    
                    },
                    // breakpoint from 768 up
                    480 : {
                        items: 2
                    },
                    // breakpoint from 768 up
                    768 : {
                        items: 3
                    },
                    // breakpoint from 992 up
                    992 : {
                        items: 3
                    },
                    
                    1191 : {
                        items: 4
                    }
                }
            });
        }

        /* =============================================
            # Magnific popup init
         ===============================================*/
        $(".popup-link").magnificPopup({
            type: 'image',
            fixedContentPos: false
        });

        $(".popup-gallery").magnificPopup({
            type: 'image',
            fixedContentPos: false,
            gallery: {
                enabled: true
            },
            // other options
        });

        $(".popup-video, .popup-vimeo, .popup-gmaps").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });        

        //# Smooth Scroll
        $('#responsive-menu a').on('click', function(event) {
            var $anchor = $(this);
            var headerH = '85';
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
            }, 1000, 'easeInOutExpo');
            event.preventDefault();
        });

        // Sticky Menu
        $(window).scroll(function() {
            var Width = $(document).width();

            if ($("body").scrollTop() > 100 || $("html").scrollTop() > 100) {
                if (Width > 767) {
                    $("header").addClass("sticky");
                }
            } else {
                $("header").removeClass("sticky");
            }
        });

        $('.container').imagesLoaded(function() {
            $('.causes-cat-filter').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });

            var $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                percentPosition: true,
            });
        });

        $('.container').imagesLoaded(function() {
            $('.event-cat-filter').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });

            var $grid = $('.grid').isotope({
                itemSelector: '.single-event-ticket',
                percentPosition: true,
            });
        });

        var catButton = '.causes-cat-filter button';

        $(catButton).on('click', function(){
            $(catButton).removeClass('active');
            $(this).addClass('active');
        });

        var eventButton = '.event-cat-filter button';

        $(eventButton).on('click', function(){
            $(eventButton).removeClass('active');
            $(this).addClass('active');
        });

        var amountButton = '.donate-amount-buttons span';

        $(amountButton).on('click', function(){
            $(amountButton).removeClass('active');
            $(this).addClass('active');
        });

        $('.price-raised span, .our-experience h2, .single-fact .digit span, .digit-count span').counterUp({
            delay: 15,
            time: 2200,
        });

        $(function() {
            var skillprogress = '.skillprogress';
            if(skillprogress.length > 0) {
                $(skillprogress).easyPieChart({                
                    onStep: function(from, to, percent) {
                        $(this.el).find('.percent').text(Math.round(percent));
                    },
    
                    barColor: '#d55342',
                    trackColor: '#ededed',
                    scaleColor: 'black',
                    scaleLength: 0,
                    lineCap: 'round',
                    lineWidth: 10,                
                    size: 180,
                });
            }
        });

        $('#hamburger').on('click', function() {            
            $('.mobile-nav').addClass('show');
            $('.overlay').addClass('active');
        });

        $('.close-nav').on('click', function() {            
            $('.mobile-nav').removeClass('show');            
            $('.overlay').removeClass('active');          
        });

        $(".overlay").on("click", function () {
            $(".mobile-nav").removeClass("show");
            $('.overlay').removeClass('active');
        });

        $("#mobile-menu").metisMenu();

        /*---------------------------------------------
        Scroll up
        ---------------------------------------------*/
        function scrollUpShowHide() {
            if ($('#scrollUp').length) {

                $(window).scroll(function () {
                    var scroll = $(window).scrollTop();
                    if (scroll > 200) {
                        $("#scrollUp").addClass("active");
                    } else {
                        $("#scrollUp").removeClass("active");
                    }
                });

                $('#scrollUp').on('click', function(e){
                    e.preventDefault();
                    $("html, body").animate({
                        scrollTop: 0
                    }, 900);    
                });
            };
        };
        scrollUpShowHide();

    }); // end document ready function


    function loader() {
        $(window).on('load', function() {
            // Animate loader off screen
            $(".preloader").addClass('loaded');
            $(".preloader").delay(500).fadeOut();                        
        });
    }

    loader();
})(jQuery); // End jQuery
