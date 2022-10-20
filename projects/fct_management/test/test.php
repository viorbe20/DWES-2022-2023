<?php
//date('Y-m-d H:i:s')
// $c = Company::getInstancia();
// $id = $c->lastInsert();
// print_r($id[0]['c_id']);
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Company;
use App\Models\Employee;
$c = Company::getInstancia();
$company = Company::getInstancia();
$e = Employee::getInstancia();

$e->setId(1);
$e->getCompanyByEmployee();

?>
<form method="post" action="" enctype="multipart/form-data" id="form_add_company">
<legend>Logo</legend>
<input type="file" name="c_logo">
<span class="error"><?php if (isset($data['logoError'])) echo $data['logoError']; ?></span>
<input type="submit" value="Enviar" name="add_new_company" id="btn_add_company">
</form>
<?php

if (isset($_POST['add_new_company'])) {
    if (isset($_FILES['c_logo'])) {
    
        //Logo name is the company id
        $lastCompany = $company->lastInsert();
        $lastCompanyId = $lastCompany[0]['c_id'];
        $logoId = $lastCompanyId + 1;
        
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
                //When save in the database, the name of the logo is the same as the id of de company
            if (move_uploaded_file($_FILES["c_logo"]["tmp_name"], $target_file)) {
                $data['logoError'] = "El archivo " . htmlspecialchars(basename($_FILES["c_logo"]["name"])) . " ha sido subido.";
                $company->setLogo($_FILES['c_logo']['name']);
            } else {
                $company->setLogo("unknown.png");
                $data['logoError'] = "Ha ocurrido un error al subir el archivo.";
                
            }
        }
    } 

}
        




?>

