<?php

namespace Drupal\nuntius\Plugin\websokcet;

use Drupal\nuntius\WebSocketInterface;

/**
 * Class SocketIoBase
 * @package Drupal\nuntius\Plugin\websokcet
 *
 * @WebSocket(
 *   id = "socket_io_base",
 *   name = "Socket IO base"
 * )
 */
class SocketIoBase implements WebSocketInterface {

  /**
   * Settings form for the plugin manager.
   *
   * @return array
   *   The settings form.
   */
  public function settingsForm()
  {
    // TODO: Implement settingsForm() method.
  }
}