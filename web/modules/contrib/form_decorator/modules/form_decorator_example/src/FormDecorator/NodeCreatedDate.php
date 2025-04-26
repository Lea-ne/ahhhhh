<?php

declare(strict_types=1);

namespace Drupal\form_decorator_example\FormDecorator;

use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Form\FormStateInterface;
use Drupal\form_decorator\FormDecoratorBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Adds a created date picker to the node form.
 *
 * @FormDecorator(
 *   hook = "form_node_form_alter"
 * )
 */
final class NodeCreatedDate extends FormDecoratorBase {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, ...$args) {
    $form = $this->inner->buildForm($form, $form_state, ...$args);
    $created_time = time();
    if (!$this->getEntity()->isNew()) {
      $created_time = $this->getEntity()->getCreatedTime();
    }

    $form['created_datepicker'] = [
      '#title' => $this->t('Created date'),
      '#type' => 'datetime',
      '#default_value' => DrupalDateTime::createFromTimestamp($created_time),
      '#weight' => 100,
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array &$form, FormStateInterface $form_state) {
    $this->getEntity()->setCreatedTime($form_state->getValue('created_datepicker')->getTimestamp());
    return $this->inner->save($form, $form_state);
  }

}
