<?php

namespace Drupal\nuntius_message;

class nuntiusMessage {

  /**
   * Create a nuntius message entry.
   *
   * @param array $values
   *   Default values.
   *
   * @return \nuntiusMessageEntity
   */
  static public function create($values = []) {
    return entity_create('nuntius_message', $values);
  }

  /**
   * Load nuntius message entry.
   *
   * @param $id
   *   The ID of the message
   *
   * @return \nuntiusMessageEntity
   */
  static public function load($id) {
    return entity_load_single('nuntius_message', $id);
  }

  /**
   * Load multiple messages.
   *
   * @param $ids
   *   List of IDs.
   *
   * @return \nuntiusMessageEntity[]
   */
  static public function loadMultiple($ids) {
    return entity_load('nuntius_message', $ids);
  }

  /**
   * Delete nuntius message entry.
   *
   * @param $id
   *   List of IDs.
   *
   * @return bool
   */
  static public function delete($id) {
    return entity_delete('nuntius_message', $id);
  }

  /**
   * Delete multiple nuntius message entries.
   *
   * @param $ids
   *   List of IDs.
   *
   * @return bool
   */
  static public function deleteMultiple($ids) {
    return entity_delete_multiple('nuntius_message', $ids);
  }

}