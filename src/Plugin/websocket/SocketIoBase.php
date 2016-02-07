<?php

namespace Drupal\nuntius\Plugin\websocket;

use Drupal\nuntius\WebSocketBase;
use ElephantIO\Client,
  ElephantIO\Engine\SocketIO\Version1X;

/**
 * Class SocketIoBase
 * @package Drupal\nuntius\Plugin\websokcet
 *
 * @code
 *  $websocket = Nuntius::initWebSocketManager();
 *  $websocket->brodcast(['event' => 'message', 'data' => ['foo' => 'bar']]);
 * @endcode
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
    return [
      'address' => '',
      'port' => '',
    ];
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
      'port' => [
        '#type' => 'textfield',
        '#title' => t('Socket IO port'),
        '#default_value' => $this->settings['port'],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function brodcast($message) {
    $client = new Client(new Version1X($this->settings['address'] . ':' . $this->settings['port']));

    $client->initialize();
    $client->emit($message['event'], $message['data']);
    $client->close();
  }

}
