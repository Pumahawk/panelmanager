<?php
$routeList = [
  [
    'group' => '/REST.php',
  	[
  		'group' => '/App',
  		[
			'name' => 'login', 'pattern' => '/login',
			'options' => [
			  '_controller' => 'User', '_action' => 'login'
    		]
    	]
    ],
    [
      'group' => '/User', 'middleware' => ['logged'],
      [
        'name' => 'logut', 'pattern' => '/logout',
        'options' => [
          '_controller' => 'User', '_action' => 'logout'
        ]
      ]
    ],
    [
      'group' => '/Project', 'middleware' => ['logged'],
      [
        'name' => 'logut', 'pattern' => '/get_all.json',
        'options' => [
          '_controller' => 'Progetti', '_action' => 'getAll'
        ]
      ],
      [
        'name' => 'logut', 'pattern' => '/open/{id:[0-9]+}.json',
        'options' => [
          '_controller' => 'Progetti', '_action' => 'open'
        ]
      ],
      [
        'name' => 'logut', 'pattern' => '/save_options',
        'options' => [
          '_controller' => 'Progetti', '_action' => 'saveOption'
        ]
      ],
      [
        'name' => 'logut', 'pattern' => '/save',
        'options' => [
          '_controller' => 'Progetti', '_action' => 'saveOption'
        ]
      ],
      [
        'name' => 'logut', 'pattern' => '/get_options.json',
        'options' => [
          '_controller' => 'Progetti', '_action' => 'getOption'
        ]
      ]
    ],
    [
      'group' => '/Media',
      [
        'name' => 'allMedia', 'pattern' => '/get_all.json',
        'options' => [
          '_controller' => 'Media', '_action' => 'getAll'
        ]
      ],
      [
        'name' => 'getByProject', 'pattern' => '/project',
        'options' => [
          '_controller' => 'Media', '_action' => 'getByIdProject'
        ]
      ]
    ]
  ]
];

return $routeList;
