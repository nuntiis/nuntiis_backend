<?php

/**
 * @file
 * Contains \Drupal\nuntius_ticker\Plugin\resource\ticker\Ticker__1_0.
 */

namespace Drupal\nuntius_message\Plugin\resource;

use Drupal\restful\Exception\BadRequestException;
use Drupal\restful\Plugin\resource\ResourceEntity;
use Drupal\restful\Plugin\resource\ResourceInterface;

/**
 * @Resource(
 *   name = "messages:1.0",
 *   resource = "messages",
 *   label = "Messages",
 *   description = "Provide list of messages for a room.",
 *   authenticationTypes = TRUE,
 *   authenticationOptional = TRUE,
 *   dataProvider = {
 *     "entityType": "nuntius_message"
 *   }
 * )
 */
class Message__1_0 extends ResourceEntity implements ResourceInterface {

  /**
   * {@inheritdoc}
   */
  public function publicFields() {
    $fields = parent::publicFields();

    $fields['text'] = [
      'property' => 'text',
    ];

    $fields['room'] = [
      'property' => 'room_id',
      'process_callbacks' => [
        [$this, 'processRoom'],
      ],
    ];

    $fields['user'] = [
      'property' => 'uid',
      'resource' => [
        'name' => 'nuntius_user',
        'majorVersion' => 1,
        'minorVersion' => 0,
      ],
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  protected function dataProviderClassName() {
    return '\Drupal\nuntius_message\Plugin\resource\DataProviderMessage';
  }

  /**
   * {@inheritdoc}
   */
  public function view($path) {
    $filters = $this->getRequest()->getParsedInput();

    if (empty($filters['filter']['room'])) {
      // When viewing a message we need to make sure the room ID which the
      // message belong to is present in the query in order to prevent message
      // leaking.
      throw new BadRequestException(format_string('The room ID is missing from the filter.'));
    }

    return parent::view($path);
  }

  /**
   * Don't show the room ID.
   */
  public function processRoom() {
    return NULL;
  }

}
