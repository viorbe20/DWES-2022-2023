<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

use App\Models\User;

class DefaultController extends BaseController
{

    public function homeaction()
    {

        $data = array();

        if (isset($_POST['btn_login'])) {
            $user = User::getInstancia();
            $user->setUsername(clearData($_POST['username']));
            $user->setPsw(clearData($_POST['psw']));

            if ($user->getByLogin() != null) { //Login button

                $_SESSION['user']['status'] = "login";

                foreach ($user->getByLogin() as $value) {

                    if ($value['status_fk'] == "baja") {
                        echo "<script>alert('Este usuario ya no existe.')</script>";
                        $_SESSION['user']['status'] = "logout";
                        $this->renderHTML('../view/home.php', $data);
                    } else {
                        $_SESSION['user']['id'] = $value['id'];
                        $_SESSION['user']['status'] = "login";
                        $_SESSION['user']['name'] = $value['name'];
                        $_SESSION['user']['username'] = $value['username'];
                        $_SESSION['user']['profile'] = $value['profile_fk'];
                        header('Location: ' . DIRBASEURL . "/companies");                        
                    }
                }
            } else {
                echo "<script>alert('Usuario o contraseña incorrectos.')</script>";
                $this->renderHTML('../view/home.php', $data);
                exit();
            }
        } else { //By default
            $this->renderHTML('../view/home.php', $data);
        }
    }

    public function logoutAction()
    {
        session_start();
        //Empty all session variables
        unset($_SESSION);
        //Close session
        session_destroy();
        //Redirect to home
        header('Location: ' . DIRBASEURL . "/home");
        //header('location: index.php');
    }

    public function testAction(){
        $data = array();
        $this->renderHTML('../view/test.php', $data);
    }
}
