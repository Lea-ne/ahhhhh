(function ($, Drupal) {
    'use strict';
  
    Drupal.behaviors.cardHeroSlider = {
      attach: function (context, settings) {
        
        //slick carousel (Slider Syncing)
        $('.slider-for').not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav',
            autoplay: true,            
            autoplaySpeed: 3000        
          });
          
          $('.slider-nav').not('.slick-initialized').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
          });


      }
    };
  
  })(jQuery, Drupal);
  