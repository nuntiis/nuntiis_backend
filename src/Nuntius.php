<?php

namespace Drupal\nuntius;

class Nuntius {

  /**
   * Get the base web socket decorator.
   *
   * @return string
   */
  static public function getWebSocketManager() {
    return variable_get('nuntius_websocket_manager');
  }

  /**
   * Initialise the websoket plugin.
   *
   * @return WebSocketInterface
   */
  static public function initWebSocketManager() {
    $name = self::getWebSocketManager();
    $plugin_manager = WebSocketPluginManager::create();
    return $plugin_manager->createInstance($name, $plugin_manager->getDefinition($name));
  }
}