<?php

declare(strict_types=1);

namespace Drupal\form_decorator;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\form_decorator\Annotation\FormDecorator;

/**
 * FormDecorator plugin manager.
 */
final class FormDecoratorPluginManager extends DefaultPluginManager {

  /**
   * Constructs the object.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('FormDecorator', $namespaces, $module_handler, FormDecoratorInterface::class, FormDecorator::class);
    $this->alterInfo('form_decorator_info');
    $this->setCacheBackend($cache_backend, 'form_decorator_plugins');
  }

}
