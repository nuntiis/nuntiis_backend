<?php

namespace Drupal\nuntius_room;

class nuntiusRoom {

  /**
   * Create a nuntius room entry.
   *
   * @param array $values
   *   Default values.
   *
   * @return \nuntiusRoomEntity
   */
  static public function create($values = []) {
    global $user;
    $values += [
      'uid' => $user->uid,
      'privacy' => 0,
    ];
    return entity_create('nuntius_room', $values);
  }

  /**
   * Load nuntius room entry.
   *
   * @param $id
   *   The ID of the room
   *
   * @return \nuntiusRoomEntity
   */
  static public function load($id) {
    return entity_load_single('nuntius_room', $id);
  }

  /**
   * Load multiple rooms.
   *
   * @param $ids
   *   List of IDs.
   *
   * @return \nuntiusRoomEntity[]
   */
  static public function loadMultiple($ids) {
    return entity_load('nuntius_room', $ids);
  }

  /**
   * Delete nuntius room entry.
   *
   * @param $id
   *   List of IDs.
   *
   * @return bool
   */
  static public function delete($id) {
    return entity_delete('nuntius_room', $id);
  }

  /**
   * Delete multiple nuntius room entries.
   *
   * @param $ids
   *   List of IDs.
   *
   * @return bool
   */
  static public function deleteMultiple($ids) {
    return entity_delete_multiple('nuntius_room', $ids);
  }

}