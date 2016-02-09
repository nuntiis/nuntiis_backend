<?php

use Drupal\nuntius_room\nuntiusRoomAudience;

class nuntiusRoomEntity extends Entity {

  public $id;
  public $title;
  public $privacy;
  public $uid;

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

}
