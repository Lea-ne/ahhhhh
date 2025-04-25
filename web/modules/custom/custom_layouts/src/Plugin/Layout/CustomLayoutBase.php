<?php

namespace Drupal\custom_layouts\Plugin\Layout;

use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Form\FormStateInterface;

/**
 * Base class for custom layouts.
 */
abstract class CustomLayoutBase extends LayoutDefault {
  /**
   * Gets the CSS class for the layout.
   */
  public function getLayoutClass() {
    return str_replace('_', '-', $this->getPluginId());
  }


  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'extra_classes' => '',
      'title_alignement' => 'left',
      'background_color' => 'no-bg',
      'divider_line' => 'no-divider-line',
      'use_container' => 'container',
      'padding_top' => 'small',
      'padding_bottom' => 'small',
      'vertical_alignement' => 'top',
      'column_gap' => 'default-gap',
      'title_color' => '',
      'title_size' => 'h2',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $configuration = $this->getConfiguration();
    
    // Visible title of the section
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Section Title'),
      '#default_value' => $configuration['title'] ?? '',
      '#description' => $this->t('Title displayed above the section.'),
    ];
  
    // Le wrapper vertical_tabs
    $form['tabs'] = [
      '#type' => 'vertical_tabs',
      '#title' => $this->t('Layout Settings'),
      '#weight' => -10,
    ];

    //******************** Onglet Title style ***************//
    $form['title_style'] = [
      '#type' => 'details',
      '#title' => $this->t('Title Style'),
      '#group' => 'tabs',
    ];

    // Parameters for the title style
    $form['title_style']['title_alignement'] = [
      '#type' => 'radios',
      '#title' => $this->t('Title Alignment'),
      '#options' => [
        'left' => $this->t('Left'),
        'center' => $this->t('Center'),
        'right' => $this->t('Right'),
      ],
      '#default_value' => $configuration['title_alignement'],
      '#attributes' => ['class' => ['title_alignement']], // pour ton CSS
    ];

    $form['title_style']['title_size'] = [
      '#type' => 'select',
      '#title' => $this->t('Title Size'),
      '#options' => [
        'h1' => 'h1',
        'h2' => 'h2',
        'h3' => 'h3',
        'h4' => 'h4',
        'h5' => 'h5',
        'h6' => 'h6',
      ],
      '#default_value' => $configuration['title_size'],
      '#description' => $this->t('Title size of the section'),
    ];

    $form['title_style']['title_color'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title Color'),
      '#default_value' => $configuration['title_color'] ?? '',
      '#description' => $this->t('Title Color of the section'),
    ];

   //******************** Onglet Manage ***************//
    $form['manage'] = [
      '#type' => 'details',
      '#title' => $this->t('Spacing'),
      '#group' => 'tabs',
    ];
    $form['manage']['use_container'] = [
      '#type' => 'select',
      '#title' => $this->t('Use Container'),
      '#options' => [
        'container' => 'Yes',
        'layout--full-width' => 'No',
      ],
      '#default_value' => $configuration['use_container'],
      '#description' => $this->t('Utiliser un container pour le layout.'),
    ];

    $form['manage']['padding_top'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding Top'),
      '#options' => [
        'none' => 'None',
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
      ],
      '#default_value' => $configuration['padding_top'],
      '#description' => $this->t('Espace en haut.'),
    ];
  
    $form['manage']['padding_bottom'] = [
      '#type' => 'select',
      '#title' => $this->t('Padding Bottom'),
      '#options' => [
        'none' => 'None',
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
      ],
      '#default_value' => $configuration['padding_bottom'],
      '#description' => $this->t('Espace en bas.'),
    ];
  
    $form['manage']['column_gap'] = [
      '#type' => 'select',
      '#title' => $this->t('Column Gap'),
      '#options' => [
        'default-gap' => 'Default Gap',
        'g-0' => 'No Column Gap',
      ],
      '#default_value' => $configuration['column_gap'],
      '#description' => $this->t('Espacement entre colonnes.'),
    ];

   //******************** Onglet Theme ***************//
    $form['theme'] = [
      '#type' => 'details',
      '#title' => $this->t('Theme'),
      '#group' => 'tabs',
    ];
    $form['theme']['background_color'] = [
      '#type' => 'select',
      '#title' => $this->t('Section Background Color'),
      '#options' => [
        'no-bg' => 'No background',
        'red' => 'Red',
        'green' => 'Green',
        'blue' => 'Blue',
      ],
      '#default_value' => $configuration['background_color'],
      '#description' => $this->t('Couleur de fond.'),
    ];
  
    $form['theme']['divider_line'] = [
      '#type' => 'select',
      '#title' => $this->t('Use Divider Line'),
      '#options' => [
        'no-divider-line' => 'No Divider Line',
        'divider-line' => 'Divider Line',
      ],
      '#default_value' => $configuration['divider_line'],
      '#description' => $this->t('Ligne de séparation.'),
    ];

    $form['theme']['vertical_alignement'] = [
      '#type' => 'select',
      '#title' => $this->t('Vertical Alignement'),
      '#options' => [
        'top' => 'top',
        'center' => 'center',
        'bottom' => 'bottom',
      ],
      '#default_value' => $configuration['vertical_alignement'],
      '#description' => $this->t('Alignement vertical du contenu.'),
    ];
  
    
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function build(array $regions) { 
    $build = parent::build($regions);

    // Appliquer les valeurs par défaut s’il manque des valeurs dans la configuration.
    $config = $this->getConfiguration() + $this->defaultConfiguration();

    $build['#settings'] = [
      'title' => $config['title'],
      'title_alignement' => $config['title_alignement'],
      'background_color' => $config['background_color'],
      'divider_line' => $config['divider_line'],
      'use_container' => $config['use_container'],
      'padding_top' => $config['padding_top'],
      'padding_bottom' => $config['padding_bottom'],
      'vertical_alignement' => $config['vertical_alignement'],
      'column_gap' => $config['column_gap'],
      'title_color' => $config['title_color'],
      'title_size' => $config['title_size'],
    ];
  
    // Add the background_color configuration to the template variables.
    $build['#attributes']['class'][] = 'layout--bg-color-' . $this->configuration['background_color'];
    $build['#attributes']['class'][] = 'layout--pt-' . $this->configuration['padding_top'];
    $build['#attributes']['class'][] = 'layout--pb-' . $this->configuration['padding_bottom'];
    $build['#attributes']['class'][] = '' . $this->configuration['use_container'];
    $build['#attributes']['class'][] = 'vertical-align-' . $this->configuration['vertical_alignement'];
    $build['#attributes']['class'][] = '' . $this->configuration['divider_line'];
    $build['#attributes']['class'][] = 'title-align-' . $this->configuration['title_alignement'];
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    // Laissez LayoutDefault traiter d'autres aspects de la configuration.
    parent::submitConfigurationForm($form, $form_state);

    $config = $form_state->getValues();

    $this->configuration['title'] = $config['title'];
    $this->configuration['background_color'] = $config['theme']['background_color'];
    $this->configuration['divider_line'] = $config['theme']['divider_line'];
    $this->configuration['use_container'] = $config['manage']['use_container'];
    $this->configuration['vertical_alignement'] = $config['manage']['vertical_alignement'];
    $this->configuration['padding_top'] = $config['manage']['padding_top'];
    $this->configuration['padding_bottom'] = $config['manage']['padding_bottom'];
    $this->configuration['column_gap'] = $config['manage']['column_gap'];
    $this->configuration['title_alignement'] = $config['title_style']['title_alignement'];
    $this->configuration['title_color'] = $config['title_style']['title_color'];
    $this->configuration['title_size'] = $config['title_style']['title_size'];
  }

}
