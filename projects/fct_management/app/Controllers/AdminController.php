<?php

namespace App\Controllers;

use App\Models\Company;

require_once('..\app\Config\constantes.php');
require_once('..\require\cif_validation.php');

class AdminController extends BaseController
{

    public function addCompanyAction()
    {
        if (isset($_POST['add_new_company'])) {
            $data = array();
            $company = Company::getInstancia();

            function clearData($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            };

            //Name validation
            if (empty($_POST["c_name"])) {
                $data['nameError'] = "El nombre es obligatorio";
            } elseif (!preg_match("/^[a-zA-Z-'üñÜÑ ]*$/", clearData($_POST["c_name"]))) {
                $data['nameError'] = "Solo letras y espacios en blanco.";
            } else {
                $company->setName(clearData($_POST["c_name"]));
                $data['c_name'] = clearData($_POST["c_name"]);
            }

            //Cif validation
            if (empty($_POST["c_cif"])) {
                $data['cifError'] = "El CIF es obligatorio";
            } elseif (cif_validation(clearData($_POST["c_cif"])) != 1) {
                $data['cifError'] = "El CIF no es válido";
                $data['c_cif'] = clearData($_POST["c_cif"]);
            } else {
                $company->setCif(clearData($_POST["c_cif"]));
                $data['c_cif'] = clearData($_POST["c_cif"]);
            }

            //Addres validation
            if (empty($_POST["c_address"])) {
                $data['addressError'] = "La dirección es obligatoria";
            } else {
                $company->setAddress(clearData($_POST["c_address"]));
                $data['c_address'] = clearData($_POST["c_address"]);
            }

            //Phone validation
            if (empty($_POST["c_phone"])) {
                $data['phoneError'] = "El teléfono es obligatorio";
            } elseif (!preg_match("/^[0-9]{9}$/", clearData($_POST["c_phone"]))) {
                $data['phoneError'] = "El teléfono no es válido";
                $data['c_phone'] = clearData($_POST["c_phone"]);
            } else {
                $company->setPhone(clearData($_POST["c_phone"]));
                $data['c_phone'] = clearData($_POST["c_phone"]);
            }

            //Email validation
            if (empty($_POST["c_email"])) {
                $data['emailError'] = "El email es obligatorio";
            } elseif (!filter_var(clearData($_POST["c_email"]), FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = "El email no es válido";
                $data['c_email'] = clearData($_POST["c_email"]);
            } else {
                $company->setEmail(clearData($_POST["c_email"]));
                $data['c_email'] = clearData($_POST["c_email"]);
            }

            $this->renderHTML('../view/companies_add.php', $data);
        } else {
            $this->renderHTML('../view/companies_add.php');
        }
    }

    public function adminAction()
    {
        $data = array();

        //Shows last 5 companies
        $company = Company::getInstancia();
        $data['lastCompanies'] = $company->getSome();

        $this->renderHTML('../view/companies_view.php', $data);
    }

    public function logoutAction()
    {
        //Close session and redirect to home
        unset($_SESSION);
        session_destroy();
        header('Location:' . DIRBASEURL . '/home');
    }
}
