<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AttributionProfs
 *
 * @author lelenaic
 */
class AttributionProfs {
    
    
    public function afficherFormulaire(){
        $data=Database::query('select id,nom,prenom from profs');
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
}
