<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
date_default_timezone_set('Europe/Paris');
include ('../includes/options.php');
include ('../admin/class/Database.php');

// Début validité token changement mdp
$date=date('Y-m-d');
$tokens = Database::query('select id from passReset where date<=\''.$date.'\' and HOUR(heure)<='.(date('H')-2).' and MINUTE(heure)<='.date('i').' or date<\''.$date.'\'');

foreach ($tokens as $token){
    Database::exec('delete from passReset where id='.$token[0]);
}

// Fin validité token changement mdp

//Début suppression ParaGuard dépassé

$codes=Database::query('select id from guard where date<=\''.$date.'\' and HOUR(heure)<='.date('H').' and MINUTE(heure)<='.(date('i')-10).' or date<\''.$date.'\'');

foreach ($codes as $code){
    Database::exec('delete from guard where id='.$code[0]);
}