<?php

use Drupal\nuntius_room\nuntiusRoomAudience;
use \Drupal\nuntius_ticker\nuntiusTicker;

class nuntiusRoomEntity extends Entity {

  public $id;
  public $title;
  public $privacy;
  public $uid;

  /**
   * {@inheritdoc}
   */
  public function save() {
    $parent = parent::save();

    if ($this->privacy === 0) {
      // Create a new ticker.
      nuntiusTicker::create([
        'lead_to' => $this->identifier(),
        'title' => $this->title,
        'status' => TRUE,
      ])->save();
    }
    else {
      nuntiusTicker::create([
        'lead_to' => $this->identifier(),
        'title' => $this->title,
        'status' => TRUE,
      ])
        ->setTriggerWebSocket(FALSE)
        ->save();

      // Send web socket in private channel of the audiences.
    }

    return $parent;
  }

  /**
   * Add a user to the room.
   *
   * @param $uid
   *   The user ID.
   *
   * @return bool
   */
  public function addAudience($uid) {
    if ($this->queryRoomAudience($uid)) {
      return;
    }

    return nuntiusRoomAudience::create([
      'room_id' => $this->id,
      'uid' => $uid
    ])->save();
  }

  /**
   * Remove a user from the room.
   *
   * @param $uid
   *  The uer ID.
   *
   * @return bool
   */
  public function revokeAudience($uid) {
    $results = $this->queryRoomAudience($uid);

    if (empty($results['nuntius_room_audience'])) {
      return;
    }

    $ids = array_keys($results['nuntius_room_audience']);
    return nuntiusRoomAudience::delete(reset($ids));
  }

  /**
   * Check if the user belong to the room.
   *
   * @param $uid
   *   The user ID.
   *
   * @return bool
   */
  public function isAudience($uid) {
    $result = $this->queryRoomAudience($uid);
    return !empty($result['nuntius_room_audience']);
  }

  /**
   * Query room audience entity which bind the user to this room.
   *
   * @param $uid
   *   The user ID.
   *
   * @return array
   */
  protected function queryRoomAudience($uid) {
    $query = new \EntityFieldQuery();
    return $query
      ->entityCondition('entity_type', 'nuntius_room_audience')
      ->propertyCondition('room_id', $this->id)
      ->propertyCondition('uid', $uid)
      ->execute();
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
    if ($op == 'view') {
      if (!$this->privacy) {
        return TRUE;
      }

      // Check if the current user is the owner of the room.
      if ($this->uid == $account->uid) {
        return TRUE;
      }

      return (bool)$this->isAudience($account->uid);
    }
  }

}
