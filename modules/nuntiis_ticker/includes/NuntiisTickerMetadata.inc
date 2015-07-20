<?php

/**
 * @file
 * Provides Entity metadata integration.
 */

/**
 * Extend the defaults.
 */
class NuntiisTickerMetadata extends EntityDefaultMetadataController {

  public function entityPropertyInfo() {
    $info = parent::entityPropertyInfo();
    $properties = &$info[$this->type]['properties'];
    return $info;
  }
}
