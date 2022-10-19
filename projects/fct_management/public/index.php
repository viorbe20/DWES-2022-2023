<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\AdminController;

session_start();
//Siempre se abre sesión como invitado
if (!isset($_SESSION['user']['profile'] )) {
    $_SESSION['user']['profile'] = "guest";
    $_SESSION['user']['name'] = "guest";
}

$router = new Router();

$router->add(array(
    'name'=>'logout',
    'path'=>'/^\/home\/companies\/logout$/',
    'action'=>[AdminController::class, 'logoutAction'],
    'auth'=>["admin", "company", "student"]
));

$router->add(array(
    'name'=>'home',
    'path'=>'/^\/home$/',
    'action'=>[IndexController::class, 'indexAction'],
    'auth'=>["admin"]
));

//Enrutamiento a la página donde el user gestiona sus bookmarks
$router->add(array(
    'name'=>'companies',
    'path'=>'/^\/home\/companies$/',
    'action'=>[AdminController::class, 'adminAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'company_info',
    'path'=>'/^\/home\/companies\/company_info$/',
    'action'=>[AdminController::class, 'companyInfoAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'company_edit',
    'path'=>'/^\/home\/companies\/company_info\/\d{1,3}$/',
    'action'=>[AdminController::class, 'companyEditAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'worker_info',
    'path'=>'/^\/home\/companies\/worker_info$/',
    'action'=>[AdminController::class, 'workerInfoAction'],
    'auth'=>["admin"]
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
