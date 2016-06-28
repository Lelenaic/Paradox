<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetailsStage
 *
 * @author lelenaic
 */
class DetailsStage {
    
    private $_stageId;
    private $_header;
    private $_entreprise;
    private $_description;
    private $_eleveId;
    private $_date;
    private $_dateDebut;
    private $_dateFin;
    private $_nomMaitre;
    private $_prenomMaitre;
    private $_mailMaitre;
    
    public function __construct(){
        $this->_stageId=isset($_GET['id']) ? $_GET['id']:$this->noStage();
        $this->_hasStage=false;
        $this->_eleveId=$this->setId();
        $this->hasStage();
        $this->getInfos(); 
    }
    
    private function isTit(){
        $classe=Database::query('select classe_sigle from eleves where id='.$this->_eleveId);
        if ($_SESSION['tit']==$classe[0][0]) {
            return true;
        }else{
            return false;
        }
    }
    
    private function setId(){
        $id=Database::query('select eleve_id from stages where id='.$this->_stageId);
        return $id[0][0];
    }

    public function panel(){
        $dateDebut=$this->_dateDebut!='' ? Utilitaires::dateUS2FR($this->_dateDebut):'';
        $dateFin=$this->_dateFin!='' ? Utilitaires::dateUS2FR($this->_dateFin):'';
        if ($dateDebut=='' and $dateFin=='') {
            $date='Inconnu';
        }else{
            $date=$dateDebut.' au '.$dateFin;
        }
        $html='<div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                    <div class="panel-heading">
                        <h4 class="text-headline">Stage</h4>
                    </div>
                    <div class="panel-body">
                        <p class="text-caption">
                            <i class="fa fa-calendar fa-fw"></i> '.$date.' <br/>
                            <i class="fa fa-user fa-fw"></i> Maître de stage : '.$this->_nomMaitre.' '.$this->_prenomMaitre.'<br/>
                            <i class="fa fa-at fa-fw"></i> '.$this->_mailMaitre.'<br/>
                        </p>
                    </div>
                    <hr class="margin-none"/>
                    <div class="panel-body text-center">
                        <p><a class="btn btn-success btn-lg paper-shadow relative" data-z="1" data-toggle="modal" data-target="#myModal" data-hover-z="2" data-animated>Valider le stage</a></p>
                        <p class="text-body-2">ou <a href="#">annuler cette recherche</a></p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#" class="text-light"><i class="fa fa-exclamation fa-fw"></i> Invalider cette recherche</a>
                        </li>
                    </ul>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                        ...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>';
        return $html;
    }
    
    public function getHeader(){
        return $this->_header;
    }

    
    public function afficherStage(){
        return $this->_description;
    }
    
    public function hasStage(){
        $verif=Database::query('select count(id) from stages where id='.$this->_stageId.' and eleve_id='.$this->_eleveId);
        if ($verif[0][0]!=1 and $_SESSION['tit']) {
            $this->noStage();
        }
    }
    
    private function getInfos(){
        $stage=Database::query('select entreprise_id,date,debutStage,finStage,description,nom,prenom,mail from stages where id='.$this->_stageId);
        $this->_description=$stage[0][4];
        $this->infosEntreprise($stage[0][0]);
        $this->_date=$stage[0][1];
        $this->_dateDebut=$stage[0][2];
        $this->_dateFin=$stage[0][3];
        $this->_nomMaitre=$stage[0][5]=='' ? 'Inconnu':$stage[0][5];
        $this->_prenomMaitre=$stage[0][6];
        $this->_mailMaitre=$stage[0][7]=='' ? 'Inconnu':$stage[0][7];
    }
    
    private function noStage(){
        Utilitaires::redirect('./stages-recherche-liste?noStage');
    }
    
    public function infosEntreprise($id){
        $entreprise=Database::query('select denomination,mail,ville from entreprises where id='.$id);
        $this->_header=$entreprise[0][0].' - '.$entreprise[0][2];
        $this->_entreprise=$entreprise[0];
    }
}
