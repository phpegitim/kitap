<?php 
ini_set('session.use_trans_sid', 1); 
session_set_cookie_params(1800, '/', 'localhost', isset($_SERVER["HTTPS"]), true);
session_name('AppSID');
session_start();



