<?php

declare(strict_types=1);

namespace Drupal\form_decorator;

use Drupal\Core\Entity\ContentEntityFormInterface;
use Drupal\Core\Entity\Display\EntityFormDisplayInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Base class for content entity form decorators.
 */
class ContentEntityFormDecoratorBase extends EntityFormDecoratorBase implements ContentEntityFormInterface {

  /**
   * {@inheritdoc}
   */
  public function getFormDisplay(FormStateInterface $form_state) {
    return $this->inner->getFormDisplay($form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function setFormDisplay(EntityFormDisplayInterface $form_display, FormStateInterface $form_state) {
    return $this->inner->setFormDisplay($form_display, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function getFormLangcode(FormStateInterface $form_state) {
    return $this->inner->getFormLangcode($form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function isDefaultFormLangcode(FormStateInterface $form_state) {
    return $this->inner->isDefaultFormLangcode($form_state);
  }

}
