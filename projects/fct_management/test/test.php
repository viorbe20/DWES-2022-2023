<?php
//date('Y-m-d H:i:s')
// $c = Company::getInstancia();
// $id = $c->lastInsert();
// print_r($id[0]['c_id']);
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Company;
$c = Company::getInstancia();
$c->setName('m');
$c->getByName();
foreach ($c->getByName() as $key => $value) {
    echo $value['c_name'];
}

?>

<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title></title>
</head>

<body>
</body>
</html>