<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AffectationEleves
 *
 * @author lelenaic
 */
class AffectationEleves {
    private $_step;
    
    public function __construct(){
        $this->_step=isset($_GET['step']) ? $_GET['step']:1;
    }
    
    private function verifStep($step){
        if ($step>=4) {
            header('location: utilisateurs?type=eleves&affectOk');
            die;
        }
    }
    
    public function afficherFormulaire(){
        $data=Database::query('select id,nom,prenom,annee from eleves where annee='.$this->_step);
        $html='<form method="post" action="affectation_eleves?step='.$this->_step.'">';
        foreach ($data as $eleve){
            $html.='<input type="text" value="true" name="goAffect" hidden>';
            $html.='<input type="text" value="'.$eleve[0].'" name="eleve'.$eleve[0].'" hidden>';
            $html.='<div class="form-group">';
            $html.='<label>'.$eleve[2].' '.$eleve[1].'</label>';
            $html.=$this->getClasses($eleve[0]);
            $html.='</div>';
        }
        $html.='<input type="submit" class="btn btn-primary" value="Confirmer">';
        $html.='</form>';
        return $html;
    }
    
    private function getClasses($id){
        $classes=Database::query('select sigle,nom from classes where annee='.$this->_step);
        $html='<select class="form-control" name="classe'.$id.'" required>';
        foreach ($classes as $classe){
            $html.='<option selected disabled>Sélectionnez une classe ...</option>';
            $html.='<option value="'.$classe[0].'">'.$classe[0].' - '.$classe[1].'</option>';
        }
        $html.='</select>';
        return $html;
    }
    
    public function doAffect($page){
        if (isset($_POST['goAffect']) and $page=='affectation_eleves') {
            $max=Database::query('select max(id) from eleves');
            for ($i=0;$i<=$max[0][0];$i++){
                if (isset($_POST['eleve'.$i])) {
                    $eleve=$_POST['eleve'.$i];
                    $classe=$_POST['classe'.$i];
                    Database::exec('update eleves set classe_sigle=\''.$classe.'\' where id='.$eleve.'');
                }
            }
            Database::exec('update options set valeur=1 where nom=\'attributionClasses\'');
            $step=$this->_step+1;
            $this->verifStep($step);
            header('location: ./affectation_eleves?step='.$step);
            die;
        }
    }
}
