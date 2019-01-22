<?php

require_once 'model/Model.php';
require_once 'controller/Controller.php';
require_once 'view/View.php';


$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
}


echo $view->output();