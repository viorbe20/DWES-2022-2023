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
    $_SESSION['user']['status'] = "logout";
}

$router = new Router();

$router->add(array(
    'name'=>'students',
    'path'=>'/^\/students$/',
    'action'=>[DefaultController::class, 'studentsAction'],
    'auth'=>["admin, user"]
));

$router->add(array(
    'name'=>'employees',
    'path'=>'/^\/employees$/',
    'action'=>[DefaultController::class, 'employeesAction'],
    'auth'=>["admin, user"]
));

$router->add(array(
    'name'=>'employees table',
    'path'=>'/^\/employees_table$/',
    'action'=>[DefaultController::class, 'getEmployeesTableAction'],
    'auth'=>["admin, user"]
));

//Companies
$router->add(array(
    'name'=>'delete company',
    'path'=>'/^\/companies\/delete_company\/\d{1,3}$/',
    'action'=>[DefaultController::class, 'deleteCompanyAction'],
    'auth'=>["admin, user"]
));

$router->add(array(
    'name'=>'companies',
    'path'=>'/^\/companies\/add_company$/',
    'action'=>[DefaultController::class, 'addCompanyAction'],
    'auth'=>["admin, user"]
));

$router->add(array(
    'name'=>'companies',
    'path'=>'/^\/companies$/',
    'action'=>[DefaultController::class, 'companiesAction'],
    'auth'=>["admin, user"]
));

$router->add(array(
    'name'=>'companies table',
    'path'=>'/^\/companies_table$/',
    'action'=>[DefaultController::class, 'getCompaniesTableAction'],
    'auth'=>["admin, user"]
));

$router->add(array(
    'name'=>'home',
    'path'=>'/^\/home$/',
    'action'=>[DefaultController::class, 'indexAction'],
    'auth'=>["admin, user"]
));

$router->add(array(
    'name'=>'home',
    'path'=>'/^\/logout$/',
    'action'=>[DefaultController::class, 'logoutAction'],
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
