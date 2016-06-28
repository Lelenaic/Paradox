<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

/**
* Description of Security
*
* @author lelenaic
*/
class Security {


  public function __construct(){
    $this->isBanned();
    $this->verifIp();
  }
  
  public function verifIp(){
      if (isset($_SESSION['ip'])) {
          if ($_SERVER['REMOTE_ADDR'] != $_SESSION['ip']) {
              session_destroy();
              header('location: ./login?expired');
              die;
          }
      }
  }

  public function mustBeAdmin(){
    if ($_SESSION['admin']!=1) {
      Utilitaires::redirect('noPerms');
      die;
    }
  }

  public function loginValidity(){
    if (isset($_SESSION['id'])) {
      if ($_SERVER['REMOTE_ADDR']!=$_SESSION['ip']) {
        Utilitaires::logout();
      }
    }
  }

  public function isBanned(){
    $ip=$_SERVER['REMOTE_ADDR'];
    $date=date('Y-m-d');
    $verif=Database::query('select count(id) from preBans where ip=\''.$ip.'\' and date=\''.$date.'\'');
    $verif2=Database::query('select count(id) from bans where ip=\''.$ip.'\'');
    if ($verif[0][0]>=5 or $verif2[0][0]!=0) {
      header('location: ./admin/ban');
      die('Erreur ! Vous êtes banni');
    }
  }

  public function mustBeStudent(){
    if ($_SESSION['userType']!=0 or !isset($_SESSION['id'])) {
      Utilitaires::redirect('./admin/noPerms');
      die;
    }
  }

  public function mustBeTit($classe){
    if ($_SESSION['tit']!=$classe and $_SESSION['admin']!=1) {
      Utilitaires::redirect('noPerms');
      die;
    }
  }

  public static function addWarning($code){
    /*
    * Liste des codes :
    * BPP1 : URL frauduleux - book pro public, id nom numérique
    * BA1 : Tentative de suppression de commentaire d'un article sans être admin
    */
    $date=date('Y-m-d');
    $heure=date('H:i:s');
    $ip=$_SERVER['REMOTE_ADDR'];
    Database::exec('insert into preBans (date,heure,ip,code) values (\''.$date.'\',\''.$heure.'\',\''.$ip.'\',\''.$code.'\')');
  }
}
