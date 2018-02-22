<?php

return [
    'group' => '/Fattura',
    'middleware' => ['logged'], //TODO ADD 'admin' middleware
    [
  		'name' => 'server_main', 'pattern' => '/create.json',
  		'options' => [
  		  '_controller' => 'Fatture', '_action' => 'create'
      ]
    ],
    [
  		'name' => 'server_main', 'pattern' => '/show_{fattura:[0-9]+.pdf}',
  		'options' => [
  		  '_controller' => 'Fatture', '_action' => 'show'
      ]
    ],
    [
  		'name' => 'server_main', 'pattern' => '/get_all.json',
  		'options' => [
  		  '_controller' => 'Fatture', '_action' => 'getAll'
      ]
    ],
    [
  		'name' => 'server_main', 'pattern' => '/delete.json',
  		'options' => [
  		  '_controller' => 'Fatture', '_action' => 'delete'
      ]
    ]
];
