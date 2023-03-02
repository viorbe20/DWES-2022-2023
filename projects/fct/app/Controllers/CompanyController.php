<?php

namespace App\Controllers;

use App\Models\Company;
use App\Models\Employee;

require_once '../app/Config/constantes.php';
require_once '../../fct/utils/my_utils.php';

$_SESSION['currentAcademicYear'] = getCurrentAcademicYear();
$_SESSION['currentTerm'] = getCurrentTerm();

class CompanyController extends BaseController
{

    /**
     * Get id from url and delete the company
     */
    public function deleteCompanyAction($request)
    {
        $company = Company::getInstancia();
        $rest = explode("/", $request);
        $companyId = (int)end($rest);
        $company->setId($companyId);
        //$company->delete();
    }

    /**
     * Add a new company
     * data added with jquery on assets/js/companies.js
     */
    public function addCompanyAction()
    {
        $data = array();
        $company = Company::getInstancia();
        $c_validateInputs = false;
        $c_validateSpans = false;
        $c_validateEmail = false;
        $c_validatePhone = false;
        $c_validateCif = false;


        //Empty fields validation
        if (
            empty($_POST['c_name']) || empty($_POST['c_phone']) ||
            empty($_POST['c_email']) || empty($_POST['c_address']) ||
            empty($_POST['c_cif'])
        ) {
            error_log('AdminController::createCompanyAction() - Empty company field');
        } else {
            $c_validateInputs = true;
        }

        //Validate email
        if (!empty($_POST['c_email'])) {
            if (!filter_var($_POST['c_email'], FILTER_VALIDATE_EMAIL)) {
                error_log('AdminController::createCompanyAction() - Invalid company email');
            } else {
                $c_validateEmail = true;
            }
        }

        //Validate phone
        if (!empty($_POST['c_phone'])) {
            if (!preg_match("/^(\+34|0034|34)?[6789]\d{8}$/", $_POST['c_phone'])) {
                error_log('AdminController::createCompanyAction() - Invalid company phone');
            } else {
                $c_validatePhone = true;
            }
        }

        //Validate cif
        if (!empty($_POST['c_cif'])) {
            if (!preg_match("/^[ABCDEFGHJNPQRSUVW][\d]{7}[\dA-J]$/i", $_POST['c_cif'])) {
                error_log('AdminController::createCompanyAction() - Invalid company cif');
            } else {
                $c_validateCif = true;
            }
        }


        //Validate spans
        if (empty($_POST['c_name_span']) && empty($_POST['c_phone_span']) && empty($_POST['c_email_span']) && empty($_POST['c_address_span'])) {
            $c_validateSpans = true;
        } else {
            error_log('AdminController::createCompanyAction() - Error in company spans');
        }

        //If all validations are true, create company
        if ($c_validateInputs && $c_validateEmail && $c_validatePhone && $c_validateCif && $c_validateSpans) {

            //Check if company exists
            $company->setCif($_POST['c_cif']);

            if ($company->getByCif() != null) {
                echo "<script>alert('Ese CIF ya existe.');</script>";
                $this->renderHTML('../view/company_info.php', $data);
            } else {
                $company->setName($_POST[clearData('c_name')]);
                $company->setAddress($_POST[clearData('c_address')]);
                $company->setPhone($_POST[clearData('c_phone')]);
                $company->setEmail($_POST[clearData('c_email')]);

                //In case, set description
                if (isset($_POST['c_description'])) {
                    $company->setDescription($_POST['c_description']);
                } else {
                    $company->setDescription("");
                }

                //Save company
                $company->setCreatedAt(date('Y-m-d H:i:s'));
                $company->setUpdatedAt(date('Y-m-d H:i:s'));
                $company->set();


                //Get last company id
                $lastCompany = $company->lastInsert();
                $lastCompanyId = $lastCompany[0]['c_id'];
                $company->setId($lastCompanyId);

                //Insert logo after company is saved and use the company id as the name of the file
                if (file_exists($_FILES['c_logo']['tmp_name']) || is_uploaded_file($_FILES['c_logo']['tmp_name'])) {
                    //Logo name is the company id
                    $logoId = $lastCompanyId;

                    //Get logo extension
                    $pieces = explode(".", $_FILES['c_logo']['name']);
                    $logoExtension = $pieces[1];

                    //Complete logo name
                    $_FILES["c_logo"]["name"] = $logoId . "." . $logoExtension;
                    $target_dir = "../assets/img/logos/";
                    $uploadOk = 1;
                    $target_file = $target_dir . basename($_FILES["c_logo"]["name"]);
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
                        if (move_uploaded_file($_FILES["c_logo"]["tmp_name"], $target_file)) {
                            $data['logoError'] = "El archivo " . htmlspecialchars(basename($_FILES["c_logo"]["name"])) . " ha sido subido.";
                            $company->setLogo($_FILES['c_logo']['name']);
                            $company->insert_logo();
                        } else {
                            $data['logoError'] = "Ha ocurrido un error al subir el archivo.";
                        }
                    }
                } else {
                    $company->setLogo("unknown.png");
                    $company->insert_logo();
                }

                //Go to http://localhost/dwes/projects/fct/public/index.php/companies/company_employees/196
                header('Location: ' . DIRBASEURL . '/companies/company_employees/' . $lastCompanyId);
            }
        } else {
            $this->renderHTML('../view/company_info.php', $data);
        }
    }

        /**
     * Show employees from a selected company
     */
    public function companyEmployeesAction($request)
    {

        if ($_SESSION['user']['profile'] == 'guest') { //If the user is not logged in
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();
            $company = Company::getInstancia();
            $rest = explode("/", $request);
            $companyId = (int)end($rest);
            $company->setId($companyId);
            
            $employee = Employee::getInstancia();
            $employee->setCompanyId($companyId);
            $companyName = $company->getById();

            foreach ($company->getById() as $key => $value) {
                $companyName = $value['c_name'];
            }
            $data['companyName'] = $companyName;

            foreach ($employee->getEmployeesByCompanyId() as $key => $value) {
                $data['employees'][] = $value;
            }

            $this->renderHTML('../view/company_employees.php', $data);
        }
    }
    /**
     * Get all the employees given a company id
     */
    public function getEmployeesTableAction($request)
    {

        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();
            $company = Company::getInstancia();
            $rest = explode("/", $request);
            $companyId = (int)end($rest);
            $company->setId($companyId);
            echo json_encode($company->getAllEmployees());
        }
    }
    /**
     * Get all companies from dtabase
     */
    public function getCompaniesTableAction()
    {

        if ($_SESSION['user']['profile'] == 'guest') {
            $data = array();
            $this->renderHTML('../view/home.php', $data);
        } else {
            $data = array();
            $company = Company::getInstancia();
            echo json_encode($company->get());
        }
    }

    /**
     * Show companies view
     */
    public function companiesAction()
    {
        $data = array();
        $this->renderHTML('../view/companies.php', $data);
    }
}
