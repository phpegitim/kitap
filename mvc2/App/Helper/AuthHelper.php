<?php

namespace App\Helper;
use App\Model\Entity\User;

class AuthHelper extends \Core\Lib\SessionManager {

	private static function authAreaControl() {
		if (parent::get('user') === false)
			throw new \Exception(get_class() . ':ValidSessionErr',1);

		return true;
	}

	private static function authenticate(User $user) {
		if ($user -> getId() == null)
			throw new \BadMethodCallException(getclass() . 'UserEntity Err');

		return parent::set('user', $user -> getId());
	}
	
	private static function endSession() {
		parent::destroy();
	}	

	public static function __callStatic($name, $args) {
		parent::sessionStart();
		if (method_exists(__CLASS__, $name))
			return call_user_func_array(array(__CLASS__, $name), $args);
	}

}
