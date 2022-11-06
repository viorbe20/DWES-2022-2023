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
        
        if (isset($_POST['user_name'])) {
            $user_name = $_POST['user_name'];
        } else {
            $user_name = "";
        }


        if (isset($_POST['user_psw'])) {
            $user_psw = $_POST['user_psw'];
        } else {
            $user_psw = '';
        }

        //Validate empty fields
        if ((isset($_POST['user_name'])) && (isset($_POST['user_psw']))) {

            if ($user_name != "" && $user_psw != "") {
                //Check database
                $user = User::getInstancia();
                $user->setUser($_POST['user_name']);
                $user->setPassword($_POST['user_psw']);
                $result = $user->getByLogin(); //If user exists, $result is an array with user data

                //Session creation with user data
                if (!empty($result)) {
                foreach ($result as $value) {
                    $_SESSION['user']['profile'] = $value['u_profile'];
                    $_SESSION['user']['id'] = $value['u_id'];
                    $_SESSION['user']['name'] = $value['u_name'];
                }
                
                //Send data to js
                echo json_encode("correct_data");
                exit();
                } else {
                error_log("Non existing data");
                echo json_encode("incorrect_data");
                exit();
                }
                
            } else {
                error_log("Empty login fields");
                echo json_encode("empty_inputs");
                exit();
            }
        } else {
            $this->renderHTML('../view/home_view.php', $data);
        }
    }
}
