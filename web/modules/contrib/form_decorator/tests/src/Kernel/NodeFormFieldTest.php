<?php

declare(strict_types=1);

namespace Drupal\Tests\form_decorator\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\NodeType;
use Drupal\user\Entity\User;

/**
 * Tests for the node form field.
 */
class NodeFormFieldTest extends KernelTestBase {

  /**
   * The modules to enable.
   *
   * @var array
   */
  protected static $modules = [
    'system',
    'user',
    'node',
    'field',
    'text',
    'form_decorator',
    'form_decorator_example',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->installEntitySchema('user');
    $this->installEntitySchema('node');
    $this->installConfig(['system', 'node']);

    NodeType::create(['type' => 'article', 'name' => 'Article'])->save();

    $user = User::create(['name' => 'Test User']);
    $user->save();
    $this->container->get('current_user')->setAccount($user);
  }

  /**
   * Tests if the new datepicker field exists.
   */
  public function testCreatedDatepickerField(): void {
    $this->container->get('current_user')->setAccount(User::load(1));

    $entity_form_builder = $this->container->get('entity.form_builder');

    $node = $this->container->get('entity_type.manager')->getStorage('node')->create([
      'type' => 'article',
      'title' => 'Test Article',
    ]);

    $form = $entity_form_builder->getForm($node);

    $this->assertArrayHasKey('created_datepicker', $form, 'The created_datepicker field is present in the node form.');
    $this->assertEquals('datetime', $form['created_datepicker']['#type'], 'The created_datepicker field is of type datetime.');
  }

}
