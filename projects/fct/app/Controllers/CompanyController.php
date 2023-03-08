<?php

namespace App\Controllers;

require_once '../app/Config/constantes.php';
require_once '../utils/my_utils.php';
require_once '../utils/validations.php';


use App\Models\Company;
use App\Models\Employee;
use App\Models\Student;


class CompanyController extends BaseController
{
    public function companyProfileAction($request)
    {
        if ($_SESSION['user']['status'] == 'login') {

            $data = array();
            $rest = explode("/", $request);
            $id = (int)end($rest);
            $company = Company::getInstancia();
            $company->setId($id);

            foreach ($company->getById() as $value) {
                $data['company_name'] = $value['name'];
                $data['company_id'] = $value['id'];
                $data['company_logo'] = $value['logo'];
            }

            if (isset($_POST['btn_add_employee'])) {
                # code...
            } else {
                $employee = Employee::getInstancia();
                $student = Student::getInstancia();
                $employee->setCompany_id_fk($id);

                if ($employee->getAllActiveByCompanyId() != null) {
                    foreach ($employee->getAllActiveByCompanyId() as $value) {
                        $employeeData = $value;
                        if ($value['id']) {
                            $employee->setId($value['id']);
                            $assignmentId = $employee->getAssigmentIdByEmployeeId();
                            $employeeData['id_student'] = (!empty($assignmentId)) ? $assignmentId[0]['id_student'] : '';
                            $employeeData['assignment_id'] = (!empty($assignmentId)) ? $assignmentId[0]['id'] : '';
                            if (!empty($assignmentId)) {
                                $student->setId($assignmentId[0]['id_student']);
                                $studentData = $student->getById();
                                $employeeData['name_student'] = (!empty($studentData)) ? $studentData[0]['name']. ' ' .$studentData[0]['surnames']: '';
                            } else {
                                $employeeData['name_student'] = '';
                            }
                        } else {
                            $employeeData['id_student'] = '';
                            $employeeData['name_student'] = '';
                            $employeeData['assignment_id'] = '';
                        }
                        $data['table_employees'][] = $employeeData;
                    }
                } else {
                    echo "<script>alert(Esta empresa no tiene empleados activos)</script>";
                    $this->renderHTML('../view/companies.php', $data);
                    die();
                }
                $this->renderHTML('../view/profile_company.php', $data);
            }
        } else {
            $this->renderHTML('../view/home.php',);
        }
    }
    public function createCompanyAction()
    {
        $data = array();

        if (isset($_POST['btn_create_company'])) {

            if (emptyInput(clearData($_POST['name']), 'Nombre')) {
                $this->renderHTML('../view/create_company.php', $data);
                die();
            } else {
                $data['company']['name'] = clearData($_POST['name']);
            }

            if (emptyInput(clearData($_POST['phone']), 'Teléfono')) {
                $this->renderHTML('../view/create_company.php', $data);
                die();
            } else if (!validatePhone(clearData($_POST['phone']))) {
                $this->renderHTML('../view/create_company.php', $data);
                die();
            } else {
                $data['company']['phone'] = clearData($_POST['phone']);
            }

            if (emptyInput(clearData($_POST['email']), 'Email')) {
                $this->renderHTML('../view/create_company.php', $data);
                die();
            } else if (!validateEmail(clearData($_POST['email']))) {
                $this->renderHTML('../view/create_company.php', $data);
                die();
            } else {
                $data['company']['email'] = clearData($_POST['email']);
            }

            if (!empty(clearData($_POST['address']))) {
                $data['company']['address'] = clearData($_POST['address']);
            } else {
                $data['company']['address'] = '';
            }

            if (emptyInput(clearData($_POST['cif']), 'CIF')) {
                $this->renderHTML('../view/create_company.php', $data);
                die();
            } else if (!validateCif(clearData($_POST['cif']))) {
                $this->renderHTML('../view/create_company.php', $data);
                die();
            } else {
                $data['company']['address2'] = clearData($_POST['cif']);
                $data['company']['cif'] = clearData($_POST['cif']);
            }


            if (!empty(clearData($_POST['description']))) {
                $data['company']['description'] = clearData($_POST['description']);
            } else {
                $data['company']['description'] = '';
            }

            //Check if company exists
            $company = Company::getInstancia();
            $company->setCif($data['company']['cif']);

            var_dump(count($company->existingCif()));

            if ($company->existingCif() == null) {
                print_r($company->existingCif());
                $company->setName($data['company']['name']);
                $company->setCif($data['company']['cif']);
                $company->setDescription($data['company']['description']);
                $company->setAddress($data['company']['address']);
                $company->setEmail($data['company']['email']);
                $company->setPhone($data['company']['phone']);
                $company->setStatus_fk('alta');
                $company->setCreated_at(date('Y-m-d H:i:s'));
                $company->setUpdated_at(date('Y-m-d H:i:s'));
                $company->set();

                //Insert logo
                //Get last company id
                $lastCompany = $company->lastInsert();

                $lastCompanyId = $lastCompany[0]['id'];
                $company->setId($lastCompanyId);

                //Insert logo after company is saved and use the company id as the name of the file
                if (file_exists($_FILES['logo']['tmp_name']) || is_uploaded_file($_FILES['logo']['tmp_name'])) {
                    //Logo name is the company id
                    $logoId = $lastCompanyId;

                    //Get logo extension
                    $pieces = explode(".", $_FILES['logo']['name']);
                    $logoExtension = $pieces[1];

                    //Complete logo name
                    $_FILES["logo"]["name"] = $logoId . "." . $logoExtension;
                    $target_dir = "../assets/img/logos/";
                    $uploadOk = 1;
                    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    if (isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["logo"]["tmp_name"]);
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

                    if ($_FILES["c_logo"]["size"] > 500000) {
                        $data['logoError'] = "El archivo es demasiado pesado.";
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "jfif"
                    ) {
                        $data['logoError'] = "Sólo se admiten los siguientes formatos: JPG, JPEG, PNG & JFIF.";
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        $data['logoError'] = "No se ha subido el archivo.";


                        // if everything is ok, try to upload file
                    } else {
                        //When save in the database, the name of the logo is the same as the id of de company
                        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
                            $data['logoError'] = "El archivo " . htmlspecialchars(basename($_FILES["logo"]["name"])) . " ha sido subido.";
                            $company->setLogo($_FILES['logo']['name']);
                            $company->insertLogo();
                        } else {
                            $data['logoError'] = "Ha ocurrido un error al subir el archivo.";
                        }
                    }
                } else {
                    $company->setLogo("unknown.png");
                    $company->insertLogo();
                }
                echo "<script>alert('Empresa creada correctamente.');</script>";
                header('Location: ' . DIRBASEURL . "/companies");
            } else {
                echo "<script>alert('La empresa ya existe.');</script>";
                $this->renderHTML('../view/create_company.php', $data);
                die();
            }
        } else {
            $this->renderHTML('../view/create_company.php', $data);
        }
    }
    public function companiesaction()
    {

        if ($_SESSION['user']['status'] == 'login') {

            $data = array();

            if (isset($_POST['btn_create_company'])) {
                header('Location: ' . DIRBASEURL . "/companies/create_company");
            } else { //By default
                $company = Company::getInstancia();
                $data['table_companies'] = $company->getAllActive();

                if ($company->getAllActive() != null) { //Show companies

                    if ($company->getAllActive() <= 5) { //Control the number of companies to show
                        $data['table_companies'] = $company->getAllActive();
                    } else {
                        $data['table_companies'] = array_slice($company->getAllActive(), 0, 5);
                    }
                } else {
                    echo "<script>alert('No hay empresas registradas.');</script>";
                }

                $this->renderHTML('../view/companies.php', $data);
            }
        } else {
            $this->renderHTML('../view/home.php');
        }
    }
}
