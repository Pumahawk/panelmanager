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
    ]
  ]
];

return $routeList;
