<?php
namespace App\Helper;

use \Core\Pattern\SingletonTrait;

class AuthHelper extends \Core\Lib\SessionManager {
	
	use SingletonTrait;
	
	public function authAreaControl() {

		if (parent::get('user') === false)
			throw new \Exception(get_class() . ':ValidSessionErr', 1);

		return true;
	}

	public function authenticate(int $userId) {
		return parent::set('user', $userId);
	}

	public function endSession() {
		parent::destroy();
	}

}
