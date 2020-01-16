(function ($, elementor) {
    "use strict";

    var Saaspik = {

        init: function () {

            var widgets = {
                'saaspik-testimonial.default': Saaspik.Testimonial,
                'saaspik-partner.default': Saaspik.Testimonial,
                'saaspik-image-tab.default': Saaspik.Imagetab

            };
            $.each(widgets, function (widget, callback) {
                elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
            });

        },


        Testimonial: function ($scope) {

            var testimonial = $scope.find('.swiper-container');
            testimonial.each(function () {

                var id = $(this).attr('id');
                var perpage = $(this).data('perpage') || 1;
                var loop = $(this).data('loop') || true;
                var speed = $(this).data('speed') || 700;
                var autoplay = $(this).data('autoplay') || 50000;
                var space = $(this).data('space') || 0;
                var effect = $(this).data('effect');
                var direction = $(this).data('direction') || 'horizontal';
                var breakpoints = $(this).data('breakpoints');

                var swiper = new Swiper('#' + id, {
                    slidesPerView: perpage,
                    spaceBetween: space,                  
                    loop: true,
                    speed: speed, 
                    effect: effect,                               
                    breakpoints: breakpoints,
                    autoplay: autoplay,                     
                    pagination: ".swiper-pagination",
                    paginationClickable: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    fadeEffect: {
                        crossFade: true
                      },
                });
            });
        },

        Imagetab: function ($scope) {
            var imagetabs = $scope.find('.pix-tabs');            
            imagetabs.each(function () {               
                $('#pix-tabs-nav li a').on('click', function () {

                    //Check if the tabs menu has active class
                    $('#pix-tabs-nav li').removeClass('active');
                    $(this).parent().addClass('active');
     
                    // Display active tab
                    var currentTab = $(this).attr('href');
                    $('#pix-tabs-content .content').hide();                                
                    $(currentTab).show();

                    return false;
                });   
                
            });
        },


    };
    $(window).on('elementor/frontend/init', Saaspik.init);
}(jQuery, window.elementorFrontend));