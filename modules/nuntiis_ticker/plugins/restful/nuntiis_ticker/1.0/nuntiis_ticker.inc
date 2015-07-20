<?php

$plugin = array(
  'label' => t('Nuntiis ticker'),
  'description' => t('Provide ticker endpoint for nuntiis.'),
  'resource' => 'nuntiis_ticker',
  'class' => 'NuntiisTicker',
  'entity_type' => 'nuntiis_ticker',
  'authentication_types' => TRUE,
  'authentication_optional' => TRUE,
  'menu_item' => 'nuntiis/ticker',
);
