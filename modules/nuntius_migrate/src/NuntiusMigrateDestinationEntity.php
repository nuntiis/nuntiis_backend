<?php

namespace Drupal\nuntius_migrate;

class NuntiusMigrateDestinationEntity extends \MigrateDestinationEntity {

  /**
   * Derived classes must implement fields(), returning a list of available
   * destination fields.
   *
   * @param Migration $migration
   *  Optionally, the migration containing this destination.
   * @return array
   *  Keys: machine names of the fields (to be passed to addFieldMapping)
   *  Values: Human-friendly descriptions of the fields.
   */
  public function fields() {
    return ['id', 'title'];
  }

  /**
   * Derived classes must implement import(), to construct one new object (pre-pppulated
   * using field mappings in the Migration). It is expected to call prepare and
   * complete handlers, passing them $row (the raw data from the source).
   */
  public function import(\stdClass $object, \stdClass $row) {
    dpm(func_get_args());

    $this->complete($object, $row);

    return [1];
  }
}