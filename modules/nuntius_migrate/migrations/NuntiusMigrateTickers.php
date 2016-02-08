<?php

use Drupal\nuntius_migrate\NuntiusEntityMigrateBase;

class NuntiusMigrateTickers extends NuntiusEntityMigrateBase {

  protected $entityType = 'nuntius_ticker';

  public $csvColumns = [
    ['title', 'Title'],
  ];

  public function __construct(array $arguments) {
    parent::__construct($arguments);

    $this->addFieldMapping('title', 'title');
  }

  /**
   * {@inheritdoc}
   */
  static public function getKeySchema() {
    return [
      'id' => [
        'type' => 'int',
        'unsigned' => TRUE,
        'description' => 'ID of ticker',
      ],
    ];
  }

}
