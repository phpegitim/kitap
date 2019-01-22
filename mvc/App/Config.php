<?php
namespace App;

use Core\Pattern\SingletonTrait;

class Config{
	
	use SingletonTrait;
	
	const APP_NAME = 'todo';
	const APP_VERSION = 1.0;
	
	const ROUTE_DEFAULT = 'Login';
	
	const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_NAME = 'todo_list';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
	
	const SHOW_ERRORS = true;
	const TEMPLATE_NAME = 'bootstrap';
	const FRONTEND_VERSION = 1.005;
	
}