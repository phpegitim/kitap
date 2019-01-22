<?php

namespace src\system;

class SessionManager extends SessionSecurityHandler {
	static function sessionStart($name, $limit = 0, $path = '/', $domain = null, $secure = null) {
		
		session_name($name . 'SID');

		// alan adı gönderilmez ise mevcut alan adına oturumu bağlıyoruz
		$domain = isset($domain) ? $domain : isset($_SERVER['SERVER_NAME']);

		// Erişim Https de ise, ve argüman gönderilmemişse secure tanımlaması yapıyoruz.  
		$https = isset($secure) ? $secure : isset($_SERVER['HTTPS']);

		// argüman değerleri ile oturum parametrelerini tanımlıyoruz.
		session_set_cookie_params($limit, $path, $domain, $secure, true);
		session_start();
		
		if(self::preventHijacking()===false){
			
			$_SESSION = array();
			$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];			
			
		}
	}
	
	
	

}
