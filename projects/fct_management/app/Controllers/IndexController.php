<?php

namespace App\Controllers;

use App\Models\User;

require_once('..\app\Config\constantes.php');

class IndexController extends BaseController
{

    public function indexAction()
    {

        $data = array();

        //Login validation
        if (isset($_POST['login'])) {
            
            //Empty validation
            if ((empty($_POST['user_name'])) || (empty($_POST['user_psw']))) {
                    $data['loginMsg'] = 'Rellena todos los campos';
                    $this->renderHTML('../view/home_view.php', $data);
            } else {
                //User instance
                $user = User::getInstancia();
                $user->setUser($_POST['user_name']);
                $user->setPassword($_POST['user_psw']);

                //User validation
                $result = $user->getByLogin(); //If user exists, $result is an array with user data
                if (!empty($result)) {
                    header('location: ' . DIRBASEURL. '/home/companies'); //If user exists, redirect to companies page

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
