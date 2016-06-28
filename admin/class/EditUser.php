<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EditUser
 *
 * @author lelenaic
 */

class EditUser {

    private $_id;
    private $_type;
    private $_data;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_classe;
    private $_admin;
    private $_mdp;
    private $_matiere;

    public function setAtt($page){
        if ($page=='editer_utilisateur') {
            $this->_id=isset($_GET['id']) ? $_GET['id']:$_POST['id'];
            $this->_type=isset($_GET['type']) ? $_GET['type']:$_POST['type'];
        }
    }

    public function afficherFormulaire() {
        if ($this->_type == 'eleves') {
            $requete = 'select mail,nom,prenom,classe_sigle from eleves where id=' . $this->_id;
        } elseif ($this->_type == 'profs') {
            $requete = 'select mail,nom,prenom,admin,matiere from profs where id=' . $this->_id;
        } elseif ($this->_type == 'entreprises') {
            $requete = 'select nom,prenom,mail from stages where id=' . $this->_id;
        }
        $data = Database::query($requete);
        $this->_data = $data[0];
        return $this->getForm();
    }

    private function getForm() {
        if ($this->_type == 'eleves') {
            $form = '<form method="POST" action="editer_utilisateur">
                <input type="text" name="id" value="' . $this->_id . '" hidden>
                <input type="text" name="type" value="' . $this->_type . '" hidden>
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" type="text" name="nom" value="' . $this->_data[1] . '" required>
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" type="text" name="prenom" value="' . $this->_data[2] . '" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="mail" value="' . $this->_data[0] . '" required>
                </div>
                <div class="form-group">
                    <label>Classe</label>
                    ' . $this->getClasses() . '
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input class="form-control" type="text" name="mdp" value="" placeholder="Laissez vide pour ne pas changer">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
                </form>';
        } elseif ($this->_type == 'profs') {
            $form = '<form method="POST" action="editer_utilisateur">
                <input type="text" name="id" value="' . $this->_id . '" hidden>
                <input type="text" name="type" value="' . $this->_type . '" hidden>
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" type="text" name="nom" value="' . $this->_data[1] . '" required>
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" type="text" name="prenom" value="' . $this->_data[2] . '" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="mail" value="' . $this->_data[0] . '" required>
                </div>
                <div class="form-group">
                    <label>Matière :</label>
                    <input class="form-control" type="text" name="matiere" value="' . $this->_data[4] . '" required>
                </div>
                ' . $this->formAdmin() . '
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input class="form-control" type="text" name="mdp" value="" placeholder="Laissez vide pour ne pas changer">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
                </form>';
        } elseif ($this->_type == 'entreprises') {
            $form = '<form method="POST" action="editer_utilisateur">
                <input type="text" name="id" value="' . $this->_id . '" hidden>
                <input type="text" name="type" value="' . $this->_type . '" hidden>
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" type="text" name="nom" value="' . $this->_data[0] . '" required>
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" type="text" name="prenom" value="' . $this->_data[1] . '" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="mail" value="' . $this->_data[2] . '" required>
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input class="form-control" type="text" name="mdp" value="" placeholder="Laissez vide pour ne pas changer">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
                </form>';
        }
        return $form;
    }

    private function getClasses() {
        $classes = Database::query('select sigle,nom from classes');
        $html = '<select name="classe" class="form-control">';
        foreach ($classes as $classe) {
            if ($this->_data[3] == $classe[0]) {
                $html.='<option value="' . $classe[0] . '" selected>' . $classe[1] . '</option>';
            } else {
                $html.='<option value="' . $classe[0] . '">' . $classe[1] . '</option>';
            }
        }
        $html.='</select>';
        return $html;
    }

    private function formAdmin() {
        if ($this->_data[3] == 1) {
            return '<div class="radio">
                        <label>
                            <input type="radio" name="admin" value="1" checked>
                            Administrateur
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="admin" value="0">
                            Utilisateur
                        </label>
                    </div>';
        }else{
            return '<div class="radio">
                        <label>
                            <input type="radio" name="admin" value="1">
                            Administrateur
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="admin" value="0" checked>
                            Utilisateur
                        </label>
                    </div>';
        }
    }

    public function doEdit(){
        if (isset($_POST['type'])) {
            $this->_nom=$_POST['nom'];
            $this->_prenom=$_POST['prenom'];
            $this->_mail=$_POST['mail'];
            $this->_mdp=$_POST['mdp']!='' ? password_hash($_POST['mdp'],PASSWORD_DEFAULT):null;
            if ($_POST['type']=='eleves') {
                $this->_classe=$_POST['classe'];
                if (is_null($this->_mdp)) {
                    Database::exec('update eleves set mail=\''.$this->_mail.'\',nom=\''.$this->_nom.'\',prenom=\''.$this->_prenom.'\',classe_sigle=\''.$this->_classe.'\' where id='.$this->_id);
                }else{
                    Database::exec('update eleves set mail=\''.$this->_mail.'\',nom=\''.$this->_nom.'\',prenom=\''.$this->_prenom.'\',classe_sigle=\''.$this->_classe.'\',mdp=\''.$this->_mdp.'\' where id='.$this->_id);
                }
                header('location: utilisateurs?type='.$this->_type.'&editOk');
            }elseif($_POST['type']=='profs'){
                $this->_admin=$_POST['admin'];
                $this->_matiere=$_POST['matiere'];
                if (is_null($this->_mdp)) {
                    Database::exec('update profs set mail=\''.$this->_mail.'\',nom=\''.$this->_nom.'\',prenom=\''.$this->_prenom.'\',matiere=\''.$this->_matiere.'\',admin=\''.$this->_admin.'\' where id='.$this->_id);
                }else{
                    Database::exec('update profs set mail=\''.$this->_mail.'\',nom=\''.$this->_nom.'\',prenom=\''.$this->_prenom.'\',matiere=\''.$this->_matiere.'\',admin=\''.$this->_admin.'\',mdp=\''.$this->_mdp.'\' where id='.$this->_id);
                }
                header('location: utilisateurs?type='.$this->_type.'&editOk');
            }else{
                if (is_null($this->_mdp)) {
                    Database::exec('update stages set mail=\''.$this->_mail.'\',nom=\''.$this->_nom.'\',prenom=\''.$this->_prenom.'\' where id='.$this->_id);
                }else{
                    Database::exec('update stages set mail=\''.$this->_mail.'\',nom=\''.$this->_nom.'\',prenom=\''.$this->_prenom.'\',mdp=\''.$this->_mdp.'\' where id='.$this->_id);
                }
                header('location: utilisateurs?type='.$this->_type.'&editOk');
            }
        }
    }
}
