<?php

namespace App\Controllers;


use App\Models\Company;
use App\Models\Validation;
use App\Models\Employee;

require_once('..\app\Config\constantes.php');

//Alert if has received ajax petition from view\company_info.php
if (isset($_POST['ajax'])) {
    print('ajax');
} else {
    print('no ajax');
}

class AdminController extends BaseController
{

    //Add new company
    public function companyAddAction()
    {
        $data = array();
        $data['mode'] = "Alta empresa";
        $company = Company::getInstancia();

        function clearData($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        };

        if (isset($_POST["add_new_company"])) {
            print('ha llegado');
        }

        // if (isset($_POST['new_company_jquery'])) {
        //     $data['new_company_jquery'] = $_POST['new_company_jquery'];
        // }

        // if (isset($_POST['add_new_company'])) {


        //     //Set company
        //     $company->setName($_POST[clearData('c_name')]);
        //     $company->setCif($_POST[clearData('c_cif')]);
        //     $company->setAddress($_POST[clearData('c_address')]);
        //     $company->setPhone($_POST[clearData('c_phone')]);
        //     $company->setEmail($_POST[clearData('c_email')]);

        //     //In case, set description
        //     if (isset($_POST['c_description'])) {
        //         $company->setDescription($_POST['c_description']);
        //     } else {
        //         $company->setDescription("");
        //     }

        //     //Save company
        //     $company->setCreatedAt(date('Y-m-d H:i:s'));
        //     $company->setUpdatedAt(date('Y-m-d H:i:s'));
        //     $company->set();
        //     $data['newCompany'] = $_POST['c_name'];

        //     //Get last company id
        //     $lastCompany = $company->lastInsert();
        //     $lastCompanyId = $lastCompany[0]['c_id'];
        //     $company->setId($lastCompanyId);

        //     //Insert logo after company is saved and use the company id as the name of the file
        //     if (file_exists($_FILES['c_logo']['tmp_name']) || is_uploaded_file($_FILES['c_logo']['tmp_name'])) {
        //         //Logo name is the company id
        //         $logoId = $lastCompanyId;

        //         //Get logo extension
        //         $pieces = explode(".", $_FILES['c_logo']['name']);
        //         $logoExtension = $pieces[1];

        //         //Complete logo name
        //         $_FILES["c_logo"]["name"] = $logoId . "." . $logoExtension;
        //         $target_dir = "../assets/img/logos/";
        //         $uploadOk = 1;
        //         $target_file = $target_dir . basename($_FILES["c_logo"]["name"]);
        //         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //         // Check if image file is a actual image or fake image
        //         if (isset($_POST["submit"])) {
        //             $check = getimagesize($_FILES["c_logo"]["tmp_name"]);
        //             if ($check !== false) {
        //                 $data['logoError'] = "El archivo es una imagen - " . $check["mime"] . ".";
        //                 $uploadOk = 1;
        //             } else {
        //                 $data['logoError'] = "El archivo no es una imagen.";
        //                 $uploadOk = 0;
        //             }
        //         }

        //         // Check if file already exists
        //         if (file_exists($target_file)) {
        //             $data['logoError'] = "El archivo ya existe.";
        //             $uploadOk = 0;
        //         }

        //         if ($_FILES["c_logo"]["size"] > 500000) {
        //             $data['logoError'] = "El archivo es demasiado pesado.";
        //             $uploadOk = 0;
        //         }

        //         // Allow certain file formats
        //         if (
        //             $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        //             && $imageFileType != "gif"
        //         ) {
        //             $data['logoError'] = "Sólo se admiten los siguientes formatos: JPG, JPEG, PNG & GIF.";
        //             $uploadOk = 0;
        //         }

        //         // Check if $uploadOk is set to 0 by an error
        //         if ($uploadOk == 0) {
        //             $data['logoError'] = "No se ha subido el archivo.";


        //             // if everything is ok, try to upload file
        //         } else {
        //             //When save in the database, the name of the logo is the same as the id of de company
        //             if (move_uploaded_file($_FILES["c_logo"]["tmp_name"], $target_file)) {
        //                 $data['logoError'] = "El archivo " . htmlspecialchars(basename($_FILES["c_logo"]["name"])) . " ha sido subido.";
        //                 $company->setLogo($_FILES['c_logo']['name']);
        //                 $company->insert_logo();
        //             } else {
        //                 $data['logoError'] = "Ha ocurrido un error al subir el archivo.";
        //             }
        //         }
        //     } else {
        //         $company->setLogo("unknown.png");
        //         $company->insert_logo();
        //     }

        //     //If employees are added, save them
        //     if (isset($_POST["e_name"])) {
        //         for ($i = 1; $i < count($_POST["e_name"]); $i++) {
        //             $employee = Employee::getInstancia();
        //             $employee->setName($_POST["e_name"][$i]);
        //             $employee->setNif($_POST["e_nif"][$i]);
        //             $employee->setJob($_POST["e_job"][$i]);
        //             $employee->setCreatedAt(date('Y-m-d H:i:s'));
        //             $employee->setUpdatedAt(date('Y-m-d H:i:s'));
        //             $employee->setCompanyId($lastCompanyId);
        //             $employee->set();
        //         }
        //     }
        // }

        $this->renderHTML('../view/company_info.php', $data);
    }
    public function employeeDeleteAction($request)
    {
        $data = array();
        $data['mode'] = "Elimina empleado";
        $this->renderHTML('../view/employee_info.php', $data);
    }

    public function employeeEditAction($request)
    {
        $data = array();
        $data['mode'] = "Edita empleado";
        $this->renderHTML('../view/employee_info.php', $data);
    }

    public function employeeAddAction($request)
    {
        $data = array();
        $data['mode'] = "Alta empleado";
        //$data['nameError'] = $data['nifError'] = $data['jobError']  = "Error";
        $data['nameError'] = $data['nifError'] = $data['jobError']  = "";


        $this->renderHTML('../view/employee_info.php', $data);
    }

    public function employeeAction()
    {
        $data = array();
        $employee = Employee::getInstancia();
        $employee2 = Employee::getInstancia();

        if (isset($_POST['search_employee_button']) && !empty($_POST['search_employee'])) {
            $employee->setName($_POST['search_employee']);
            $data['employeesList'] = $employee->getByName();
            $data['companiesNames'] = array();

            //Create an array with the companies names of the employees
            foreach ($data['employeesList'] as $key => $value) {
                $employee2->setId($value['emp_id']);
                array_push($data['companiesNames'], $employee2->getCompanyByEmployee());
            }


            $this->renderHTML('../view/employees_view.php', $data);
        } else {
            //Shows last 5 employees
            $data['employeesList'] = array();
            foreach ($employee->getSome() as $key => $value) {
                $employee2->setId($value['emp_id']);

                foreach ($employee2->getCompanyByEmployee() as $key => $value2) {
                    $row = array(
                        'emp_name' => $value['emp_name'],
                        'emp_job' => $value['emp_job'],
                        'emp_company_name' => $value2['c_name'],
                        'emp_id' => $value['emp_id']
                    );
                }
                //Array with the employees and the companies names
                array_push($data['employeesList'], $row);
            }
            $this->renderHTML('../view/employees_view.php', $data);
        }
    }

    public function companyDeleteAction($request)
    {
        $data = array();
        $company = Company::getInstancia();
        $rest = explode("/", $request);
        $companyId = (int)end($rest);
        $company->setId($companyId);
        $data['mode'] = 'Elimina empresa';
        $data['readonly'] = 'readonly';
        $data['c_id'] = $companyId;

        if (isset($_POST['delete_current_company'])) {
            $data['deleteCompany'] = $company->getName();
            $company->delete($companyId);
            $this->renderHTML('../view/companies_view.php', $data);
        } else { //Only show the form
            foreach ($company->getById() as $key => $value) {
                $data['c_name'] = $value['c_name'];
                $data['c_cif'] = $value['c_cif'];
                $data['c_address'] = $value['c_address'];
                $data['c_phone'] = $value['c_phone'];
                $data['c_email'] = $value['c_email'];
                $data['c_logo'] = $value['c_logo'];
                $data['c_description'] = $value['c_description'];
                $data['deleteCompany'] = $value['c_name'];
            }
            $this->renderHTML('../view/company_info.php', $data);
        }
    }

    public function companyEditAction($request)
    {
        $data = array();
        $company = Company::getInstancia();
        $rest = explode("/", $request);
        $companyId = (int)end($rest);
        $company->setId($companyId);
        $data['mode'] = 'Edita empresa';
        $data['c_id'] = $companyId;

        if (isset($_POST['edit_current_company'])) {
            $validation = Validation::getInstancia();

            function clearData($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            };

            $data['nameError'] = $data['cifError'] = $data['addressError'] = $data['phoneError'] = $data['emailError'] = "Error";

            //Name validation
            $data['c_name'] = clearData($_POST["c_name"]);
            $company->setName($_POST["c_name"]);

            if (!$data['nameError'] == "") {
                $data['nameError'] = $validation->validateName(clearData($_POST["c_name"]));
            }

            //Cif validation
            $data['c_cif'] = clearData($_POST["c_cif"]);
            $company->setCif($_POST['c_cif']);

            if (!$data['cifError'] == "") {
                $data['cifError'] = $validation->validateCif(clearData($_POST["c_cif"]));
            }

            //Address validation
            $data['c_address'] = clearData($_POST["c_address"]);
            $company->setAddress($_POST['c_address']);

            if (!$data['addressError'] == "") {
                $data['addressError'] = $validation->validateAddress(clearData($_POST["c_address"]));
            }

            //Phone validation
            $data['c_phone'] = clearData($_POST["c_phone"]);
            $company->setPhone($_POST['c_phone']);

            if (!$data['phoneError'] == "") {
                $data['phoneError'] = $validation->validatePhone(clearData($_POST["c_phone"]));
            }

            //Email validation
            $data['c_email'] = clearData($_POST["c_email"]);
            $company->setEmail($_POST['c_email']);

            if (!$data['emailError'] == "") {
                $data['emailError'] = $validation->validateEmail(clearData($_POST["c_email"]));
            }

            //Description validation
            $company->setDescription("");

            if (isset($data['c_description'])) {
                $data['c_description'] = clearData($_POST["c_description"]);
                $company->setDescription($_POST['c_description']);
            }

            //Logo upload

            $company->setLogo("unknown.png");
            if (isset($_FILES['c_logo'])) {
                $target_dir = "../assets/img/logos/";
                $target_file = $target_dir . basename($_FILES["c_logo"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["c_logo"]["tmp_name"]);
                    if ($check !== false) {
                        $data['logoError'] = "El archivo es una imagen - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        $data['logoError'] = "El archivo no es una imagen.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    $data['logoError'] = "El archivo ya existe.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["c_logo"]["size"] > 500000) {
                    $data['logoError'] = "El archivo es demasiado pesado.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $data['logoError'] = "Sólo se admiten los siguientes formatos: JPG, JPEG, PNG & GIF.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $data['logoError'] = "No se ha subido el archivo.";


                    // if everything is ok, try to upload file
                } else {
                    echo $target_file;
                    if (move_uploaded_file($_FILES["c_logo"]["tmp_name"], $target_file)) {
                        $data['logoError'] = "El archivo " . htmlspecialchars(basename($_FILES["c_logo"]["name"])) . " ha sido subido.";
                        $company->setLogo(basename($_FILES["c_logo"]["name"]));
                    } else {
                        $data['logoError'] = "Ha ocurrido un error al subir el archivo.";
                    }
                }
            }

            //If no errors, edit company
            if ($data['nameError'] == "" && $data['cifError'] == "" && $data['addressError'] == "" && $data['phoneError'] == "" && $data['emailError'] == "") {
                $company->setUpdatedAt(date('Y-m-d H:i:s'));
                $company->edit();
            }

            $this->renderHTML('../view/companies_view.php', $data);
        } else {
            //First time we load the page
            $company->setId($companyId);
            foreach ($company->getById() as $key => $value) {
                $data['c_name'] = $value['c_name'];
                $data['c_cif'] = $value['c_cif'];
                $data['c_address'] = $value['c_address'];
                $data['c_phone'] = $value['c_phone'];
                $data['c_email'] = $value['c_email'];
                $data['c_logo'] = $value['c_logo'];
                $data['c_description'] = $value['c_description'];
                $data['editCompany'] = $value['c_name'];
            }
            $this->renderHTML('../view/company_info.php', $data);
        }
    }

    public function companyProfileAction($request)
    {

        $data = array();
        $company = new Company();
        $rest = explode('/', $request);
        $companyId = (int)end($rest);
        $company->setId($companyId);
        $data['c_id'] = $companyId;

        foreach ($company->getById() as $key => $value) {
            $data['c_name'] = $value['c_name'];
            $data['c_cif'] = $value['c_cif'];
            $data['c_address'] = $value['c_address'];
            $data['c_phone'] = $value['c_phone'];
            $data['c_email'] = $value['c_email'];
            $data['c_logo'] = $value['c_logo'];
            $data['c_description'] = $value['c_description'];
        }


        $this->renderHTML('../view/company_profile.php', $data);
    }

    public function companyAction()
    {
        $data = array();
        $company = Company::getInstancia();

        if (isset($_POST['search_company_button']) && !empty($_POST['search_company'])) {
            $company->setName($_POST['search_company']);
            $data['companiesList'] = $company->getByName();
            $this->renderHTML('../view/companies_view.php', $data);
        } else {
            //Shows last 5 companies
            $data['companiesList'] = $company->getSome();
            $this->renderHTML('../view/companies_view.php', $data);
        }
    }

    public function logoutAction()
    {
        //Close session and redirect to home
        unset($_SESSION);
        session_destroy();
        header('Location:' . DIRBASEURL . '/home');
    }
}
