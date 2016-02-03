<?php

namespace Drupal\nuntius_migrate;

abstract class NuntiusEntityMigrateBase extends \Migration {

  /**
   * @var string
   *
   * The entity type the handler handle.
   */
  protected $entityType;

  /**
   * @var array
   *
   * List of csv columns.
   */
  public $csvColumns = [];

  /**
   * {@inheritdoc}
   */
  public function __construct($arguments) {
    parent::__construct($arguments);

    $this->source = new \MigrateSourceCSV(drupal_get_path('module', 'nuntius_migrate') . '/csv/' . $this->entityType . '.csv', $this->csvColumns);
    $this->destination = new NuntiusMigrateDestinationEntity($this->entityType, '');
    $this->map = new \MigrateSQLMap($this->machineName, [], \NuntiusMigrateTickers::getKeySchema());
  }

}
