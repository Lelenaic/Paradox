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
class EditEntreprise {

    private $_id;
    private $_data;

    public function setAtt($page){
        if ($page=='editer_entreprise') {
            $this->_id=isset($_GET['id']) ? $_GET['id']:$_POST['id'];
        }
    }
    
    public function afficherFormulaire() {
        $requete = 'select denomination,mail,rue,cp,ville,tel,contact,categorie_id from entreprises where id=' . $this->_id;
        $data = Database::query($requete);
        $this->_data = $data[0];
        return $this->getForm();
    }

    private function getForm() {
        return '<form method="POST" action="editer_entreprise">
            <input type="text" name="id" value="' . $this->_id . '" hidden>
            <div class="form-group">
                <label>Denomination</label>
                <input class="form-control" type="text" name="denomination" value="' . $this->_data[0] . '">
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input class="form-control" type="email" name="mail" value="' . $this->_data[1] . '">
            </div>
            <div class="form-group">
                <label>Rue</label>
                <input class="form-control" type="text" name="rue" value="' . $this->_data[2] . '">
            </div>
            <div class="form-group">
                <label>Code postal</label>
                <input class="form-control" type="text" name="cp" value="' . $this->_data[3] . '">
            </div>
            <div class="form-group">
                <label>Ville</label>
                <input class="form-control" type="text" name="ville" value="' . $this->_data[4] . '">
            </div>
            <div class="form-group">
                <label>Numéro de téléphone</label>
                <input class="form-control" type="text" name="tel" value="' . $this->_data[5] . '">
            </div>
            <div class="form-group">
                <label>Contact</label>
                <input class="form-control" type="text" name="contact" value="' . $this->_data[6] . '">
            </div>
            <div class="form-group">
                <label>Activité</label>
                ' . $this->getCategories() . '
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
            </form>';
    }

    private function getCategories() {
        $cates = Database::query('select id,nom from categoriesEntreprises');
        $html = '<select name="categorie" class="form-control">';
        foreach ($cates as $cate) {
            if ($this->_data[7] == $cate[0]) {
                $html.='<option value="' . $cate[0] . '" selected>' . $cate[1] . '</option>';
            } else {
                $html.='<option value="' . $cate[0] . '">' . $cate[1] . '</option>';
            }
        }
        $html.='</select>';
        return $html;
    }
    
    public function doEdit(){
        if (isset($_POST['denomination'])) {
            $denomination=  addslashes($_POST['denomination']);
            $mail=addslashes($_POST['mail']);
            $rue=addslashes($_POST['rue']);
            $cp=$_POST['cp'];
            $ville=addslashes($_POST['ville']);
            $categorie=addslashes($_POST['categorie']);
            $tel=$_POST['tel'];
            $contact=addslashes($_POST['contact']);
            Database::exec('update entreprises set denomination=\''.$denomination.'\',mail=\''.$mail.'\',rue=\''.$rue.'\',cp=\''.$cp.'\',ville=\''.$ville.'\',categorie_id=\''.$categorie.'\',tel=\''.$tel.'\',contact=\''.$contact.'\' where id='.$this->_id);
            header('location: ./entreprises?editOk');
        }
    }
}