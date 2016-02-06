<?php

/**
 * @file
 * Contains \Drupal\nuntius\Annotation\WebSocket.
 */

namespace Drupal\nuntius\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a WebSocket annotation object.
 *
 * @ingroup plug_example_api
 *
 * @Annotation
 */
class WebSocket extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  public $name;

}
