<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ajoutUser
 *
 * @author lelenaic
 */
class AjoutUser {

    private $_nom;
    private $_prenom;
    private $_mail;
    private $_mdp;
    private $_type;

    public function messages() {
        if (isset($_GET['existant'])) {
            return '<div class="alert alert-danger" role="alert">Un utilisateur utilise déjà cet e-mail !</div>';
        }
    }

    public function afficherFormulaire() {
        $form = '<form method="POST" action="./ajouter_utilisateur">
                <div class="form-group">
                    <label>Nom</label>
                    <input class="form-control" type="text" name="newNom" required>
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input class="form-control" type="text" name="newPrenom" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="newMail" required>
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input class="form-control" type="text" value="Généré automatiquement" readonly>
                </div>
                <div class="form-group">
                    <label>Type :</label>
                    <select name="newType" class="form-control">
                        <option value="eleves">Elève</option>
                        <option value="profs">Professeur</option>
                        <option value="stages">Entreprise</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
                </form>';
        return $form;
    }

    private function setAtt() {
        $this->_mail = $_POST['newMail'];
        $this->_nom = $_POST['newNom'];
        $this->_prenom = $_POST['newPrenom'];
        $this->_type = $_POST['newType'];
        $this->_mdp = bin2hex(random_bytes(10));
    }

    private function verifMail() {
        $verif = Database::query('select mail from ' . $this->_type . ' where mail=\'' . $this->_mail . '\'');
        if (isset($verif[0][0])) {
            header('location: ./ajouter_utilisateur?existant');
            die;
        }
    }

    public function doInsert($page) {
        if (isset($_POST['newNom']) and $page == 'ajouter_utilisateur') {
            $this->setAtt();
            $this->verifMail();
            Database::exec('insert into ' . $this->_type . ' (nom,prenom,mail,mdp) values (\'' . $this->_nom . '\',\'' . $this->_prenom . '\',\'' . $this->_mail . '\',\'' . password_hash($this->_mdp, PASSWORD_DEFAULT) . '\')');
            $body = '<p style="font-size:12px; font-family:Helvetica,Arial,sans-serif">Bonjour ' . $this->_prenom . ',</p>
                                                                <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Vous avez été inscrit sur ' . _NOM_ . '</p>
                                                                <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Vos identifiants vous sont donc communiqués ci-dessous<br>
                                                                    Lien du site : <a href="' . _URL_ . '" target="_blank">' . _URL_ . '</a><br>
                                                                    Votre e-mail : ' . $this->_mail . '<br>
                                                                    Votre mot de passe : ' . $this->_mdp . '<br><br><br>
                                                                    Cordialement,<br>
                                                                    ' . _NOM_ . '
                                                                </p>';
            $mail = new Mail($this->_mail, 'Nouveau compte utilisateur', $body);
            $mail->creerMail();
            if ($this->_type == 'eleves') {
                self::initDossier($this->_mail);
            }
            header('location: ./utilisateurs?type=' . $this->_type . '&ajoutOk');
        }
    }

    public static function initDossier($mail) {
        $id = Database::query('select id from eleves where mail=\'' . $mail . '\'');
        mkdir('../../html/files/' . $id[0][0]);
    }

}
