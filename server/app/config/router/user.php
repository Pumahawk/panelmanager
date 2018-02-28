<?php

return [
  'group' => '/User', 'middleware' => ['logged'],
  [
    'name' => 'logut', 'pattern' => '/logout',
    'options' => [
      '_controller' => 'User', '_action' => 'logout'
    ]
  ],
  [
    'name' => 'getinfo', 'pattern' => '/info',
    'options' => [
      '_controller' => 'User', '_action' => 'info'
    ]
  ],
  [
    'group'=>'/edit',
    [
      'name' => 'changePassword', 'pattern' => '/mail',
      'options' => [
        '_controller' => 'User', '_action' => 'editMail'
      ]
    ],
    [
      'name' => 'changePassword', 'pattern' => '/password',
      'options' => [
        '_controller' => 'User', '_action' => 'editPassword'
      ]
    ]
  ]
];
