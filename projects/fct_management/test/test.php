<?php
//date('Y-m-d H:i:s')
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Company;

$c1 = Company::getInstancia();

// Get companies list
$companiesList = $c1->get();
// foreach ($companiesList as $key => $item) {
    //     foreach ($item as $key2 => $value) {
        //         print_r($value);
        //         print_r(' --- ');
        //     }
        //     print_r('</br></br>');
        // }
        
        // Get company by id
        // $c1->setId(4);
        // print_r($c1->getById());
        
        
//Create a company
// $c2 = Company::getInstancia();
// $c2->setCif('B-12345678');
// $c2->setName('Company 2');
// $c2->setDescription('Company 2 description');
// $c2->setAddress('Address 2');
// $c2->setEmail('rmail2@gmail.com');
// $c2->setPhone(957123456);
// $c2->setLogo('logo.png');
// $c2->setCreatedAt(date('Y-m-d H:i:s'));
// $c2->setUpdatedAt(date('Y-m-d H:i:s'));
// if ($c2->set()) {
//     print_r('Empresa creada');
// } else {
//     print_r('Empresa no creada');
// }

//Delete a company
// $c3 = Company::getInstancia();
// $c3->setId();
// if(($c3->delete()) == Array()){
//     print_r('Empresa eliminada');
// } else {
//     print_r('Empresa no eliminada');
// }

//Edit a company
$c2 = Company::getInstancia();
$c2->setId(8);
$c2->setCif('B-12345678');
$c2->setName('Compañía Editada');
$c2->setDescription('Descripción 4');
$c2->setAddress('Address 4');
$c2->setEmail('rmail2@gmail.com');
$c2->setPhone(957123456);
$c2->setLogo('logo.png');




