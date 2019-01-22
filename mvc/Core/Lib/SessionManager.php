<?php

namespace Core\Lib;

class SessionManager {
	
	
	function __construct(){
		$this->sessionStart();
	}

	function sessionStart($name = \App\Config::APP_NAME, $limit = 0, $path = '/', $domain = null, $secure = null) {
		session_name($name . 'SID');
		$domain = isset($domain) ? $domain : $_SERVER['SERVER_NAME'];
		$https = isset($secure) ? $secure : isset($_SERVER['HTTPS']);
		session_set_cookie_params($limit, $path, $domain, $secure, true);
		session_start();
	}

	function get($key) {

		if (isset($_SESSION[$key]))
			return $_SESSION[$key];

		return false;

	}

	function set(string $key, $value) {
		$_SESSION[$key] = $value;
	}

	function destroy() {
		session_destroy();
	}

}
