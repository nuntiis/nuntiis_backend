<?php

namespace Drupal\nuntius\Plugin\websocket;

use Drupal\nuntius\WebSocketBase;

/**
 * Class SocketIoBase
 * @package Drupal\nuntius\Plugin\Pusher
 *
 * @code
 *  $websocket = Nuntius::initWebSocketManager();
 *  $data['message'] = 'hello world';
 *  $websocket->brodcast(['test_channel', 'my_event', $data]);
 * @endcode
 *
 * @WebSocket(
 *   id = "pusher",
 *   name = "Pusher"
 * )
 */
class Pusher extends WebSocketBase {

  /**
   * {@inheritdoc}
   */
  public function defaultValues() {
    return [
      'app_id' => '',
      'app_key' => '',
      'app_secret' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm() {
    return [
      'app_id' => [
        '#type' => 'textfield',
        '#title' => t('App ID'),
        '#default_value' => $this->settings['app_id'],
      ],
      'app_key' => [
        '#type' => 'textfield',
        '#title' => t('App key'),
        '#default_value' => $this->settings['app_key'],
      ],
      'app_secret' => [
        '#type' => 'textfield',
        '#title' => t('App secret'),
        '#default_value' => $this->settings['app_secret'],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function brodcast($message) {
    $pusher = new \Pusher($this->settings['app_key'], $this->settings['app_secret'], $this->settings['app_id']);
    call_user_func_array([$pusher, 'trigger'], $message);
  }
}