<?php

namespace Core\Lib;

class SessionManager {

	static function sessionStart($name = \App\Config::APP_NAME, $limit = 0, $path = '/', $domain = null, $secure = null) {
		session_name($name . 'SID');
		$domain = isset($domain) ? $domain : $_SERVER['SERVER_NAME'];
		$https = isset($secure) ? $secure : isset($_SERVER['HTTPS']);
		session_set_cookie_params($limit, $path, $domain, $secure, true);
		session_start();
	}

	static function get($key) {

		if (isset($_SESSION[$key]))
			return $_SESSION[$key];

		return false;

	}

	static function set(string $key, $value) {
		$_SESSION[$key] = $value;
	}

	static function destroy() {
		session_destroy();
	}

}
