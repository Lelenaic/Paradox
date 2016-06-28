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
class AjoutCategories {

    private $_data;

    public function messages() {
        if (isset($_GET['existant'])) {
            return '<div class="alert alert-danger" role="alert">Cette catégorie existe déjà !</div>';
        }
    }

    public function afficherFormulaire() {
        $form = '<form method="POST" action="./ajouter_categorie">
                <div class="form-group">
                    <label>Nom :</label>
                    <input class="form-control" type="text" name="newCate" required>
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
                </form>';
        return $form;
    }

    private function exist($nom) {
        $verif = Database::query('select id from categoriesEntreprises where nom=\'' . $nom . '\'');
        if (isset($verif[0][0])) {
            header('location: ajouter_categorie?existant');
            die;
        }
    }

    public function doInsert($page) {
        if (isset($_POST['newCate']) && $page == 'ajouter_categorie') {
            $cate = $_POST['newCate'];
            $this->exist($cate);
            Database::exec('insert into categoriesEntreprises (nom) values (\'' . $cate . '\')');
            header('location: ./categories?ajoutOk');
        }
    }

}
