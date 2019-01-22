<?php 
require_once 'system/SessionSecurityHandler.php';
require_once 'system/SessionManager.php';

use src\system\{SessionManager,SessionSecurityHandler};

SessionManager::sessionStart('App',1200);
