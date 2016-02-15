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

    switch ($op) {
      case 'create':
        // Check if the user have access to the room.
        return nuntiusRoom::load($this->room_id)->access('view', $account);

      case 'view':
        if ($this->uid == $account->uid) {
          return TRUE;
        }

        if (user_access('watch any message', $account)) {
          return TRUE;
        }

        // The uer don't have a permission to watch other messages. Check view
        // access for the message's room.
        return nuntiusRoom::load($this->room_id)->access('view', $account);

      case 'update':
        if (user_access('edit any message', $account)) {
          return TRUE;
        }

        if ($this->uid == $account->uid) {
          return user_access('edit message', $account);
        }
      break;

      case 'delete':
        if (user_access('delete any message', $account)) {
          return TRUE;
        }

        if ($this->uid == $account->uid) {
          return user_access('delete message', $account);
        }
        break;
    }

    return FALSE;

  }

}