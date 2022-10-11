<?php
require "../vendor/autoload.php";
require "../app/Config/constantes.php";

//Enrutador
use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\UsuarioController;
use App\Controllers\AdminController;

session_start();

if (!isset($_SESSION['user']['profile'] )) {
    $_SESSION['user']['profile'] = "guest";
    $_SESSION['user']['name'] = "guest";
}

$router = new Router();

//Enrutamiento a la página de inicio
$router->add(array(
    'name'=>'home',
    'path'=>'/^\/home$/',
    'action'=>[HomeController::class, 'indexAction'],  
    'auth'=>["guest"]
));

//Enrutamiento logout
$router->add(array(
    'name'=>'logout',
    'path'=>'/^\/home\/logout$/',
    'action'=>[UsuarioController::class, 'logoutAction'],
    'auth'=>["admin", "user"]
));

//Enrutamiento a la página de registro de usuario
$router->add(array(
    'name'=>'signup',
    'path'=>'/^\/home\/signup$/',
    'action'=>[UsuarioController::class, 'signupAction'],
    'auth'=>["admin", "guest"]
));

//Enrutamiento a la página donde el admin gestiona los usuarios
$router->add(array(
    'name'=>'users',
    'path'=>'/^\/home\/users$/',
    'action'=>[AdminController::class, 'getUsersAction'],
    'auth'=>["admin"]
));

//Enrutamiento a la página donde el user gestiona sus bookmarks
$router->add(array(
    'name'=>'bookmarks',
    'path'=>'/^\/home\/bookmarks$/',
    'action'=>[UsuarioController::class, 'getBookmarksAction'],
    'auth'=>["admin", "user"]
));

$router->add(array(
    'name'=>'bookmarks',
    'path'=>'/^\/home\/bookmarks\?/',
    'action'=>[UsuarioController::class, 'getBookmarksAction'],
    'auth'=>["admin", "user"]
));

//Enrutamiento a la página donde el user crea sus bookmarks
$router->add(array(
    'name'=>'addBookmarks',
    'path'=>'/^\/home\/bookmarks\/add$/',
    'action'=>[UsuarioController::class, 'addBookmarkAction'],
    'auth'=>["admin", "user"]
));

//Enrutamiento a la página donde el user edita sus bookmarks
$router->add(array(
    'name'=>'editBookmarks',
    'path'=>'/^\/home\/bookmarks\/edit\/\d{1,3}$/',
    'action'=>[UsuarioController::class, 'editBookmarkAction'],
    'auth'=>["admin", "user"]
));

//Enrutamiento a la página donde el user edita sus bookmarks
$router->add(array(
    'name'=>'deleteBookmarks',
    'path'=>'/^\/home\/bookmarks\/delete\/\d{1,3}$/',
    'action'=>[UsuarioController::class, 'deleteBookmarkAction'],
    'auth'=>["admin", "user"]
));

//Petición y respuesta
$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if ($route) {
    if (!in_array($_SESSION['user']['profile'] , $route['auth'])) {
        header("location:" . DIRBASEURL . "/home");
    }else{
        $controllerName = $route['action'][0];
        $actionName = $route['action'][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    }
}else{
    echo "No route";
}