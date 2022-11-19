<?php
define('DIRBASE', '/dwes/projects/tickets/');
define('MEMBERS',80);
define('ROWS',10);
define('CAPACITY',400);
$teams = array("Picapiedras","Roedores","Perozosos","Invisibles","Legendarios",'Magos','Sultanes');

$zones = array( 
            array('zona'=>'A','primera_localidad'=>1,'ultima_localidad'=>100),
            array('zona'=>'B','primera_localidad'=>101,'ultima_localidad'=>200),
            array('zona'=>'C','primera_localidad'=>201,'ultima_localidad'=>300),
            array('zona'=>'D','primera_localidad'=>301,'ultima_localidad'=>400)
);

$rates = array(
    array('equipo'=>'Picapiedras', 'tarifas'=>array(
                                                array('zona'=>'A','precio'=>20),
                                                array('zona'=>'B','precio'=>15),
                                                array('zona'=>'C','precio'=>10),
                                                array('zona'=>'D','precio'=>5))),
    array('equipo'=>'Roedores', 'tarifas'=>array(
                                                array('zona'=>'A','precio'=>21),
                                                array('zona'=>'B','precio'=>16), 
                                                array('zona'=>'C','precio'=>16),
                                                array('zona'=>'D','precio'=>57))),
    array('equipo'=>'Perezosos', 'tarifas'=>array(
                                                array('zona'=>'A','precio'=>24),
                                                array('zona'=>'B','precio'=>12),
                                                array('zona'=>'C','precio'=>5),
                                                array('zona'=>'D','precio'=>6))),
    array('equipo'=>'Invisibles', 'tarifas'=>array(
                                                array('zona'=>'A','precio'=>20),
                                                array('zona'=>'B','precio'=>15),
                                                array('zona'=>'C','precio'=>10),
                                                array('zona'=>'D','precio'=>5))),
    array('equipo'=>'Legendarios', 'tarifas'=>array( 
                                                array('zona'=>'A','precio'=>20),
                                                array('zona'=>'B','precio'=>15),
                                                array('zona'=>'C','precio'=>10),
                                                array('zona'=>'D','precio'=>5))),
    array('equipo'=>'Magos', 'tarifas'=>array( 
                                                array('zona'=>'A','precio'=>20),
                                                array('zona'=>'B','precio'=>15),
                                                array('zona'=>'C','precio'=>27),
                                                array('zona'=>'D','precio'=>5))),
    array('equipo'=>'Sultanes', 'tarifas'=>array(
                                                array('zona'=>'A','precio'=>20),
                                                array('zona'=>'B','precio'=>15),
                                                array('zona'=>'C','precio'=>10),
                                                array('zona'=>'D','precio'=>5))));
