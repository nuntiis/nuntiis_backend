<?php

namespace Drupal\nuntius;

interface WebSocketInterface {

  /**
   * Settings form for the plugin manager.
   *
   * @return array
   *   The settings form.
   */
  public function settingsForm();

  /**
   * Define the settings keys for the plugin.
   */
  public function defaultValues();

  /**
   * Save settings for the plugin.
   *
   * @param $values
   *   The values of the settings.
   */
  public function saveSettings(array $values);

  /**
   * Brodcast a message to the server.
   *
   * @param $message
   *   The message which will be sent to the push server.
   */
  public function brodcast($message);

}