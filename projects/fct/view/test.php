<?php
use App\Models\Company;

$c = Company::getInstancia();
$c->setName('test');
$c->setCif('A25583684');
$c->setDescription('test');
$c->setAddress('test2');
$c->setEmail('vir@gmail.com
');
$c->setPhone('666666666');
$c->setLogo('666666666');
$c->setStatus_fk('alta');
$c->setCreated_at(date('Y-m-d H:i:s'));
$c->setUpdated_at(date('Y-m-d H:i:s'));
$c->set();
?>