<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Core\Router;
use App\Controllers\DefaultController;
use App\Controllers\CompanyController;
use App\Controllers\AdminController;
use App\Controllers\EmployeeController;
use App\Controllers\UserController;
use App\Controllers\StudentController;

session_start();

//Siempre se abre sesión como invitado
if (!isset($_SESSION['user']['profile'])) {
    $_SESSION['user']['profile'] = "guest";
    $_SESSION['user']['name'] = "invitado";
    $_SESSION['user']['status'] = "logout";
}

$router = new Router();

$router->add(array(
    'name' => 'students',
    'path' => '/^\/students$/',
    'action' => [StudentController::class, 'studentsAction'],
    'auth' => ["admin, user"]
));


$router->add(array(
    'name' => 'create assignment',
    'path' => '/^\/assignment\/create\/\d{1,3}$/',
    'action' => [UserController::class, 'createAssignmentAction'],
    'auth' => ["admin, user"]
));

$router->add(array(
    'name' => 'cancel assignment',
    'path' => '/^\/assignment\/cancel\/\d{1,3}$/',
    'action' => [UserController::class, 'cancelAssignmentAction'],
    'auth' => ["admin, user"]
));

$router->add(array(
    'name' => 'delete employee',
    'path' => '/^\/employees\/delete_employee\/\d{1,3}$/',
    'action' => [EmployeeController::class, 'deleteEmployeeAction'],
    'auth' => ["admin, user"]
));

// $router->add(array(
//     'name' => 'edit employee',
//     'path' => '/^\/employees\/edit_employee\/\d{1,3}$/',
//     'action' => [EmployeeController::class, 'editEmployeeAction'],
//     'auth' => ["admin, user"]
// ));
$router->add(array(
    'name' => 'add employee',
    'path' => '/^\/companies\/add_employee\/\d{1,3}$/',
    'action' => [CompanyController::class, 'addEmployeeAction'],
    'auth' => ["admin, user"]
));

$router->add(array(
    'name' => 'edit company',
    'path' => '/^\/companies\/edit_company\/\d{1,3}$/',
    'action' => [CompanyController::class, 'editCompanyAction'],
    'auth' => ["admin, user"]
));

$router->add(array(
    'name' => 'company profile',
    'path' => '/^\/companies\/company_profile\/\d{1,3}$/',
    'action' => [CompanyController::class, 'companyProfileAction'],
    'auth' => ["admin, user"]
));

$router->add(array(
    'name' => 'delete company',
    'path' => '/^\/companies\/delete_company\/\d{1,3}$/',
    'action' => [CompanyController::class, 'deleteCompanyAction'],
    'auth' => ["admin, user"]
));


$router->add(array(
    'name' => 'create company',
    'path' => '/^\/companies\/create_company$/',
    'action' => [CompanyController::class, 'createCompanyAction'],
    'auth' => ["admin, user"]
));

$router->add(array(
    'name' => 'companies',
    'path' => '/^\/companies$/',
    'action' => [CompanyController::class, 'companiesAction'],
    'auth' => ["admin, user"]
));

$router->add(array(
    'name' => 'home',
    'path' => '/^\/home$/',
    'action' => [DefaultController::class, 'homeAction'],
    'auth' => ["admin, user, guest"]
));

$router->add(array(
    'name' => 'logout',
    'path' => '/^\/logout$/',
    'action' => [DefaultController::class, 'logoutAction'],
    'auth' => ["admin, user"]
));

$router->add(array(
    'name' => 'companies db',
    'path' => '/^\/companies_db$/',
    'action' => [AdminController::class, 'jqCompaniesAction'],
    'auth' => ["admin"]
));

$router->add(array(
    'name' => 'test',
    'path' => '/^\/test$/',
    'action' => [DefaultController::class, 'testAction'],
    'auth' => ["admin, user, guest"]
));

$request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "No route matched";
}
