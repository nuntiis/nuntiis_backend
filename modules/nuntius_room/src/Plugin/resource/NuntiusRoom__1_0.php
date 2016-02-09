<?php

/**
 * @file
 * Contains \Drupal\nuntius_room\Plugin\resource\NuntiusRoom__1_0.
 */

namespace Drupal\nuntius_room\Plugin\resource;

use Drupal\restful\Exception\BadRequestException;
use Drupal\restful\Plugin\resource\ResourceEntity;
use Drupal\restful\Plugin\resource\ResourceInterface;

/**
 * @Resource(
 *   name = "nuntius_rooms:1.0",
 *   resource = "nuntius_rooms",
 *   label = "Nuntius rooms",
 *   description = "Provide list of rooms.",
 *   authenticationTypes = TRUE,
 *   authenticationOptional = TRUE,
 *   dataProvider = {
 *     "entityType": "nuntius_room"
 *   }
 * )
 */
class NuntiusRoom__1_0 extends ResourceEntity implements ResourceInterface {

  /**
   * {@inheritdoc}
   */
  public function publicFields() {
    $fields = parent::publicFields();

    return $fields;
  }

}
