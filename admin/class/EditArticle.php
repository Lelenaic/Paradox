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
class EditArticle {

    private $_id;
    private $_data;
    
    public function afficherFormulaire() {
        $this->_id=isset($_GET['id']) ? $_GET['id']:$_POST['id'];
        $requete = 'select titre,texte,expiration,dateSortie,cache from articles where id=' . $this->_id;
        $data = Database::query($requete);
        $this->_data = $data[0];
        return $this->getForm();
    }

    private function getForm() {
        $dateExpi=is_null($this->_data[2]) ? '':Utilitaires::dateUS2FR($this->_data[2]);
        $dateSortie=is_null($this->_data[3]) ? '':Utilitaires::dateUS2FR($this->_data[3]);
        return '<form method="POST" action="editer_article">
            <input type="text" name="id" value="'.$this->_id.'" hidden>
            <div class="form-group required">
                <label>Titre :</label>
                <input type="text" name="titre" class="form-control" value="'.$this->_data[0].'" required>
            </div>
            <div class="form-group">
                <label>Date d\'expiration :</label>
                <input type="text" name="expiration" value="'.$dateExpi.'" placeholder="Laissez vide pour ne pas mettre d\'expiration" class="form-control datepicker" data-date-format="dd/mm/yyyy">
            </div>
            <div class="form-group">
                <label>Date de sortie :</label>
                <input type="text" name="sortie" value="'.$dateSortie.'" placeholder="Laissez vide pour une sortie immédiate" class="form-control datepicker" data-date-format="dd/mm/yyyy">
            </div>
            <div class="form-group">
                <label>Texte :</label>
                <textarea name="texte">'.$this->_data[1].'</textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Modifier l\'article">  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
        </form>';
    }
    
    public function doEdit($page){
        if (isset($_POST['titre']) and $page=='editer_article') {
            $id=intval($_POST['id']);
            //var_dump($id);
            $titre=addslashes($_POST['titre']);
            $texte=addslashes($_POST['texte']);
            $expiration=$_POST['expiration']=='' ? 'null':'\''.Utilitaires::dateFR2US($_POST['expiration']).'\'';
            $sortie=$_POST['sortie']=='' ? 'null':'\''.Utilitaires::dateFR2US($_POST['sortie']).'\'';
            $cache=$sortie=='null' ? $this->_data[4]:1;
            Database::exec('update articles set titre=\''.$titre.'\',texte=\''.$texte.'\',expiration='.$expiration.',dateSortie='.$sortie.',cache=\''.$cache.'\' where id='.$id);
            header('location: ./articles?editOk');
            die;
        }
    }
}