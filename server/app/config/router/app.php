<?php

return [
  'group' => '/App',
  [
  'name' => 'login', 'pattern' => '/login',
  'options' => [
    '_controller' => 'PanelManager\\User', '_action' => 'login'
    ]
  ]
];
