<?php

class User {
  public static function login($data){

		if($data['email'] == 'user@user.it' && $data['password'] == 'pass') {
			return true;
		} else {
			return false;
		}
  }
}
