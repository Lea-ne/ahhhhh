<?php

declare(strict_types=1);

namespace Drupal\form_decorator\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines form_decorator annotation object.
 *
 * @Annotation
 */
final class FormDecorator extends Plugin {

  /**
   * The form alter hook.
   */
  public readonly string $hook;

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->definition['class'];
  }

}
