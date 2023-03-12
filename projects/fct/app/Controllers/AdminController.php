<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';

use App\Models\Company;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Assignment;
use App\Models\User;
use App\Models\Admin;


class AdminController extends BaseController
{

    public function cancelUserAction($request)
    {

        if ($_SESSION['user']['profile'] == 'admin') {
            $user = User::getInstancia();
            $rest = explode("/", $request);
            $user->setId(end($rest));
            $user->setStatus('baja');
            $user->changeStatus();
            header('Location: ' . DIRBASEURL . "/users");
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function activateUserAction($request)
    {

        if ($_SESSION['user']['profile'] == 'admin') {
            $user = User::getInstancia();
            $rest = explode("/", $request);
            $user->setId(end($rest));
            $user->setStatus('alta');
            $user->changeStatus();
            header('Location: ' . DIRBASEURL . "/users");
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function editUserAction($request)
    {

        if ($_SESSION['user']['profile'] == 'admin') {

            $data = [];
            $admin = Admin::getInstancia();

            foreach ($admin->getAllProfiles() as $value) {
                $data['profiles_list'][] = $value['profile'];
            }

            if (isset($_POST['btn_save_user'])) {

                //Fill input with POST data
                if (isset($_POST['name']) && !empty($_POST['name'])) {
                    $data['name'] = clearData($_POST['name']);
                }

                if (isset($_POST['username']) && !empty($_POST['username'])) {
                    $data['username'] = clearData($_POST['username']);
                }

                if (isset($_POST['psw']) && !empty($_POST['psw'])) {
                    $data['psw'] = clearData($_POST['psw']);
                }

                //Check empty inputs
                if (empty(clearData($_POST['username'])) || empty(cleardata($_POST['psw']))) {
                    echo "<script>alert('Todos los campos deben estar rellenos.')</script>";
                    $this->renderHTML('../view/users_create.php', $data);
                } else {
                    $user = User::getInstancia();
                    $rest = explode("/", $request);
                    $user->setId(end($rest));
                    $user->setUsername(clearData($_POST['username']));

                    //Check if the username has changed
                    if (clearData($_POST['username']) != ($user->getById()[0]['username'])) {

                        $user->setUsername(clearData($_POST['username']));

                        if ($user->existingUsername() != null) {
                            echo "<script>alert('El usuario ya existe.')</script>";
                            $this->renderHTML('../view/users_create.php', $data);
                        } else {
                            $user->setName(clearData($_POST['name']));
                            $user->setPsw(clearData($_POST['psw']));
                            $user->setProfile(clearData($_POST['profile']));
                            $user->setStatus('alta');
                            $user->setUpdated_at((date('Y-m-d H:i:s')));
                            $user->update();
                            header('Location: ' . DIRBASEURL . "/users");
                        }
                    } else {
                        $user->setName(clearData($_POST['name']));
                        $user->setPsw(clearData($_POST['psw']));
                        $user->setProfile(clearData($_POST['profile']));
                        $user->setStatus('alta');
                        $user->setUpdated_at((date('Y-m-d H:i:s')));
                        $user->update();
                        header('Location: ' . DIRBASEURL . "/users");
                    }
                }
            } else { //By default, fill input with DB data
                $user = User::getInstancia();
                $rest = explode("/", $request);
                $user->setId(end($rest));
                $data['user'] = $user->getById();
                $data['name'] = $data['user'][0]['name'];
                $data['username'] = $data['user'][0]['username'];
                $data['psw'] = $data['user'][0]['psw'];
                $data['profile'] = $data['user'][0]['profile_fk'];
            }

            $this->renderHTML('../view/users_create.php', $data);
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }
    public function deleteUserAction($request)
    {

        if ($_SESSION['user']['profile'] == 'admin') {
            $user = User::getInstancia();
            $rest = explode("/", $request);
            $user->setId(end($rest));
            $user->delete();
            header('Location: ' . DIRBASEURL . "/users");
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }
    public function addUserAction()
    {

        if ($_SESSION['user']['profile'] == 'admin') {

            $data = [];

            $admin = Admin::getInstancia();

            foreach ($admin->getAllProfiles() as $value) {
                $data['profiles_list'][] = $value['profile'];
            }

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $data['name'] = clearData($_POST['name']);
            }

            if (isset($_POST['username']) && !empty($_POST['username'])) {
                $data['username'] = clearData($_POST['username']);
            }

            if (isset($_POST['psw']) && !empty($_POST['psw'])) {
                $data['psw'] = clearData($_POST['psw']);
            }


            if (isset($_POST['btn_save_user'])) {
                //Check empty inputs
                if (empty(clearData($_POST['username'])) || empty(cleardata($_POST['psw']))) {
                    echo "<script>alert('Todos los campos deben estar rellenos.')</script>";
                    $this->renderHTML('../view/users_create.php', $data);
                } else {
                    $user = User::getInstancia();
                    $user->setUsername(clearData($_POST['username']));

                    //Check if the user exists
                    if ($user->existingUsername() != null) {
                        echo "<script>alert('El usuario ya existe.')</script>";
                        $this->renderHTML('../view/users_create.php', $data);
                    } else {
                        $user->setName(clearData($_POST['name']));
                        $user->setPsw(clearData($_POST['psw']));
                        $user->setProfile(clearData($_POST['profile']));
                        $user->setStatus('alta');
                        $user->setCreated_at(date('Y-m-d H:i:s'));
                        $user->setUpdated_at((date('Y-m-d H:i:s')));
                        $user->set();

                        header('Location: ' . DIRBASEURL . "/users");
                    }
                }
            } else {
                $this->renderHTML('../view/users_create.php', $data);
            }
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }
    public function usersAction()
    {
        if ($_SESSION['user']['profile'] == 'admin') {
            $data = [];
            $admin = Admin::getInstancia();
            $data['users_list'] = $admin->getAllUsers();
            $this->renderHTML('../view/users.php', $data);
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function jqCompleteAssignments()
    {
        if ($_SESSION['user']['profile'] == 'admin') {
            $assignment = new Assignment();
            echo json_encode($assignment->getCompleteAssignments());
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function jqStudentsAction()
    {
        if ($_SESSION['user']['profile'] == 'admin') {
            $student = new Student();
            echo json_encode($student->getAllActive());
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function jqEmployeesAction()
    {
        if ($_SESSION['user']['profile'] == 'admin') {
            $employee = new Employee();
            echo json_encode($employee->getAllActive());
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }

    public function jqCompaniesAction()
    {
        if ($_SESSION['user']['profile'] == 'admin') {
            $company = new Company();
            echo json_encode($company->getAllActive());
        } else {
            header('Location: ' . DIRBASEURL . "/home");
        }
    }
}
