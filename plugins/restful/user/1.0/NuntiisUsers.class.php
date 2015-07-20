<?php

/**
 * @file
 * Contains NuntiisUsers.
 */

class NuntiisUsers extends \RestfulEntityBaseUser {

  public function publicFieldsInfo() {
    $fields = parent::publicFieldsInfo();

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
  protected function processImage($picture) {
    return file_create_url($picture->uri);
  }

}
