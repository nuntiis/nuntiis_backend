<?php

$plugin = array(
  'label' => t('nuntius user'),
  'description' => t('Provide user endpoint for nuntius.'),
  'resource' => 'nuntius_users',
  'class' => 'nuntiusUsers',
  'entity_type' => 'user',
  'bundle' => 'user',
  'authentication_types' => TRUE,
  'authentication_optional' => TRUE,
  'menu_item' => 'nuntius/user',
);
