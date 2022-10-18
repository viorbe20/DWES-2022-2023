<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Validation;

require_once('..\app\Config\constantes.php');

class IndexController extends BaseController
{

    public function indexAction()
    {

        $data = array();

        //Login validation
        if (isset($_POST['login'])) {

            //Empty validation
            if (empty($_POST['user_name'])) {
                $data['loginMsg'] = 'El campo usuario no puede estar vacío';
            } elseif (empty($_POST['user_psw'])) {
                $data['loginMsg'] = 'El campo contraseña no puede estar vacío';
            } else {
                //User instance
                $user = User::getInstancia();
                $user->setUser($_POST['user_name']);
                $user->setPassword($_POST['user_psw']);

                //User validation
                $result = $user->getByLogin(); //If user exists, $result is an array with user data

                //Session creation with user data
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $_SESSION['user']['profile'] = $value['u_profile'];
                        $_SESSION['user']['id'] = $value['u_id'];
                        $_SESSION['user']['name'] = $value['u_name'];
                    }
                    header('location: ' . DIRBASEURL . '/home/companies'); //If user exists, redirect to companies page

                } else {
                    $data['loginMsg'] = 'Campos incorrectos';
                    $this->renderHTML('../view/home_view.php', $data);
                }
            }
        } else {
            $this->renderHTML('../view/home_view.php', $data);
        }
    }
}
