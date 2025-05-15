(function ($) {
    "use strict";

    var appsa = {

        /* ============================================================ */
        /* StickyHeader
        /* ============================================================ */
        sticky_header: function() {
            var fixed_top = $(".header");
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 30) {
                    fixed_top.addClass("sticky");
                } else {
                    fixed_top.removeClass("sticky");
                }
            });
        },

        /* ============================================================ */
        /* Jquery Plugins Calling
        /* ============================================================ */
        onePageFunction: function(){
            $('header .main-menu a[href*="#"]:not([href="#"])').on('click', function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html,body').animate({
                          scrollTop: target.offset().top - 150,
                        }, 100);
                        return false;
                    }
                }
            });
        },

        /* ============================================================ */
        /* Mobile Menu Integration
        /* ============================================================ */
        mobile_menu: function() {
            //Clone Mobile Menu
            function cloneMobileMenu($cloneItem, $mobileLoc) {
                var $combinedmenu = $($cloneItem).clone();
                $combinedmenu.appendTo($mobileLoc);                
            }
            cloneMobileMenu("header .main-menu > ul", ".mobile-menu .menu");

            function mobile_menu(selector, actionSelector) {
                var mobile_menu = $(selector);
                mobile_menu.on("click", function() {
                    $(selector).toggleClass('is-menu-open');
                });
                
                var hamburgerbtn = $(selector);
                hamburgerbtn.on("click", function() {
                    $(actionSelector).toggleClass('is-menu-open');
                });
        
                $(document).on('click', function(e) {
                    var selectorType = $(actionSelector).add(mobile_menu);
                    if (selectorType.is(e.target) !== true && selectorType.has(e.target).length === 0) {
                        $(actionSelector).removeClass("is-menu-open");
                        $(selector).removeClass("is-menu-open");
                    }          
                });
            
            };
            mobile_menu('.toggler-menu, .close-menu', '.mobile-menu');  	
            $('.mobile-menu ul li.menu-item-has-submenu > a').on('click', function () {
                var link = $(this);
                var closestUl = link.closest("ul");
                var parallelActiveLinks = closestUl.find(".active")
                var closestLi = link.closest("li");
                var linkStatus = closestLi.hasClass("active");
                var count = 0;

                closestUl.find("ul").slideUp(function () {
                    if (++count == closestUl.find("ul").length)
                        parallelActiveLinks.removeClass("active");
                });

                if (!linkStatus) {
                    closestLi.children("ul").slideDown();
                    closestLi.addClass("active");
                }
            });
        },

        /* ============================================================ */
        /* Pricing Tab
        /* ============================================================ */
        pricing_tab: function () {
            var toggleSwitch = $('.pricing-menu label.switch');
            var TabTitle = $('.pricing-menu li');
            var monthTabTitle = $('.pricing-menu li.month');
            var yearTabTitle = $('.pricing-menu li.year');
            var monthTabContent = $('#month');
            var yearTabContent = $('#year');
            // hidden show deafult;
            monthTabContent.fadeIn();
            yearTabContent.fadeOut();

            function toggleHandle() {
                if (toggleSwitch.hasClass('on')) {
                    yearTabContent.fadeOut();
                    monthTabContent.fadeIn();
                    monthTabTitle.addClass('active');
                    yearTabTitle.removeClass('active');
                } else {
                    monthTabContent.fadeOut();
                    yearTabContent.fadeIn();
                    yearTabTitle.addClass('active');
                    monthTabTitle.removeClass('active');
                }
            };
            monthTabTitle.on('click', function () {
                toggleSwitch.addClass('on').removeClass('off');
                toggleHandle();
                return false;
            });
            yearTabTitle.on('click', function () {
                toggleSwitch.addClass('off').removeClass('on');
                toggleHandle();
                return false;
            });
            toggleSwitch.on('click', function () {
                toggleSwitch.toggleClass('on off');
                toggleHandle();
            });
        },
        /* ============================================================ */
        /* Swiper Slider Init
        /* ============================================================ */
        swiperCarousel: function () {
            var offerCarousel = new Swiper('.offer-carousel', {
                slidesPerView: 1,
                freeMode: false,
                spaceBetween: 30,
                autoplay: {
                    delay: 5000,
                },
                speed: 1000,
                navigation: {
                    nextEl: '.offer-nav-next',
                    prevEl: '.offer-nav-prev',
                },
                breakpoints: {   
                    // when window width is >= 576px
                    576: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    // when window width is >= 992px
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1940: {
                        slidesPerView: 4,
                    }
                }
            });            
            
            var blog_one = new Swiper('.blog-post-carousel', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: 1,
                autoHeight: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: '.blog-nav-next',
                    prevEl: '.blog-nav-prev',
                },
                autoplay: {
                    delay: 5000,
                },
                speed: 1000,
                breakpoints: {   
                    // when window width is >= 768px
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    // when window width is >= 992px
                    992: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    // when window width is >= 992px
                    1200: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });
            var faq1 = new Swiper('.home__4 .faq-carousel', {
                slidesPerView: 1,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                spaceBetween: 30,
                breakpoints: {
                    // when window width is >= 768px
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    // when window width is >= 992px
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });
            var whyChooseUsOne = new Swiper('.choose-us-carousel', {
                slidesPerView: 1,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.choose-us-nav-next',
                    prevEl: '.choose-us-nav-prev',
                },
                autoplay: {
                    delay: 5000,
                },
                loop: true,
                speed: 1000,
                breakpoints: {   
                    // when window width is >= 768px
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    // when window width is >= 992px
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });
            var ourTeamCarousel = new Swiper('.our-team-carousel', {
                slidesPerView: 1,
                loop: true,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.team-nav-next',
                    prevEl: '.team-nav-prev',
                },
                breakpoints: {   
                    // when window width is >= 768px
                    371: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    // when window width is >= 992px
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });
            var ourTeamCarousel3 = new Swiper('.our-team-carousel3', {
                slidesPerView: 1,
                loop: true,
                spaceBetween: 20,
                autoplay: {
                    delay: 3000,
                },
                speed: 1000,
                navigation: {
                    nextEl: '.team-nav-next',
                    prevEl: '.team-nav-prev',
                },
                breakpoints: {   
                    576: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    // when window width is >= 768px
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });
            var ourTeamSlider = new Swiper('.our-team-slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000,
                },
                speed: 1000,
                navigation: {
                    nextEl: '.team-nav-next',
                    prevEl: '.team-nav-prev',
                },
                breakpoints: {   
                    // when window width is >= 530px
                    530: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    // when window width is >= 768px
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    // when window width is >= 992px
                    992: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                }
            });
            var Clients = new Swiper('.client-carousel', {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000,
                },
                direction: 'horizontal',
                breakpoints: {   
                    // when window width is >= 768px
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                    // when window width is >= 992px
                    992: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    },
                }
            });
            var partners= new Swiper('.partner-carousel', {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000,
                },
                direction: 'horizontal',
                breakpoints: {   
                    // when window width is >= 768px
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                    // when window width is >= 992px
                    992: {
                        slidesPerView: 5,
                        spaceBetween: 30,
                    },
                }
            });
            var testimonial1 = new Swiper('.testimonial-carousel', {
                slidesPerView: 1,
                spaceBetween: 30,
                autoplay: {
                    delay: 5000,
                },
                speed: 1000,
                loop: true,                
                breakpoints: {   
                    // when window width is >= 768px
                    992: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1200: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                        allowTouchMove: false,
                    }
                }
            });
            var testimonial2 = new Swiper('.testimonial-carousel2', {
                slidesPerView: 1,
                autoplay: {
                    delay: 5000,
                },
                speed: 1000,
                loop: true,  
                spaceBetween: 30,
                breakpoints: {   
                    // when window width is >= 768px
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                }
            });

            var blogThree = new Swiper('.blog-style3', {
                slidesPerView: 1,
                spaceBetween: 30,
                autoplay: {
                    delay: 5000,
                },
                navigation: {
                    nextEl: '.nav-next',
                    prevEl: '.nav-prev',
                },
                speed: 1000,
                loop: true,
                breakpoints: {   
                    // when window width is >= 768px
                    992: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                }
            });
        },

        /* ============================================================ */
        /* Owl Carousel
        /* ============================================================ */
        owlCarousel: function () {
            var appScreenshot = $('#appScreenshot');
            if (appScreenshot.length) {
                var $screenshot = $('#appScreenshot');
                $screenshot.children().each( function( index ) {
                    $(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
                });

                $screenshot.owlCarousel({
                    center: true,
                    loop: true,
                    items: 1,                
                    dots: !1,
                    autoplay: 1,
                    autoplayTimeout: 5000,
                    autoplaySpeed: 700,
                    margin: 10,
                    responsive:{
                        576: {
                            items: 3,
                            margin: 10,
                        },
                        992: {
                            items: 3,
                            margin: 15,
                        },
                        1200: {
                            items: 5,
                            margin: 15,
                        }
                    }
                });
                $(document).on('click', '.owl-item>div', function() {
                    $screenshot.trigger('to.owl.carousel', $(this).data( 'position' ) );
                });

                var selector = $('.owl-carousel');
                $('.sc-nav-next').click(function() {
                    selector.trigger('next.owl.carousel');
                });
                
                $('.sc-nav-prev').click(function() {
                    selector.trigger('prev.owl.carousel');
                });
            };

            var featureSlider1 = $('.feature-slider-one');
            if(featureSlider1.length) {            
                featureSlider1.owlCarousel({
                    autoplay: !1,
                    items: 1,
                    loop: 1,
                    dots: !1,
                    autoplaySpeed: 1000,
                    margin: 50,
                    responsive : {
                        // breakpoint from 480 up
                        768 : {
                            items: 2,
                            margin: 60,
                            autoplay: 1,
                        },
                        // breakpoint from 768 up
                        1200 : {
                            items: 3,
                            margin: 70,
                            autoplay: 1,
                        }
                    }
                });
                var selector = $('.owl-carousel');
                $('.feature-nav-next').click(function() {
                    selector.trigger('next.owl.carousel');
                });
                
                $('.feature-nav-prev').click(function() {
                    selector.trigger('prev.owl.carousel');
                });
            };

            var testimonialSlider1 = $('.testimonial-slider');
            // testimonialSlider1.on('changed.owl.carousel', function(event){
            //     var item = event.item.index;
            //     $('.figure').removeClass('animate__animated animate__fadeInUp');
            //     $('.owl-item').eq(item).find('.figure').addClass('animate__animated animate__fadeInUp');
            //     $('.testimonial-description').removeClass('animate__animated animate__fadeInUp');
            //     $('.owl-item').eq(item).find('.testimonial-description').addClass('animate__animated animate__fadeInUp');
            // });
            if(testimonialSlider1.length) {            
                testimonialSlider1.owlCarousel({
                    autoplay: 1,
                    items: 1,
                    loop: 1,
                    dots: 1,
                    autoplaySpeed: 1000,
                    margin: 30,
                    slideSpeed: 1000,
                    responsiveClass: true,
                    animateOut: 'fadeOut',
                    animateIn: 'fadeIn',                    
                    responsive: {
                        992: {
                            mouseDrag: false,
                            touchDrag: false,                            
                        }
                    },
                });

                var selector = $('.owl-carousel');
                $('.arrow-nav-next').click(function() {
                    selector.trigger('next.owl.carousel');
                });                
                $('.arrow-nav-prev').click(function() {
                    selector.trigger('prev.owl.carousel');
                });                
                
            };    
            var testimonialSlider2 = $('.testimonial-slider-2');
            if(testimonialSlider2.length){
                testimonialSlider2.owlCarousel({
                    autoplay: 1,
                    items: 1,
                    loop: 1,
                    dots: 1,
                    margin: 30,
                    autoplaySpeed: 1000,
                    responsive: {
                        768: {
                            items: 2,
                        },
                        1024: {
                            items: 3,
                        },
                    }
                })
                var selector = $('.owl-carousel');
                $('.nav-next').click(function() {
                    selector.trigger('next.owl.carousel');
                });
                
                $('.nav-prev').click(function() {
                    selector.trigger('prev.owl.carousel');
                });
            };
        },
        bxSlider: function () {
            var testimonial_bx_slider = $(".home__2 .testimonial-bx-slider");
            if (testimonial_bx_slider.length) {
                $(".testimonial-bx-slider .slider").bxSlider({
                    auto: true,
                    controls: false,
                    mode: "horizontal",
                    pause: 5000,
                    speed: 1000,
                    pager: true,
                    pagerCustom: ".slider-pager",
                    adaptiveHeight: true,
                });
            }
        },
        funFacts: function() {
            // Fun Facts Counterup
            $('.counter .number').counterUp({
                delay: 10,
                time: 2000
            });
        },

        /* ============================================================ */
        /* Scroll Top
        /* ============================================================ */
        scroll_to_top: function() {
            $('body').append(
                "<a href='#top' title='Scroll Top' id='scroll-top' class='topbutton btn-hide'><i class='flaticon-right-arrow-2'></i></a>"
            );
            var $scrolltop = $('#scroll-top');
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > $(this).height()) {
                    $scrolltop.addClass('btn-show').removeClass('btn-hide');
                } else {
                    $scrolltop.addClass('btn-hide').removeClass('btn-show');
                }
            });
            $("a[href='#top']").on('click', function () {
                $('html, body').animate(
                    {
                        scrollTop: 0,
                    },
                    'normal'
                );
                return false;
            });
        },

        magnificPopup: function () {
            $('.popup-youtube').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    // disableOn: 375,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            }); 
        },

        initialize: function() {
			appsa.onePageFunction();
			appsa.mobile_menu();
			appsa.scroll_to_top();
			appsa.sticky_header();
			appsa.swiperCarousel();
			appsa.owlCarousel();
			appsa.bxSlider();
			appsa.funFacts();
			appsa.pricing_tab();
			appsa.magnificPopup();
		}
    };
    $(function() {
		appsa.initialize();
		$(window).on('load', function() {
            $(".preloader").fadeOut();     
        });
	});
})(jQuery);