<?php

return [
  'group' => '/App',
  [
  'name' => 'login', 'pattern' => '/login',
  'options' => [
    '_controller' => 'User', '_action' => 'login'
    ]
  ]
];
