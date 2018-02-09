<?php

namespace Drupal\hook_manager\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\hook_manager\Plugin\HookManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ImporterController
 *
 * @package Drupal\importer\Controller
 */
class HookController extends ControllerBase {

  protected $hookManager;

  public function __construct(HookManager $hookManager) {
    $this->hookManager = $hookManager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('hook_manager')
    );
  }

  /**
   * Controller callback.
   *
   * @return array
   */
  public function show() {
    $hooks = $this->hookManager->getDefinitions();
    $koks = $this->hookManager->createInstance('example_hooks1');

    return [
      '#markup' => 'Hello hook!',
    ];
  }

}