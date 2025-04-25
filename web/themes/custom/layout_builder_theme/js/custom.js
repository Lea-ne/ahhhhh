(function ($, Drupal) {
  Drupal.behaviors.layoutBuilderCarousel = {
    attach: function (context, settings) {
      // .once() évite de ré-initialiser Slick à chaque rafraîchissement AJAX
      

      console.log('Slick carousel initialized.');
      
    }
  };
})(jQuery, Drupal);
