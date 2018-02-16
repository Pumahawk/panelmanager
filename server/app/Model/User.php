<?php

class User {
  public static function login($data){

		if($data['email'] == 'user@user.it' && $data['password'] == 'pass') {
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
}
