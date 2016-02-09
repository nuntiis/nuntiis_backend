<?php

namespace Drupal\nuntius_message\Plugin\resource;

use Drupal\restful\Exception\BadRequestException;
use Drupal\restful\Plugin\resource\DataProvider\DataProviderEntity;

class DataProviderMessage extends DataProviderEntity {

  public function parseRequestForListFilter() {
    $input = $this->getRequest()->getParsedInput();
    if (!in_array('room', array_keys($input['filter']))) {
      throw new BadRequestException(format_string('The room ID is missing from the filter.'));
    }

    return parent::parseRequestForListFilter();
  }

}