<?php

namespace Drupal\nuntius_room;

class nuntiusRoomAudience {

  /**
   * Create a nuntius room audience entry.
   *
   * @param array $values
   *   Default values.
   *
   * @return \nuntiusRoomAudienceEntity
   */
  static public function create($values = []) {
    return entity_create('nuntius_room_audience', $values);
  }

  /**
   * Load nuntius room audience entry.
   *
   * @param $id
   *   The ID of the room audience
   *
   * @return \nuntiusRoomAudienceEntity
   */
  static public function load($id) {
    return entity_load_single('nuntius_room_audience', $id);
  }

  /**
   * Load multiple room audiences.
   *
   * @param $ids
   *   List of IDs.
   *
   * @return \nuntiusRoomAudienceEntity[]
   */
  static public function loadMultiple($ids) {
    return entity_load('nuntius_room_audience', $ids);
  }

  /**
   * Delete nuntius room audience entry.
   *
   * @param $id
   *   List of IDs.
   *
   * @return bool
   */
  static public function delete($id) {
    return entity_delete('nuntius_room_audience', $id);
  }

  /**
   * Delete multiple nuntius room audience entries.
   *
   * @param $ids
   *   List of IDs.
   *
   * @return bool
   */
  static public function deleteMultiple($ids) {
    return entity_delete_multiple('nuntius_room_audience', $ids);
  }

}