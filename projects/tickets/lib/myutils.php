<?php

const TEAMS = array("Picapiedras", "Roedores", "Perezosos", "Invisibles", "Legendarios", "Magos", "Sultanes");
const TICKETS_PER_ZONE = 100;
const NUMBER_OF_ZONES = 4;


function getRatesPerTeam() {
    $rates = array();
    
    for ($i = 0; $i < count(TEAMS); $i++) {
        $rates[TEAMS[$i]] = 0;
    }
    
    return $rates;
}