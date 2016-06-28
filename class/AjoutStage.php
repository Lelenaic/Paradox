<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjoutStage
 *
 * @author lelenaic
 */
class AjoutStage {

    public function afficherFormulaire() {
        $html = '<form action="stages-recherche-ajout" method="post">
                <div class="form-group">
                    <label>Entreprise :</label>
                    '.$this->getEntreprises().'
                </div>
                <div class="form-group form-control-material">
                    <input type="text" name="dateDebut" placeholder="JJ/MM/AAAA" class="form-control used" />
                    <label>Date de début du stage</label>
                </div>
                <div class="form-group form-control-material">
                    <input type="text" name="dateFin" placeholder="JJ/MM/AAAA" class="form-control used" />
                    <label>Date de fin du stage</label>
                </div>
                <div class="form-group form-control-material">
                    <input type="text" name="nomMaitre" placeholder="John" class="form-control used" />
                    <label>Nom du maître de stage</label>
                </div>
                <div class="form-group form-control-material">
                    <input type="text" name="prenomMaitre" placeholder="Doe" class="form-control used" />
                    <label>Prénom du maître de stage</label>
                </div>
                <div class="form-group form-control-material">
                    <input type="text" name="mailMaitre" placeholder="john.doe@entreprise.com" class="form-control used" />
                    <label>Mail du maître de stage</label>
                </div>
                <div class="form-group">
                    <label>Description du stage :</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-primary" value="Ajouter">
                </div>
               </form>';
        return $html;
    }

    private function getEntreprises() {
        $entreprises = Database::query('select id,denomination from entreprises where valide=1 order by 2');
        $html='<select class="form-control" name="entreprise">';
        foreach ($entreprises as $entreprise){
            $html.='<option value="'.$entreprise[0].'">'.$entreprise[1].'</option>';
        }
        $html.='</select>';
        return $html;
    }
    
    public function doInsert($page){
        if (isset($_POST['entreprise']) and $page=='stages-recherche-ajout') {
            $entreprise=$_POST['entreprise'];
            $dateDebut=$_POST['dateDebut']!='' ? '\''.Utilitaires::dateFR2US($_POST['dateDebut']).'\'':'null';
            $dateFin=$_POST['dateFin']!='' ? '\''.Utilitaires::dateFR2US($_POST['dateDebut']).'\'':'null';
            $nom=$_POST['nomMaitre'];
            $prenom=$_POST['prenomMaitre'];
            $mail=$_POST['mailMaitre'];
            $desc=addslashes($_POST['description']);
            $eleve=$_SESSION['id'];
            $date=date('Y-m-d');
            $insert=Database::exec('insert into stages (eleve_id,entreprise_id,date,debutStage,finStage,description,nom,prenom,mail,valide) values (\''.$eleve.'\',\''.$entreprise.'\',\''.$date.'\','.$dateDebut.','.$dateFin.',\''.$desc.'\',\''.$nom.'\',\''.$prenom.'\',\''.$mail.'\',\'0\')');
            header('location: ./stages-detail?id='.$insert);
            die;
        }
    }

}
