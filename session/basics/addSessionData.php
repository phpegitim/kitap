<?php

session_start();

$userArr = array(
					'first_name' => 'mehmet ali', 
					'last_name' => 'uysal', 
					'IPAddress' => $_SERVER['REMOTE_ADDR'],
					'userAgent' => $_SERVER['HTTP_USER_AGENT']
				);

$_SESSION['user'] = $userArr;
