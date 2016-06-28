<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Articles
 *
 * @author lelenaic
 */

class Articles {
    
    public function messages(){
        if (isset($_GET['visible'])) {
            return '<div class="alert alert-info" role="alert">Cet article est désormais visible !</div>';
        }elseif (isset($_GET['invisible'])) {
            return '<div class="alert alert-info" role="alert">Cet article est désormais invisible !</div>';
        }elseif (isset($_GET['ajoutOk'])) {
            return '<div class="alert alert-success" role="alert">Article ajouté avec succès !</div>';
        }elseif (isset($_GET['delOk'])) {
            return '<div class="alert alert-success" role="alert">Article supprimé avec succès !</div>';
        }elseif (isset($_GET['editOk'])) {
            return '<div class="alert alert-success" role="alert">Article édité avec succès !</div>';
        }
    }
    
    public function getNbActifs(){
        $compter=Database::query('select count(id) from articles');
        return $compter[0][0]==0 ? 'Aucun':$compter[0][0];
    }
    
    public function getNbTotal(){
        $compter=Database::query('select count(id) from archive_articles');
        return ($compter[0][0]+$this->getNbActifs())==0 ? 'Aucun':$compter[0][0]+$this->getNbActifs();
    }
    
    public function afficherArticles(){
        $articles=Database::query('select articles.id,date,heure,nom,prenom,img,titre,cache,expiration from articles,profs where articles.auteur_id=profs.id order by 1 desc');
        $html='';
        foreach ($articles as $article){
            $expiration=is_null($article[8]) ? 'Jamais':Utilitaires::dateUS2FR($article[8]);
            $cache=$article[7]==1 ? '<small><em>(Caché)</em></small>':'';
            $html.='<li class="list-group-item">
                    <div class="media">
                      <div class="media-left media-middle hidden-sm-down">
                        <img src="'.$article[5].'" alt="" class="img-circle">
                      </div>
                      <div class="media-body media-middle">
                        <h4 class="card-title m-b-0"><a href="'._URL_.'blog-article?id='.$article[0].'">'.$article[6].'</a> '.$cache.' '.$this->visiAuto($article[0]).'</h4>
                        <small> <span class="text-muted">Créé</span> : Le '.Utilitaires::dateUS2FR($article[1]).' à '.$article[2].'</small>
                        <small class="m-l-1">
                          <span class="text-muted">Par</span> : '.$article[4].' '.$article[3].'
                        </small>
                      </div>
                      <div class="media-right media-middle">
                        <a href="./editer_article?id='.$article[0].'"><button style="margin-bottom:2px;" class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="left" title="Editer l\'article"><i class="material-icons">mode_edit</i></button></a>
                        '.$this->cacherMontrer($article[0]).'<br>
                        <a href="./articles?delId='.$article[0].'"><button class="btn btn-danger" type="button" data-toggle="tooltip" data-placement="left" title="Archiver l\'article"><i class="material-icons">delete_sweep</i></button></a>
                      </div>
                      <div class="media-right media-middle right">
                        <div style="width:100px" class="text-muted center">
                          <small>Expire le : <br> '.$expiration.'</small>
                        </div>
                      </div>
                    </div>
                  </li>';
        }
        return $html;
    }
    
    private function cacherMontrer($id){
        $verif=Database::query('select cache from articles where id='.$id);
        if ($verif[0][0]) {
            return '<a href="./articles?show='.$id.'"><button class="btn btn-success" style="margin-bottom:2px;" type="button" data-toggle="tooltip" data-placement="left" title="Rendre l\'article visible"><i class="material-icons">visibility</i></button></a>';
        }else{
            return '<a href="./articles?show='.$id.'"><button class="btn btn-warning" style="margin-bottom:2px;" type="button" data-toggle="tooltip" data-placement="left" title="Rendre l\'article invisible"><i class="material-icons">visibility_off</i></button></a>';
        }
    }
    
    public function doMontrer($page){
        if ($page=='articles' and isset($_GET['show'])) {
            $old=Database::query('select cache from articles where id='.$_GET['show']);
            $new=1-$old[0][0];
            Database::exec('update articles set cache='.$new.' where id='.$_GET['show']);
            Database::exec('update articles set dateSortie=null where id='.$_GET['show']);
            $get=$old[0][0]==0 ? 'invisible':'visible';
            header('location: ./articles?'.$get);
            die;
        }
    }
    
    public function doDelete($page){
        if ($page=='articles' and isset($_GET['delId'])) {
            Database::exec('insert into archive_articles (id,date,heure,auteur_id,titre,texte,expiration,cache,dateSortie) select id,date,heure,auteur_id,titre,texte,expiration,cache,dateSortie from articles where id='.$_GET['delId']);
            Database::exec('delete from commentaires where article_id='.$_GET['delId']);
            Database::exec('delete from articles where id='.$_GET['delId']);
            header('location: ./articles?delOk');
            die;
        }
    }
    
    private function visiAuto($id){
        $verif=Database::query('select dateSortie from articles where id='.$id);
        if (!is_null($verif[0][0])) {
            return '<small> - Sortie le '.Utilitaires::dateUS2FR($verif[0][0]).'</small>';
        }
    }
}