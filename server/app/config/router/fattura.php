<?php

return [
    'group' => '/Fattura',
    'middleware' => ['logged'], //TODO ADD 'admin' middleware
    [
  		'name' => 'server_main', 'pattern' => '/create',
  		'options' => [
  		  '_controller' => 'Fatture', '_action' => 'create'
      ]
    ],
    [
  		'name' => 'server_main', 'pattern' => '/{fattura:[0-9]+.pdf}',
  		'options' => [
  		  '_controller' => 'Fatture', '_action' => 'show'
      ]
    ],
    [
  		'name' => 'server_main', 'pattern' => '/all',
  		'options' => [
  		  '_controller' => 'Fatture', '_action' => 'getAll'
      ]
    ],
    [
  		'name' => 'server_main', 'pattern' => '/delete',
  		'options' => [
  		  '_controller' => 'Fatture', '_action' => 'delete'
      ]
    ]
];
