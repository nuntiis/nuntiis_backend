<?php

namespace Drupal\nuntius;

use Drupal\restful\Http\Request;

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

  /**
   * Return a single entity resource after processed by the restful plugin.
   *
   * @param $id
   *   The entity ID.
   * @param $resource
   *   The name name of the plugin.
   * @param string $version
   *   The api version. Default to 1.0
   *
   * @return mixed
   *   The entity object processed by the plugin.
   *
   * @throws \Drupal\restful\Exception\BadRequestException
   */
  static public function processRestfulEntity($id, $resource, $version = ':1.0') {
    $handler = restful()->getResourceManager()->getPlugin($resource . $version);
    $handler->setRequest(Request::create(''));
    $result = restful()->getFormatterManager()->format($handler->doGet($id));

    return json_decode($result)->data[0];
  }

}