<?php
use Drupal\nuntius\Nuntius;

/**
 * The ticker entity will give provide list of links which will be on the side.
 */
class nuntiusTickerEntity extends Entity {

  public $triggerWebSocket = FALSE;

  /**
   * Determine if a web socket need to be triggered.
   *
   * @param $value
   *   The value of the object.
   *
   * @return $this
   */
  public function setTriggerWebSocket($value) {
    $this->triggerWebSocket = $value;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function save() {
    $entity = parent::save();

    // Send message to the websocket service.
    if (!$resource = Nuntius::processRestfulEntity($this->identifier(), 'tickers')) {
      return $entity;
    }

    if ($this->triggerWebSocket) {
      $websocket = Nuntius::initWebSocketManager();
      $websocket->brodcast(['event' => 'new ticker', 'data' => [$resource]]);
    }

    return $entity;
  }

  /**
   * Access callback.
   *
   * @param $op
   *   The operation being performed. One of 'view', 'update', 'create' or
   *   'delete'.
   * @param $account
   *   The user object.
   *
   * @return bool
   */
  public function access($op, $account) {

  }

}