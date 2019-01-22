<?php 

namespace src\system;

abstract Class SessionSecurityHandler{
	
	static protected function preventHijacking(){
		if(!isset($_SESSION['IPaddress']) || !isset($_SESSION['userAgent']))
			return false;
	
		if ($_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR'])
			return false;
	
		if( $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT'])
			return false;
	
		return true;
	}	
	
}
