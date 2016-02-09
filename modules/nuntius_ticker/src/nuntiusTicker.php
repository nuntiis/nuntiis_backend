<?php

namespace Drupal\nuntius_ticker;

class nuntiusTicker {

  /**
   * Create a nuntius ticker entry.
   *
   * @param array $values
   *   Default values.
   *
   * @return \nuntiusTickerEntity
   */
  static public function create($values = []) {
    return entity_create('nuntius_ticker', $values);
  }

  /**
   * Load nuntius ticker entry.
   *
   * @param $id
   *   The ID of the message
   *
   * @return \nuntiusTickerEntity
   */
  static public function load($id) {
    return entity_load_single('nuntius_ticker', $id);
  }

  /**
   * Load multiple tickers.
   *
   * @param $ids
   *   List of IDs.
   *
   * @return \nuntiusTickerEntity[]
   */
  static public function loadMultiple($ids) {
    return entity_load('nuntius_ticker', $ids);
  }

  /**
   * Delete nuntius ticker entry.
   *
   * @param $id
   *   List of IDs.
   *
   * @return bool
   */
  static public function delete($id) {
    return entity_delete('nuntius_ticker', $id);
  }

  /**
   * Delete multiple nuntius ticker entries.
   *
   * @param $ids
   *   List of IDs.
   *
   * @return bool
   */
  static public function deleteMultiple($ids) {
    return entity_delete_multiple('nuntius_ticker', $ids);
  }

}