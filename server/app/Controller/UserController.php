<?php

use View\View;

class UserController {
	public function loginAction() {
		$data = json_decode(file_get_contents('php://input'), true);
		if(User::login($data)) {
			$resp['status'] = 'OK';
			$resp['message'] = 'Status ok';
		} else {
			$resp['status'] = 'ERROR';
			$resp['message'] = 'NOT LOGIN';
		}
		echo json_encode($resp);
	}
  public function logoutAction() {
    session_destroy();
    $ret = [
      'status' => 'OK'
    ];
		echo json_encode($ret);
  }
}
