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
    return ['title'];
  }

  public function import(\stdClass $node, \stdClass $row) {
    dpm($row);

    $entity = entity_create('nuntius_ticker', array('title' => 1));
//    $this->prepare($entity, $row);
    entity_save('nuntius_ticker', $entity);
//    $this->complete($entity, $row);
    dpm($entity);
    $this->numCreated++;
    return array($entity->id);
  }

}