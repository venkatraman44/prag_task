<?php

namespace Drupal\prag_task\Plugin\Block;

// Namespace.
// Using blockbase for customblock.
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\prag_task\CustomService;


// forminterface
// customform.

/**
 * Provides a 'Custom' block.
 *
 * @Block(
 *   id = "prag_task",
 *   admin_label = "Custom block",
 * )
 */
class CustomBlock extends BlockBase implements ContainerFactoryPluginInterface {

    /**
   * CustomService.
   *
   * @var \Drupal\prag_task\CustomService
   */
  protected $customService;

  /**
   * Create function.
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('custom_service')
    );
  }

  /**
   * Construct function.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, CustomService $customService) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->customService = $customService;
  }

  /**
   * Function hello.
   */
  public function build() {
    // Defining function.
    // Calling our service.
    $data = $this->customService->getName();
    $data2 = $this->customService->getText();
    $display = $this->customService->getDisplayStatus();
    $markup = '';
    // $markup = '<h3>' . $data . '</h3>' . '<div>' . $data2 . '</div>';
    if ($display) {
        $markup = '<h3>' . $data . '</h3>' . '<div>' . $data2 . '</div>';
      }
    return [
        '#markup'=>$markup,
    ];
}

}
