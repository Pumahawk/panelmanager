<?php

return [
  'group' => '/Project', 'middleware' => ['logged'],
  [
    'name' => 'logut', 'pattern' => '/get_all.json',
    'options' => [
      '_controller' => 'PanelManager\\Progetti', '_action' => 'getAll'
    ]
  ],
  [
    'name' => 'logut', 'pattern' => '/open/{id:[0-9]+}.json',
    'options' => [
      '_controller' => 'PanelManager\\Progetti', '_action' => 'open'
    ]
  ],
  [
    'name' => 'logut', 'pattern' => '/save_options',
    'options' => [
      '_controller' => 'PanelManager\\Progetti', '_action' => 'saveOption'
    ]
  ],
  [
    'name' => 'logut', 'pattern' => '/save',
    'options' => [
      '_controller' => 'PanelManager\\Progetti', '_action' => 'save'
    ]
  ],
  [
    'name' => 'editproject', 'pattern' => '/edit',
    'options' => [
      '_controller' => 'PanelManager\\Progetti', '_action' => 'edit'
    ]
  ],
  [
    'name' => 'logut', 'pattern' => '/get_options.json',
    'options' => [
      '_controller' => 'PanelManager\\Progetti', '_action' => 'getOption'
    ]
  ],
  [
    'name' => 'deletePr', 'pattern' => '/delete/{id:[0-9]+}',
    'options' => [
      '_controller' => 'PanelManager\\Progetti', '_action' => 'delete'
    ]
  ]
];
