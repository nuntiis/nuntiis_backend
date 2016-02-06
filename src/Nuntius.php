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
   */
  static public function initWebSocketManager() {
    $name = self::getWebSocketManager();
    $plugin_manager = WebSocketPluginManager::create();

    dpm(get_class_methods($plugin_manager));

    dpm($plugin_manager->getDefinitions());

    $foo = $plugin_manager->createInstance($name, []);
  }
}