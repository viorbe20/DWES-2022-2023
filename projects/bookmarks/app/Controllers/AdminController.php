<?php

namespace App\Controllers;

use App\Models\Usuario;

require_once('..\app\Config\constantes.php');

class AdminController extends BaseController
{
    public function getUsersAction()
    {
        $data = array();
        $user = Usuario::getInstancia();
        $blockedUsers = array();
        $user->setBloqueado(1);
        $blockedUsers = $user->getBlockedUsers();
        array_push($data, $blockedUsers);

        if (isset($_POST['btn_unlock'])) {
            if (!empty($_POST["selected"])) {
                foreach ($_POST["selected"] as $key => $value) {
                    $user->setId($value);
                    $user->setBloqueado(0);
                    $user->unblockUser();
                }
                header('location:' . DIRBASEURL . '/home/users');
            }
        } else {
            $this->renderHTML('../view/users_view.php', $data);
        }
    }
}
