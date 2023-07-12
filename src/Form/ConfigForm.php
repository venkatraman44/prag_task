<?php

namespace Drupal\prag_task\Form;

// Namespace.
// Using base classes.
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class creation.
 */
class ConfigForm extends ConfigFormBase {

  // It gives form id.
  const RESULT = "prag_task.settings";

  /**
   * To get form id.
   */
  public function getFormId() {
    return "prag_task_settings";
  }

  /**
   * To get editable names.
   */
  protected function getEditableConfigNames() {
    // To get names.
    return [
    // Static result.
      static::RESULT,
    ];
  }

  /**
   * Building form.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Variables for the form.
    // Result is static.
    $config = $this->config(static::RESULT);
    // Name field.
    $form['TITLE'] = [
    // Type of field.
      '#type' => 'textfield',
    // Title.
      '#title' => '<span>TITLE</span>',
      '#required' => TRUE,
      // Get name.
      '#default_value' => $config->get("TITLE"),
    ];
    $form['TEXT'] = [
        '#type' => 'text_format',
        '#title' => ('TEXT'),
        '#required' => TRUE, // Make the field required
        '#format' => 'full_html', // Set the text format, adjust as needed
        '#default_value' => $config->get("TEXT"), // Set a default value if needed
    ];
    $form['Display'] = [
        '#type' => 'checkbox',
        '#title' => ('Display'),
    ];
    // Will return the form.
    return parent::buildForm($form, $form_state);
  }

  /**
   * Submit form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // For submit option.
    // Static result.
    $config = $this->config(static::RESULT);
    // To collect values entered.
    $config->set("TITLE", $form_state->getValue('TITLE'));
    $config->set("TEXT", $form_state->getValue('TEXT'));
    $displayStatus = $form_state->getValue('Display');
    $config->set("Display", $displayStatus);
    $config->save();
  }

}
