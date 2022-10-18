<?php

namespace App\Controllers;

use App\Models\Company;
use App\Models\Validation;

require_once('..\app\Config\constantes.php');
require_once('..\require\cif_validation.php');

class AdminController extends BaseController
{
    public function workerInfoAction()
    {
        $this->renderHTML('../view/worker_info.php');
    }

    public function companyInfoAction()
    {
        if (isset($_POST['add_new_company'])) {
            $data = array();
            $company = Company::getInstancia();
            $validation = Validation::getInstancia();

            function clearData($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            };

            //Name validation
            $data['nameError'] = $validation->validateName(clearData($_POST["c_name"]));
            if ($validation->validateName($_POST["c_name"]) == "") {
                $data['c_name'] = clearData($_POST["c_name"]);
                $company->setName(clearData($_POST["c_name"]));
            } 
                
            //Cif validation
            $data['cifError'] = $validation->validateCif(clearData($_POST["c_cif"]));
            if ($validation->validateCif($_POST["c_cif"]) == "") {
                $data['c_cif'] = clearData($_POST["c_cif"]);
                $company->setCif(clearData($_POST["c_cif"]));
            } 

            //Addres validation
            if (empty($_POST["c_address"])) {
                $data['addressError'] = "La dirección es obligatoria";
            } else {
                $company->setAddress(clearData($_POST["c_address"]));
                $data['c_address'] = clearData($_POST["c_address"]);
                $data['addressError'] = "";
            }

            //Phone validation
            $data['phoneError'] = $validation->validatePhone(clearData($_POST["c_phone"]));
            if ($validation->validatePhone($_POST["c_phone"]) == "") {
                $data['c_phone'] = clearData($_POST["c_phone"]);
                $company->setPhone(clearData($_POST["c_phone"]));
            } 

            //Email validation
            $data['emailError'] = $validation->validateEmail(clearData($_POST["c_email"]));
            if ($validation->validateEmail($_POST["c_email"]) == "") {
                $data['c_email'] = clearData($_POST["c_email"]);
                $company->setEmail(clearData($_POST["c_email"]));
            } 

            //Logo upload
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
                    } else {
                        $data['logoError'] = "Ha ocurrido un error al subir el archivo.";
                    }
                }
            }

            $this->renderHTML('../view/company_info.php', $data);
        } else {
            $this->renderHTML('../view/company_info.php');
        }
    }

    public function adminAction()
    {
        $data = array();
        $company = Company::getInstancia();

        if (isset($_POST['search_company_button']) && !empty($_POST['search_company'])) {
            $data['matchCompanies'] = $company->getByName($_POST['search_company']);
            $this->renderHTML('../view/companies_view.php', $data);    
        } else {
            //Shows last 5 companies
            $data['lastCompanies'] = $company->getSome();
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
