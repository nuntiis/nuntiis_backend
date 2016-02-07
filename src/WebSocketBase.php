<?php

namespace Drupal\nuntius;

abstract class WebSocketBase implements WebSocketInterface {

  protected $plugin;
  protected $settings;
  protected $variableId;

  /**
   * WebSocketBase constructor.
   * @param array $plugin
   */
  function __construct(array $plugin) {
    $this->plugin = $plugin;
    $this->variableId = 'nuntius_' . $plugin['id'];
    $this->settings = variable_get('nuntius_' . $plugin['id'], $this->defaultValues());
  }

  /**
   * {@inheritdoc}
   */
  public function saveSettings(array $values) {
    $new_values = [];

    foreach (array_keys($this->defaultValues()) as $setting) {
      $new_values[$setting] = $values[$setting];
    }

    variable_set($this->variableId, $new_values);
  }

}
