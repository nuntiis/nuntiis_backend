<?php

use Drupal\nuntius\Nuntius;

class nuntiusMessageEntity extends Entity {

  public function save() {
    $entity = parent::save();

    if (!$resource = Nuntius::processRestfulEntity($this->identifier(), 'messages')) {
      return $entity;
    }

    $websocket = Nuntius::initWebSocketManager();
    $websocket->brodcast(['event' => 'new message', 'data' => [$resource]]);

    return $entity;
  }

}