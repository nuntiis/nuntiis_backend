<?php

use Drupal\nuntius\Nuntius;

use Drupal\nuntius\nuntiusException;
use \Drupal\nuntius_room\nuntiusRoom;

class nuntiusMessageEntity extends Entity {

  public $text;
  public $room_id;
  public $uid;

  public function save() {
    $this->validate();

    $entity = parent::save();

    if (!$resource = Nuntius::processRestfulEntity($this->identifier(), 'messages')) {
      return $entity;
    }

    $websocket = Nuntius::initWebSocketManager();
    $websocket->brodcast(['event' => 'new message', 'data' => [$resource]]);

    return $entity;
  }

  /**
   * Validate function; Checking the room exists before creating the message.
   */
  public function validate() {
    if (!nuntiusRoom::load($this->room_id)) {
      throw new nuntiusException(format_string('A room with the ID @id was not found.'));
    }
  }

}