<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\custom_layouts\Plugin\Layout\CustomLayoutBase;

/**
 * Provides a one-column layout.
 *
 * @Layout(
 *   id = "layout--one-column",
 *   label = @Translation("One Column"),
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
 *   }
 * )
 */
class OneColumnLayout extends CustomLayoutBase {}
