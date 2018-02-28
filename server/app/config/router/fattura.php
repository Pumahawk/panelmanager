<?php

return [
    'group' => '/Fattura',
    'middleware' => ['logged'], //TODO ADD 'admin' middleware
    [
  		'name' => 'server_main', 'pattern' => '/create',
  		'options' => [
  		  '_controller' => 'PanelManager\\Fatture', '_action' => 'create'
      ]
    ],
    [
  		'name' => 'server_main', 'pattern' => '/{fattura:[0-9]+.pdf}',
  		'options' => [
  		  '_controller' => 'PanelManager\\Fatture', '_action' => 'show'
      ]
    ],
    [
  		'name' => 'server_main', 'pattern' => '/all',
  		'options' => [
  		  '_controller' => 'PanelManager\\Fatture', '_action' => 'getAll'
      ]
    ],
    [
  		'name' => 'server_main', 'pattern' => '/delete',
  		'options' => [
  		  '_controller' => 'PanelManager\\Fatture', '_action' => 'delete'
      ]
    ],
    [
      'group'=>'/Option',
      [
        'name' => 'saveOptionFattura', 'pattern' => '/save',
        'options' => [
          '_controller' => 'PanelManager\\Fatture', '_action' => 'saveOption'
        ]
      ],
      [
        'name' => 'getOptionFattura', 'pattern' => '',
        'options' => [
          '_controller' => 'PanelManager\\Fatture', '_action' => 'getOption'
        ]
      ]
    ]
];
