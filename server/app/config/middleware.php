<?php
	$middleware = [
		'logged' => function($data, $middleware){
			if(PanelManager\User::isLogged()) {
				$middleware -> exec();
			} else {
				$ret = [
					'status' => 'error',
					'message' => 'You need logged'
				];
				echo json_encode($ret);
			}
		}
	];
	return $middleware;
