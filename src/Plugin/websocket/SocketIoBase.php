<?php

namespace Drupal\nuntius\Plugin\websocket;

use Drupal\nuntius\WebSocketBase;

/**
 * Class SocketIoBase
 * @package Drupal\nuntius\Plugin\websokcet
 *
 * @WebSocket(
 *   id = "socket_io_base",
 *   name = "Socket IO base"
 * )
 */
class SocketIoBase extends WebSocketBase {

  /**
   * {@inheritdoc}
   */
  public function defaultValues() {
    return ['address' => ''];
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm() {
    return [
      'address' => [
        '#type' => 'textfield',
        '#title' => t('Websocket address'),
        '#default_value' => $this->settings['address'],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function brodcast($message) {
  }
}