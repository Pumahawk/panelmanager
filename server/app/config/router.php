<?php
$routeList = [
  [
    'group' => '/REST.php',
    [
      'group'=>'/tmp',
      [
        'name' => 'tmptest', 'pattern' => '/test_data_manager',
        'options' => [
          '_controller' => 'Test', '_action' => 'dataManager'
        ]
      ]
    ],
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
          '_controller' => 'Progetti', '_action' => 'save'
        ]
      ],
      [
        'name' => 'logut', 'pattern' => '/get_options.json',
        'options' => [
          '_controller' => 'Progetti', '_action' => 'getOption'
        ]
      ],
      [
        'name' => 'deletePr', 'pattern' => '/delete/{id:[0-9]+}',
        'options' => [
          '_controller' => 'Progetti', '_action' => 'delete'
        ]
      ]
    ],
    [
      'group' => '/Media', 'middleware' => ['logged'],
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
      ],
      [
        'name' => 'deleteMedia', 'pattern' => '/delete',
        'options' => [
          '_controller' => 'Media', '_action' => 'delete'
        ]
      ],
      [
        'name' => 'uploadMedia', 'pattern' => '/upload',
        'options' => [
          '_controller' => 'Media', '_action' => 'upload'
        ]
      ]
    ]
  ]
];

return $routeList;
