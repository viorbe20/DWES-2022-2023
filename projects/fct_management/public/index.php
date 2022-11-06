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

$router->add(array(
    'name'=>'companies',
    'path'=>'/^\/home\/companies$/',
    'action'=>[AdminController::class, 'companyAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'companiesDB',
    'path'=>'/^\/home\/companies\/getCompaniesTable$/',
    'action'=>[AdminController::class, 'getCompaniesTableAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'create company',
    'path'=>'/^\/home\/create_company$/',
    'action'=>[AdminController::class, 'createCompanyAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'employees',
    'path'=>'/^\/home\/employees$/',
    'action'=>[AdminController::class, 'employeeAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'employee_add',
    'path'=>'/^\/home\/employees\/employee_add\/\d{1,3}$/',
    'action'=>[AdminController::class, 'employeeAddAction'],
    'auth'=>["admin"]
));


$router->add(array(
    'name'=>'company_profile',
    'path'=>'/^\/home\/companies\/company_profile\/\d{1,3}$/',
    'action'=>[AdminController::class, 'companyProfileAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'company_edit',
    'path'=>'/^\/home\/companies\/company_edit\/\d{1,3}$/',
    'action'=>[AdminController::class, 'companyEditAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'employee_edit',
    'path'=>'/^\/home\/employees\/employee_edit\/\d{1,3}$/',
    'action'=>[AdminController::class, 'employeeEditAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'company_delete',
    'path'=>'/^\/home\/companies\/company_delete\/\d{1,3}$/',
    'action'=>[AdminController::class, 'companyDeleteAction'],
    'auth'=>["admin"]
));

$router->add(array(
    'name'=>'employee_delete',
    'path'=>'/^\/home\/employees\/employee_delete\/\d{1,3}$/',
    'action'=>[AdminController::class, 'employeeDeleteAction'],
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
