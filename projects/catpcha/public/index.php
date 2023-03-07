<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Core\Router;
use App\Controllers\DefaultController;

session_start();
//Siempre se abre sesión como invitado
if (!isset($_SESSION['user']['profile'] )) {
    $_SESSION['user']['profile'] = "guest";
    $_SESSION['user']['name'] = "invitado";
}

$router = new Router();

$router->add(array(
    'name'=>'home',
    'path'=>'/^\/home$/',
    'action'=>[DefaultController::class, 'indexAction'],
    'auth'=>["admin, user"]
));

$router->add(array(
    'name'=>'tab1',
    'path'=>'/^\/tab1$/',
    'action'=>[DefaultController::class, 'ttab1Action'],
    'auth'=>["admin, user"]
));


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
