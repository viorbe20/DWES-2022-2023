<?php

namespace App\Controllers;
require_once '../app/Config/constantes.php';
require_once '../utils/validation.php';


class DefaultController extends BaseController
{
    public function indexAction()
    {
        $data = array();
        $usernameValidation = false;
        $passwordValidation = false;

        if (isset($_POST['btn_login'])) {
            $username = clearData($_POST['username']);
            $password = clearData($_POST['password']);

            $usernameValidation = nameValidation($username);
            $passwordValidation = passwordValidation($password);

            if ($usernameValidation && $passwordValidation) {
                $_SESSION['user']['username'] = $username;
                $_SESSION['user']['password'] = $password;
                $this->renderHTML("/view/tab1.php", $data);
            } else {
                $data['errorMessage'] = "Datos incorrectos";
                $this->renderHTML('../view/home.php', $data);
            } 
        } else {  //By default, the user is a guest
            $this->renderHTML('../view/home.php', $data);
        }
    } 
}
