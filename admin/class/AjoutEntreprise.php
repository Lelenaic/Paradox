<?hh

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
class AjoutEntreprise {
    private $_denomination;
    private $_mail;
    private $_rue;
    private $_cp;
    private $_ville;
    private $_categorie;
    private $_contact;
    private $_tel;

    public function messages(){
        if (isset($_GET['existant'])) {
            return '<div class="alert alert-danger" role="alert">Une entreprise utilise déjà cet e-mail !</div>';
        }
    }

    public function afficherFormulaire(){
        $form = '<form method="POST" action="./ajouter_entreprise">
                <div class="form-group">
                    <label>Dénomination</label>
                    <input class="form-control" type="text" name="newDenomination" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="newMail" required>
                </div>
                <div class="form-group">
                    <label>Rue</label>
                    <input class="form-control" type="text" name="newRue" required>
                </div>
                <div class="form-group">
                    <label>Code postal</label>
                    <input class="form-control" type="text" name="newCp" required>
                </div>
                <div class="form-group">
                    <label>Ville</label>
                    <input class="form-control" type="text" name="newVille" required>
                </div>
                <div class="form-group">
                    <label>Numéro de téléphone</label>
                    <input class="form-control" type="text" name="newTel" required>
                </div>
                <div class="form-group">
                    <label>Nom du contact</label>
                    <input class="form-control" type="text" name="newContact" required>
                </div>
                <div class="form-group">
                    <label>Activité :</label>
                    '.$this->getCategories().'
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
                </form>';
        return $form;
    }

    private function getCategories() {
        $cates = Database::query('select id,nom from categoriesEntreprises');
        $html = '<select name="newCategorie" class="form-control">';
        foreach ($cates as $cate) {
            $html.='<option value="' . $cate[0] . '">' . $cate[1] . '</option>';
        }
        $html.='</select>';
        return $html;
    }

    private function setAtt(){
        $this->_mail=$_POST['newMail'];
        $this->_denomination=$_POST['newDenomination'];
        $this->_rue=$_POST['newRue'];
        $this->_cp=$_POST['newCp'];
        $this->_ville=$_POST['newVille'];
        $this->_categorie=$_POST['newCategorie'];
        $this->_contact=$_POST['newContact'];
        $this->_tel=$_POST['newTel'];
    }

    public function doInsert($page){
        if (isset($_POST['newDenomination']) && $page=='ajouter_entreprise') {
            $this->setAtt();
            Database::exec('insert into entreprises (denomination,mail,rue,cp,ville,tel,contact,categorie_id,valide) values (\''.$this->_denomination.'\',\''.$this->_mail.'\',\''.$this->_rue.'\',\''.$this->_cp.'\',\''.$this->_ville.'\',\''.$this->_tel.'\',\''.$this->_contact.'\',\''.$this->_categorie.'\',\'1\')');
            $message='<p style="font-size:12px; font-family:Helvetica,Arial,sans-serif">Bonjour {USERNAME},</p>
                                                                <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Vous avez été inscrit sur '._NOM_.'</p>
                                                                <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Vos identifiants vous sont donc communiqués ci-dessous<br>
                                                                    Lien du site : '._URL_.'<br>
                                                                    Votre e-mail : <br>
                                                                    Votre mot de passe : <br><br><br>
                                                                    Cordialement,<br>
                                                                    '._NOM_.'
                                                                </p>';
            $mail=new Mail($this->_mail,'Nouveau compte utilisateur',$message);
            //$mail->creerMail();
            header('location: ./entreprises?ajoutOk');
        }
    }
}
