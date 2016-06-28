<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author lelenaic
 */
 
class Dashboard {

    public function afficherAlerteAnnee() {
        $annee = Database::query('select annee from eleves where id=' . $_SESSION['id']);
        $date=date('Y-m-d');
        if ($annee[0][0] == 1 and $date>date('Y-05-10') and $date<date('Y-07-10')) {
            $html = '<div class="panel panel-default">
                    <div class="media v-middle">
                        <div class="media-left">
                            <div class="bg-blue-400 text-white">
                                <div class="panel-body">
                                    <i class="fa fa-info-circle fa-fw fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            Vous passerez automatiquement en deuxième année le <span class="text-body-2">10 Juillet ' . date('Y') . '</span>.
                        </div>
                    </div>
                </div>';
        } elseif($annee[0][0] == 2 and $date>date('Y-05-10') and $date<date('Y-07-10')) {
            $html = '<div class="panel panel-default">
                    <div class="media v-middle">
                        <div class="media-left">
                            <div class="bg-blue-400 text-white">
                                <div class="panel-body">
                                    <i class="fa fa-info-circle fa-fw fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            Vous passerez automatiquement en troisième année le <span class="text-body-2">10 Juillet ' . date('Y') . '</span>.
                        </div>
                    </div>
                </div>';
        }elseif($date>date('Y-05-10') and $date<date('Y-07-10')) {
            $html = '<div class="panel panel-default">
                    <div class="media v-middle">
                        <div class="media-left">
                            <div class="bg-orange-400 text-white">
                                <div class="panel-body">
                                    <i class="fa fa-exclamation-circle fa-fw fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            Vous serez considéré comme ancien élève le <span class="text-body-2">10 Juillet ' . date('Y') . '</span>. Tous vos fichiers seront supprimés, pensez donc à les sauvegarder.
                        </div>
                    </div>
                </div>';
        }else{
            $html='';
        }
        return $html;
    }

    public function afficherProfil(){
        $infos=Database::query('select nom,prenom,classe_sigle,annee from eleves where id='.$_SESSION['id']);
        if ($infos[0][3]==1) {
            $annee='Première année';
        }elseif ($infos[0][3]==2) {
            $annee='Deuxième année';
        }else{
            $annee='Troisième année';
        }
        $html='<div class="parallax overflow-hidden bg-blue-400 page-section third">
            <div class="container parallax-layer" data-opacity="true">
                <div class="media v-middle">
                    <div class="media-left text-center">
                        <a href="#"><img src="images/people/110/guy-6.jpg" alt="people" class="img-circle width-80"/></a>
                    </div>
                    <div class="media-body">
                        <h1 class="text-white text-display-1 margin-v-0">'.$infos[0][0].' '.$infos[0][1].'</h1>
                        <p class="text-subhead text-white text-underline">'.$annee.'</p>
                    </div>
                    <div class="media-right">
                        <span class="label bg-blue-500">'.$infos[0][2].'</span>
                    </div>
                </div>
            </div>
        </div>';
        return $html;
    }

    public function isProf(){
        if ($_SESSION['userType']==1){
            Utilitaires::redirect('admin');
            die;
        }
    }

}
