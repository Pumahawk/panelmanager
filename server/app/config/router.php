<?php
$routeList = [
  [
    'group' => '/REST.php',
  	[
  		'group' => '/User',
  		[
			'name' => 'demoHome', 'pattern' => '/login',
			'options' => [
			  '_controller' => 'User', '_action' => 'login'
    		]
    	]
    ]
  ]
];

return $routeList;
