<?php

$plugin = array(
  'label' => t('Nuntiis user'),
  'description' => t('Provide user endpoint for nuntiis.'),
  'resource' => 'nuntiis_users',
  'class' => 'NuntiisUsers',
  'entity_type' => 'user',
  'bundle' => 'user',
  'authentication_types' => TRUE,
  'authentication_optional' => TRUE,
  'menu_item' => 'nuntiis/user',
);
