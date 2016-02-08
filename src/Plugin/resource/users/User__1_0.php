<?php

namespace Drupal\nuntius\Plugin\resource\users;

use Drupal\restful\Plugin\resource\ResourceEntity;
use Drupal\restful\Plugin\resource\ResourceInterface;


/**
 * Class User
 *
 * @Resource(
 *   name = "nuntius_user:1.0",
 *   resource = "nuntius_user",
 *   label = "Nuntius users",
 *   description = "Export user information.",
 *   authenticationTypes = TRUE,
 *   authenticationOptional = TRUE,
 *   dataProvider = {
 *     "entityType": "user",
 *     "bundles": {
 *       "user"
 *     },
 *   }
 * )
 */
class User__1_0 extends ResourceEntity implements ResourceInterface {

  public function publicFields() {
    $fields = parent::publicFields();

    $fields['image'] = array(
      'property' => 'picture',
      'process_callbacks' => array(
        array($this, 'processImage'),
      ),
    );

    return $fields;
  }

  /**
   * Process the picture object.
   */
  public function processImage($picture) {
    return file_create_url($picture->uri);
  }

}

