(function ($, Drupal) {
    'use strict';
  
    $(document).ready(function () {
      const mediaQuery = window.matchMedia("(max-width: 991.98px)");
  
      function bindMenuBehavior(e) {

        $('.menu-item--expanded .menu').hide();
        $('.menu-item--expanded').removeClass('is-opened');

        // On vide les anciens événements
        $('.menu-item--expanded').off();
        $('.menu-item--expanded a').off();
  
        if (mediaQuery.matches) {
          // === MOBILE ===
          $('.menu-item--expanded a').on('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
          });
  
          $('.menu-item--expanded').on('click', function () {
            const $menuItem = $(this);
            const $submenu = $menuItem.children('.menu');
  
            $submenu.stop(true, true).slideToggle(200, function () {
              // Toggle class based on visibility
              if ($submenu.is(':visible')) {
                $menuItem.addClass('is-opened');
              } else {
                $menuItem.removeClass('is-opened');
              }
            });
          });
  
        } else {
          // === DESKTOP ===
          $('.component-main-header .menu-item--expanded').on('mouseenter', function () {
            $(this).find('.menu').stop(true, true).slideDown(200);
          });
  
          $('.component-main-header .menu-item--expanded').on('mouseleave', function () {
            $(this).find('.menu').stop(true, true).slideUp(200);
          });
        }
      }
  
      // Initialisation
      bindMenuBehavior();
  
      // Re-bind on media query change
      mediaQuery.addEventListener("change", bindMenuBehavior);
    });
  
  })(jQuery, Drupal);
  