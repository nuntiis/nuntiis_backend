<?php
use Drupal\nuntius\Nuntius;

/**
 * The ticker entity will give provide list of links which will be on the side.
 */
class nuntiusTickerEntity extends Entity {

  public function save() {
    parent::save();

    // Send message to the websocket service.
//    if (!$resource = Nuntius::processRestfulEntity($this->identifier(), 'tickers')) {
//      return;
//    }
//    $websocket = Nuntius::initWebSocketManager();
//    $websocket->brodcast(['event' => 'new ticker', 'data' => [$resource]]);
  }

}