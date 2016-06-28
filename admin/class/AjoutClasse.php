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
class AjoutClasse {

    public function messages() {
        if (isset($_GET['existant'])) {
            return '<div class="alert alert-danger" role="alert">Cette classe existe déjà !</div>';
        }
    }

    public function afficherFormulaire() {
        $form = '<form method="POST" action="./ajouter_classe">
                <div class="form-group">
                    <label>Sigle :</label>
                    <input class="form-control" type="text" name="newClasse" required>
                </div>
                <div class="form-group">
                    <label>Nom complet :</label>
                    <input class="form-control" type="text" name="nom" required>
                </div>
                <div class="form-group">
                    <label>Année :</label>
                    <select name="annee" class="form-control" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Professeur principal :</label>
                    ' . $this->getTit() . '
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
                </form>';
        return $form;
    }

    private function getTit() {
        $html = '<select name="tit" class="form-control" required>';
        $html.='<option value="none">Aucun</option>';
        $profs = Database::query('select id,nom,prenom from profs where isnull(tit)');
        foreach ($profs as $prof) {
            $html.='<option value="' . $prof[0] . '">' . $prof[2] . ' ' . $prof[1] . '</option>';
        }
        $html.='</select>';
        return $html;
    }

    private function exist($nom) {
        $verif = Database::query('select sigle from classes where sigle=\'' . $nom . '\'');
        if (isset($verif[0][0])) {
            header('location: ajouter_classe?existant');
            die;
        }
    }

    public function doInsert($page) {
        if (isset($_POST['newClasse']) && $page == 'ajouter_classe') {
            $classe = $_POST['newClasse'];
            $nom = $_POST['nom'];
            $annee = $_POST['annee'];
            $tit = $_POST['tit'];
            $this->exist($classe);
            Database::exec('insert into classes (sigle,nom,annee) values (\'' . $classe . '\',\'' . $nom . '\',\'' . $annee . '\')');
            if ($tit != 'none') {
                Database::exec('update profs set tit=\'' . $classe . '\' where id=' . $tit);
            }
            header('location: ./classes?ajoutOk');
            die;
        }
    }

}
