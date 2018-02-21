<?php

class User {
  public static function login($data){
    $dataManager = new DataManager();
    $imp = $dataManager -> openFileJSON('UserIMP');
		if($data['email'] == $imp -> email && md5($data['password']) == $imp -> password) {
      $_SESSION['user'] = true;
			return true;
		} else {
			return false;
		}
  }
  public static function isLogged() {
    if(isset($_SESSION['user'])) {
      return true;
    } else {
      return false;
    }
  }

  public static function editData($data) {
    if(isset($data['email'], $data['password'])) {
      $newData = [
        'email' => $data['email'],
        'password' => $data['password']
      ];
      $dataManager = new DataManager();
      $dataManager -> saveFileJSON('UserIMP', $newData);
    }

  }
}
