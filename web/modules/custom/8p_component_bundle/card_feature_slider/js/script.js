(function ($, Drupal) {
    'use strict';
  
    Drupal.behaviors.cardFeatureSlider = {
      attach: function (context, settings) {
  
  
        $('.component-card-feature-slider .card__container').not('.slick-initialized').slick({
          dots: false,
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear',
          autoplay: true,
          autoplaySpeed: 3000,
        });
  
  
      }
    };
  
  })(jQuery, Drupal);