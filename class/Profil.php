<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profil
 *
 * @author lelenaic
 */
class Profil {

    private $_nom;
    private $_prenom;
    private $_mail;
    private $_type;
    private $_guard;

    public function __construct() {
        if (isset($_SESSION['id'])) {
            $this->setData();
        }
    }

    private function setData() {
        $this->_type = Utilitaires::getUserType($_SESSION['userType'], true);
        $data = Database::query('select nom,prenom,mail,guard from ' . $this->_type . ' where id=' . $_SESSION['id']);
        $this->_nom = $data[0][0];
        $this->_prenom = $data[0][1];
        $this->_mail = $data[0][2];
        $this->_guard = $data[0][3];
    }

    public function getHeader() {
        return '<div class="media v-middle">
            <div class="media-left text-center">
                <a href="#"><img src="' . Utilitaires::img() . '" alt="people" class="img-circle width-80"/></a>
            </div>
            <div class="media-body">
                <h1 class="text-white text-display-1 margin-v-0">' . $this->_prenom . ' ' . $this->_nom . '</h1>
            </div>
            <div class="media-right">
                <span class="label bg-blue-500">' . Utilitaires::getUserType($_SESSION['userType']) . '</span>
            </div>
        </div>';
    }

    public function doEdit($page) {
        if ($page == 'profil') {
            if (isset($_POST['nom']) or isset($_POST['mail']) or isset($_POST['mdp']) or isset($_FILES['photo'])) {
                if ($_SESSION['userType'] != 0) {
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $mail = $_POST['mail'];
                    Database::exec('update ' . $this->_type . ' set nom=\'' . $nom . '\',prenom=\'' . $prenom . '\',mail=\'' . $mail . '\' where id=' . $_SESSION['id']);
                }
                if ($_FILES['photo']['name'] != '') {
                    $this->editPhoto();
                }

                if (isset($_POST['mdp']) and $_POST['mdp']!='') {
                    $this->editMdp();
                }
                header('location: profil?maj');
                die;
            }

            if (isset($_GET['guard'])) {
                Database::exec('update ' . $this->_type . ' set guard=(1-guard) where id=' . $_SESSION['id']);
                header('location: profil?majGuard');
                die;
            }
        }
    }

    private function editPhoto() {
        if ($_FILES['photo']['error']) {
            switch ($_FILES['photo']['error']) {
                case 1: // UPLOAD_ERR_INI_SIZE     
                    echo"Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";
                    break;
                case 2: // UPLOAD_ERR_FORM_SIZE     
                    echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !";
                    break;
                case 3: // UPLOAD_ERR_PARTIAL     
                    echo "L'envoi du fichier a été interrompu pendant le transfert !";
                    break;
                case 4: // UPLOAD_ERR_NO_FILE     
                    echo "Le fichier que vous avez envoyé a une taille nulle !";
                    break;
            }
        } else {
            if ((isset($_FILES['photo']['tmp_name']) and ( $_FILES['photo']['error'] == 0))) {
                $ext = substr($_FILES['photo']['name'], -4, 4);
                $nom = Utilitaires::removeAccents(strtolower($this->_nom . $this->_prenom . $ext));
                $chemin_destination = '../admin/html/images/users/';
                $img = Database::query('select img from ' . $this->_type . ' where id=' . $_SESSION['id']);
                unlink('../admin/html/images/users/' . $img[0][0]);
                move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_destination . $nom);
                chmod($chemin_destination . $nom, 0664);
                Database::exec('update ' . $this->_type . ' set img=\'' . $nom . '\' where id=' . $_SESSION['id']);
            }
        }
    }

    public function messages() {
        if (isset($_GET['maj'])) {
            return '<div class="alert alert-success" role="alert">Votre profil a été mis à jour avec succès !</div>';
        } elseif (isset($_GET['notSame'])) {
            return '<div class="alert alert-danger" role="alert">Les deux mots de passe de correspondent pas !</div>';
        } elseif (isset($_GET['majGuard'])) {
            return '<div class="alert alert-success" role="alert">ParaGuard a correctement été mis à jour !</div>';
        }
    }

    private function editMdp() {
        $mdp = $_POST['mdp'];
        $conf = $_POST['conf'];
        if ($mdp != $conf) {
            header('location: profil?notSame');
            die;
        } else {
            Database::exec('update ' . $this->_type . ' set mdp=\'' . password_hash($mdp, PASSWORD_DEFAULT) . '\' where id=' . $_SESSION['id']);
        }
    }

    public function afficherFormulaire() {
        $guard = $this->_guard ? '<a href="./profil?guard"><button type="button" class="btn btn-success"><i class="fa fa-check-circle"></i> Actif</button></a>' : '<a href="./profil?guard"><button type="button" class="btn btn-danger"><i class="fa fa-exclamation"></i> Inactif</button></a>';
        $dis = $_SESSION['userType'] == 0 ? 'disabled' : '';
        return '<form class="form-horizontal" method="post" action="profil" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Avatar</label>
                                    <div class="col-md-6">
                                        <div class="media v-middle">
                                            <div class="media-left">
                                                <div class="icon-block width-100">
                                                    <img width="100%" height="100%" src="' . Utilitaires::img() . '">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <input type="file" class="btn btn-white btn-sm paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated name="photo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-md-2 control-label">Nom complet</label>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-control-material static">
                                                    <input type="text" class="form-control" id="exampleInputFirstName" value="' . $this->_prenom . '" placeholder="Votre prénom" name="prenom" required ' . $dis . '>
                                                    <label for="exampleInputFirstName">Prénom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-control-material static">
                                                    <input type="text" class="form-control" id="exampleInputLastName" value="' . $this->_nom . '" placeholder="Votre nom" name="nom" required ' . $dis . '>
                                                    <label for="exampleInputLastName">Nom</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-md-2 control-label">E-mail</label>
                                    <div class="col-md-6">
                                        <div class="form-control-material static">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input type="email" class="form-control" id="inputEmail3" value="' . $this->_mail . '" placeholder="Votre e-mail" name="mail" required ' . $dis . '>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-md-2 control-label">Changer de mot de passe</label>
                                    <div class="col-md-6">
                                        <div class="form-control-material static">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Nouveau mot de passe" name="mdp">
                                            <label for="inputPassword3">Nouveau mot de passe</label>
                                        </div>
                                        <div class="form-control-material static" style="margin-top:20px;">
                                            <input type="password" class="form-control" id="inputPassword4" placeholder="Nouveau mot de passe" name="conf">
                                            <label for="inputPassword4">Répétez votre nouveau mot de passe</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-md-2 control-label">ParaGuard</label>
                                    <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-shield"></i></span>
                                                ' . $guard . '
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group margin-none">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn btn-primary paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Sauvegarder</button>
                                    </div>
                                </div>
                            </form>';
    }

}
