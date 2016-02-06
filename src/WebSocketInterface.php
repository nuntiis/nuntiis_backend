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

}