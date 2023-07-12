<?php

namespace Drupal\prag_task;

// Name space of custom service file.
use Drupal\Core\Config\ConfigFactory;

// Base class.
/**
 * Class CustomService is called.
 *
 * @package Drupal\prag_task\Services
 */
class CustomService {
  // Creating class.

  /**
   * Configuration Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $configFactory;

  /**
   * Constructor.
   */
  public function __construct(ConfigFactory $configFactory) {
    // Assigning variable $configfactory.
    $this->configFactory = $configFactory;
  }

  /**
   * Gets my setting.
   */
  public function getName() {
    $config = $this->configFactory->get('prag_task.settings');
    return $config->get('TITLE');
  }

  public function getText() {
    $config = $this->configFactory->get('prag_task.settings');
    $text = $config->get('TEXT');

    if (is_array($text)) {
      return $text['value'];
    } else {
      return '';
    }
  }
  public function getDisplayStatus() {
    $config = $this->configFactory->get('prag_task.settings');
    return $config->get('Display');

}
}

