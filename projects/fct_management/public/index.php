<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Core\Router;
use App\Controllers\IndexController;

$router = new Router();


$router->add(array(
    'name'=>'home', 
    'path'=>'/^\/$/', 
    'action'=>[IndexController::class, 'indexAction'])
);


$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);


if($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);

} else {
    echo "No route matched";
}
