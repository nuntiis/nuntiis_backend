<?php

/**
 * @file
 * Contains \Drupal\nuntius_ticker\Plugin\resource\Ticker__1_0.
 */

namespace Drupal\nuntius_ticker\Plugin\resource;

use Drupal\restful\Plugin\resource\ResourceEntity;
use Drupal\restful\Plugin\resource\ResourceInterface;

/**
 * Class Ticker
 *
 * @Resource(
 *   name = "tickers:1.0",
 *   resource = "tickers",
 *   label = "Tickers",
 *   description = "Export the tickers with all authentication providers.",
 *   authenticationTypes = TRUE,
 *   authenticationOptional = TRUE,
 *   dataProvider = {
 *     "entityType": "nuntius_ticker"
 *   }
 * )
 */
class Ticker__1_0 extends ResourceEntity implements ResourceInterface {

  public function publicFields() {
    $fields = parent::publicFields();

    $fields['leadTo'] = [
      'property' => 'lead_to',
    ];

    $fields['status'] = [
      'property' => 'status',
    ];

    $fields['icon'] = [
      'property' => 'icon',
    ];

    return $fields;
  }

}
