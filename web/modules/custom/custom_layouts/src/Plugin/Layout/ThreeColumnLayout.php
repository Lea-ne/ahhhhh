<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\custom_layouts\Plugin\Layout\CustomLayoutBase;

/**
 * Provides a three-column layout.
 *
 * @Layout(
 *   id = "layout--three-column",
 *   label = @Translation("Three Columns"),
 *   category = @Translation("Custom"),
 *   path = "layouts",
 *   template = "custom-layout",
 *   library = "custom_layouts/layout_style",
 *   class = "custom-three-column-layout",
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
 *   }
 * )
 */
class ThreeColumnLayout extends CustomLayoutBase {}
