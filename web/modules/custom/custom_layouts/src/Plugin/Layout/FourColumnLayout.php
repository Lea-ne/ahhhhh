<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\custom_layouts\Plugin\Layout\CustomLayoutBase;

/**
 * Provides a five-column layout.
 *
 * @Layout(
 *   id = "layout--four-column",
 *   label = @Translation("Four Columns"),
 *   category = @Translation("Custom"),
 *   path = "layouts",
 *   template = "custom-layout",
 *   library = "custom_layouts/layout_style",
 *   class = "custom-four-column-layout",
 *   default_region = "col1",
 *   regions = {
 *     "col1" = {
 *       "label" = @Translation("Colonne 1")
 *     },
 *     "col2" = {
 *       "label" = @Translation("Colonne 2")
 *     },
 *     "col3" = {
 *       "label" = @Translation("Colonne 3")
 *     },
 *     "col4" = {
 *       "label" = @Translation("Colonne 4")
 *     },
 *   }
 * )
 */
class FourColumnLayout extends CustomLayoutBase {}
