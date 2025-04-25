<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\custom_layouts\Plugin\Layout\CustomLayoutBase;

/**
 * Provides a five-column layout.
 *
 * @Layout(
 *   id = "layout--five-column",
 *   label = @Translation("Five Columns"),
 *   category = @Translation("Custom"),
 *   path = "layouts",
 *   template = "custom-layout",
 *   library = "custom_layouts/layout_style",
 *   class = "custom-five-column-layout",
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
 *     "col5" = {
 *       "label" = @Translation("Colonne 5")
 *     }
 *   }
 * )
 */
class FiveColumnLayout extends CustomLayoutBase {}
