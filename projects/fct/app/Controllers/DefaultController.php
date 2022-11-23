<?php

namespace App\Controllers;

use App\Models\Company;
use App\Models\User;

require_once '../app/Config/constantes.php';
require_once '../../fct/utils/my_utils.php';


class DefaultController extends BaseController
{

    public function companiesAction()
    {
        echo 'ya toy';
    }

    public function indexAction()
    {

        $data = array();

        //Validate fields
        if ((isset($_POST['username'])) && (isset($_POST['password']))) {
            $username = clearData($_POST['username']);
            $password = clearData($_POST['password']);

            //If not empty, validate data
            if ($username != "" && $password != "") {
                //Check database
                $user = User::getInstancia();
                $user->setUser($username);
                $user->setPassword($password);
                $result = $user->getByLogin(); //If user exists, $result is an array with user data
                
                //Session creation with user data
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $_SESSION['user']['profile'] = $value['u_profile'];
                        $_SESSION['user']['id'] = $value['u_id'];
                        $_SESSION['user']['name'] = $value['u_name'];
                        $data['status'] = 'success';
                        $data['processForm'] = true;
                    }
                } else {
                    error_log("Non existing data");
                    $data['status'] = 'error';
                    $data['message'] = 'Usuario incorrecto';
                }
            }
            echo json_encode($data);
            exit();
        } else {
            $this->renderHTML('../view/home.php', $data);
        }
    }
}
