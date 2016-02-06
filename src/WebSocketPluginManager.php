<?php

/**
 * @file
 * Contains \Drupal\nuntius\WebSocketPluginManager.
 */

namespace Drupal\nuntius;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\plug\Util\Module;
use Drupal\plug_example\NamePluginManager;

/**
 * Name plugin manager.
 */
class WebSocketPluginManager extends DefaultPluginManager {

  /**
   * Constructs WebSocketPluginManager.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \DrupalCacheInterface $cache_backend
   *   Cache backend instance to use.
   */
  public function __construct(\Traversable $namespaces, \DrupalCacheInterface $cache_backend) {

    parent::__construct('Plugin/websocket', $namespaces, 'Drupal\nuntius\WebSocketInterface', '\Drupal\nuntius\Annotation\WebSocket');
    $this->setCacheBackend($cache_backend, 'websocket_plugins');
    $this->alterInfo('websocket_plugin');
  }

  /**
   * NamePluginManager factory method.
   *
   * @param string $bin
   *   The cache bin for the plugin manager.
   *
   * @return NamePluginManager
   *   The created manager.
   */
  public static function create($bin = 'cache') {
    return new static(Module::getNamespaces(), _cache_get_object($bin));
  }

}
