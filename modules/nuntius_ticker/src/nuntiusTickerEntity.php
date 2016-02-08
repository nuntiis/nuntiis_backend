<?php
use Drupal\nuntius\Nuntius;

/**
 * The ticker entity will give provide list of links which will be on the side.
 */
class nuntiusTickerEntity extends Entity {

  public function save() {
    $entity = parent::save();

    // Send message to the websocket service.
    if (!$resource = Nuntius::processRestfulEntity($this->identifier(), 'tickers')) {
      return $entity;
    }

    $websocket = Nuntius::initWebSocketManager();
    $websocket->brodcast(['event' => 'new ticker', 'data' => [$resource]]);

    return $entity;
  }

}