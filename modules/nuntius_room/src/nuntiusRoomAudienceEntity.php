<?php

use Drupal\nuntius\nuntiusException;
use Drupal\nuntius_room\nuntiusRoom;

class nuntiusRoomAudienceEntity extends Entity {

  public $uid;
  public $room_id;

  public function save() {
    $this->validate();

    $parent = parent::save();

    // Trigger web socket for creating a new ticker.

    return $parent;
  }

  /**
   * Validate function; Verifying the room exists before creating the audience.
   */
  public function validate() {
    if (!nuntiusRoom::load($this->room_id)) {
      throw new nuntiusException(format_string('A room with the ID @id was not found.'));
    }
  }
}
