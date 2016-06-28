<?php

class RechercheStage {
    private $_id;
    
    public function __construct(){
        $this->_id=$_SESSION['id'];
    }
    
    public function messages(){
        if (isset($_GET['noStage'])) {
            return '<div class="col-md-5 center"><div class="alert alert-danger" role="alert"><h4>Aucun stage correspondant !</h4></div></div>';
        }
    }
    
    private function unStage($entreprise,$date,$dateDebut,$dateFin,$description,$stageId){
        $html='<div class="panel panel-default paper-shadow" data-z="0.5">
                    <div class="panel-body">
                        <div class="media media-clearfix-xs">
                            <div class="media-left text-center">
                                <div class="cover width-150 width-100pc-xs overlay cover-image-full hover margin-v-0-10">
                                    <span class="img icon-block height-130 bg-default"></span>
                                    <span class="overlay overlay-full padding-none icon-block bg-default">
                                        <span class="v-center">
                                            <i class="fa fa-industry"></i>
                                        </span>
                                    </span>
                                    <a href="./stages-detail?id='.$stageId.'" class="overlay overlay-full overlay-hover overlay-bg-white">
                                        <span class="v-center">
                                            <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-arrow-circle-right fa-2x"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="media-body">
                                <h4 class="text-headline margin-v-5-0"><a href="./stages-detail?id='.$stageId.'">'.$entreprise[0].' <small>'.$entreprise[2].'</small></a></h4>
                                <p class="small">
                                    '.$entreprise[1].'
                                </p>
                                <div style="max-height:70px; overflow:hidden;">'.$description.'</div>
                                <hr class="margin-v-8" />
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <img src="images/people/50/guy-2.jpg" alt="People" class="img-circle width-40"/>
                                    </div>
                                    <div class="media-body">
                                        <h4>Du '.$dateDebut.' au '.$dateFin.'<br/></h4>
                                        Ajouté le : '.$date.'
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>';
        return $html;
    }
    
    public function afficherStages(){
        $stages=$this->getStages();
        echo $stages;
    }
    
    private function getStages(){
        $stages=Database::query('select entreprise_id,date,debutStage,finStage,description,id from stages where eleve_id='.$this->_id);
        if (isset($stages[0][0])) {
            $html='';
            foreach ($stages as $stage){
                $entreprise=$this->infosEntreprise($stage[0]);
                $html.=$this->unStage($entreprise, $stage[1], $stage[2], $stage[3], $stage[4],$stage[5]);
            }
            return $html;
        }else{
            return $this->noStages();
        }
    }
    
    private function noStages(){
        $html='<div class="alert alert-info" role="alert"><h4>Vous n\'avez pas encore recherché de stage !</h4></div>';
        return $html;
    }
    
    public function infosEntreprise($id){
        $entreprise=Database::query('select denomination,mail,ville from entreprises where id='.$id);
        return $entreprise[0];
    }
}