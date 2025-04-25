<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\custom_layouts\Plugin\Layout\CustomLayoutBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a two-column layout.
 *
 * @Layout(
 *   id = "layout--two-column",
 *   label = @Translation("Two Columns"),
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
 *   }
 * )
 */
class TwoColumnLayout extends CustomLayoutBase {

   /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'column_width' => '5050',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    // Appeler la méthode parente pour obtenir le formulaire existant.
    $form = parent::buildConfigurationForm($form, $form_state);
    
    $configuration = $this->getConfiguration();

    $form['column_width'] = [
        '#type' => 'select',
        '#title' => $this->t('Column width'),
        '#options' => [
          '5050' => '50% | 50%',
          '7525' => '75% | 25%',
          '2575' => '25% | 75%',
        ],
        '#default_value' => $configuration['column_width'],
        '#description' => $this->t('Sélectionnez la largeur que les colones doivent occupés.'),
      ];

    
    return $form;
  }


  /**
   * {@inheritdoc}
   */
  public function build(array $regions) {
    $build = parent::build($regions);
  
    // Add the background_color configuration to the template variables.
    $build['#attributes']['class'][] = 'layout--size' . $this->configuration['column_width'];
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    $this->configuration['column_width'] = $form_state->getValue('column_width');
  }

}
