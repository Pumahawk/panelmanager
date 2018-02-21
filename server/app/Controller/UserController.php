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
			$resp['message'] = 'Wrong username or password';
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
	function editMailAction() {
		$data = json_decode(file_get_contents('php://input'), true);
		if(isset($data['email'])) {
	    $dataManager = new DataManager();
	    $imp = $dataManager -> openFileJSON('UserIMP');
			$imp -> email = $data['email'];
			User::editData((array) $imp);
			$resp['status'] = 'OK';
			$resp['message'] = 'Status ok';
			echo json_encode($resp);
		}
	}
	function editPasswordAction() {
		$data = json_decode(file_get_contents('php://input'), true);
		if(isset($data['password'])) {
	    $dataManager = new DataManager();
	    $imp = $dataManager -> openFileJSON('UserIMP');
			$imp -> password = md5($data['password']);
			User::editData((array) $imp);
			$resp['status'] = 'OK';
			$resp['message'] = 'Status ok';
			echo json_encode($resp);
		}
	}

	function infoAction() {
    $dataManager = new DataManager();
    $imp = $dataManager -> openFileJSON('UserIMP');

		$resp['mail'] = $imp -> email;
		echo json_encode($resp);

	}
}
