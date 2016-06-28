<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BookPro
 *
 * @author lelenaic
 */
class BookProPublic {

    private $_dir;
    private $_id;

    public function __construct() {
        $this->_dir = isset($_GET['folder']) ? $_GET['folder'] : '';
        $this->_id = isset($_GET['id']) ? $this->setId($_GET['id']) :$this->invalide();
    }

    public function remonter() {
        if ($this->_dir != '' and $this->_dir != '/') {
            $dir = explode('/', $this->_dir);
            $preDir = '';
            for ($i = 0; $i < count($dir) - 1; $i++) {
                $preDir.=$dir[$i];
                if (count($dir) - $i > 2) {
                    $preDir.='/';
                }
            }
            return '<a href="./book-pro-public?id='.$this->_id.'&folder=' . $preDir . '"><button class="btn btn-primary" style="margin-bottom:5px;"><i class="fa fa-reply"></i></button></a>';
        }
    }
    
    public function invalide(){
        die('Erreur ! Votre URL est invalide !');
    }
    
    public function setId($id){
        if (!is_numeric($id)) {
            Security::addWarning('BPP1');
            $this->invalide();
        }else{
            $verif=Database::query('select id from eleves where id='.$id);
            if (isset($verif[0][0])) {
                return $id;
            }else{
                $this->invalide();
            }
        }
    }
    
    public function getNoms(){
        $get=Database::query('select nom,prenom from eleves where id='.$this->_id);
        return $get[0][0].' '.$get[0][1];
    }

    public function afficherFichiers() {
        $scan = scandir('files/' . $this->_id . $this->_dir);
        $html = '';
        for ($i = 2; $i < count($scan); $i++) {
            if (is_dir('files/' . $this->_id . $this->_dir . '/' . $scan[$i])) {
                $html.= '<div class="item col-xs-12 col-sm-6 col-lg-4" style="margin-top:5px;">
                    <div class="panel panel-default paper-shadow" data-z="0.5">
                        <div class="cover overlay cover-image-full hover">
                            <span class="img icon-block height-150 bg-default"></span>
                            <a href="website-course.html" class="padding-none overlay overlay-full icon-block bg-default">
                                <span class="v-center">
                                    <i class="fa fa-folder-o"></i>
                                </span>
                            </a>

                            <a href="./book-pro-public?id='.$this->_id.'&folder=' . $this->_dir . '/' . $scan[$i] . '" class="overlay overlay-full overlay-hover overlay-bg-white">
                                <span class="v-center">
                                    <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-folder-open-o fa-2x"></i></span>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h4 class="text-headline margin-v-0-10 break"><a href="./book-pro-public?id='.$this->_id.'&folder=' . $this->_dir . '/' . $scan[$i] . '">' . $scan[$i] . '</a></h4>
                    </div>
                  </div>
                </div>';
            } else {
                $html.= '<div class="item col-xs-12 col-sm-6 col-lg-4" style="margin-top:5px;">
                    <div class="panel panel-default paper-shadow" data-z="0.5">
                        <div class="cover overlay cover-image-full hover">
                            <span class="img icon-block height-150 bg-default"></span>
                            <a href="website-course.html" class="padding-none overlay overlay-full icon-block bg-default">
                                <span class="v-center">
                                    <i class="fa fa-file-o"></i>
                                </span>
                            </a>
                            <a href="files/' . $this->_id . $this->_dir . '/' . $scan[$i] . '" class="overlay overlay-full overlay-hover overlay-bg-white" download>
                                <span class="v-center">
                                    <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-download fa-2x"></i></span>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h4 class="text-headline margin-v-0-10 break"><a href=" files/' . $this->_id . $this->_dir . '/' . $scan[$i] . '" download>' . $scan[$i] . '</a></h4>
                      </div>
                    </div>
                </div>';
            }
        }
        if (count($scan) == 2) {
            $html = '</div><div class="alert alert-info" role="alert"><strong>Hum, il semblerait que ce dossier soit vide ...</div><div>';
        }
        return $html;
    }

}
