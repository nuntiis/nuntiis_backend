<?php

/**
 * The ticker entity will give provide list of links which will be on the side.
 */
class nuntiusTicker extends Entity {

  public function save() {
    parent::save();

    // Send message to the websocket service.
  }

}