<?php
session_start();
//require '../random_compat/lib/random.php';
include '../includes/options.php';
require '../PHPMailer/PHPMailerAutoload.php';
require '../class/autoloader.php'; 
Autoloader::register(); 
require '../admin/class/Database.php';
require '../admin/class/Security.php';
$security=new Security();
$security->loginValidity();
$guard=new ParaGuard();
$guard->doLogin($page);
$user=new User();
$user->doLogin($page);
$pages=array('login','test','recovery','guard');
Utilitaires::logout();
$files=new BookPro();
$files->doDelete();
$files->getFile();
$files->doFolder();
$files->doMove();
$article=new Article();
$article->setId($page);
$article->doComment($page);
$article->doDelete($page);
$ajoutStage=new AjoutStage();
$ajoutStage->doInsert($page);
$profil=new Profil();
$profil->doEdit($page);
if (!in_array($page, $pages)) {
    include '../includes/header.php';
    include '../pages/'.$page.'.php';
    include '../includes/footer.php';
}else{
    include '../pages/'.$page.'.php';
}
