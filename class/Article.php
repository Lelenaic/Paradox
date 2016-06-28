<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Article
 *
 * @author lelenaic
 */
class Article {

    private $_id;
    private $_data;

    private function setData() {
        $data = Database::query('select date,heure,nom,prenom,titre,texte,auteur_id from articles,profs where articles.auteur_id=profs.id and articles.id=' . $this->_id);
        $this->_data = $data[0];
    }

    public function setId($page) {
        if ($page == 'blog-article') {
            if (isset($_GET['id'])) {
                $this->_id = $_GET['id'];
                if ($_SESSION['admin'] == 1) {
                    $verif = Database::query('select id from articles where id=' . $this->_id);
                } else {
                    $verif = Database::query('select id from articles where id=' . $this->_id . ' and cache=0');
                }
                if (!isset($verif[0][0])) {
                    header('location: ./blog?inexistant');
                    die;
                }
                $this->setData();
            } else {
                Utilitaires::redirect('blog');
                die;
            }
        }
    }
    
    public function canComm(){
        if (isset($_SESSION['id'])) {
            return '<form method="POST" action="blog-article?id='.$_GET['id'].'">
                    <div class="form-group input-group">
                        <input type="text" name="comment" class="form-control" placeholder="Votre commentaire ...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i></button>
                        </span>
                    </div>
                </form>';
        }else{
            return '<div class="alert alert-info" role="alert">Connectez-vous pour poster un commentaire !</div>';
        }
    }

    public function getHeader() {
        return '<h3 class="text-display-2 text-white margin-none">Article #' . $this->_id . '</h3>';
    }

    public function afficherArticle() {
        $html = '<div class="page-section padding-top-none">
                    <div class="s-container">
                        <h1 class="text-display-1 margin-top-none">' . $this->_data[4] . '</h1>
                        <p class="text-light text-caption">
                            Posté par
                            <img src="'.Utilitaires::img($this->_data[6],'profs').'" alt="person" class="img-circle width-20"/> ' . $this->_data[3] . ' ' . $this->_data[2] . '
                            | <i class="fa fa-calendar fa-fw"></i> ' . Utilitaires::dateUS2FR($this->_data[0]) . ' <i class="fa fa-clock-o fa-fw"></i> ' . $this->_data[1] . '
                        </p>
                    </div>
                    <br/>

                    ' . $this->_data[5] . '
                        
                    <br/>
                    <span class="label bg-gray-dark">New</span>
                    <span class="label label-grey-200">WordPress</span>
                    <span class="label label-grey-200">Beginner</span>
                </div>';
        return $html;
    }

    public function afficherCommentaires() {
        $commentaires = Database::query('select id,user_id,type,date,heure,texte from commentaires where article_id=' . $this->_id . ' order by id desc');
        $html = '';
        if (isset($commentaires[0][0])) {
            foreach ($commentaires as $comm) {
                $user = Database::query('select nom,prenom from ' . $comm[2] . ' where id=' . $comm[1]);
                if ($_SESSION['admin']) {
                    $html.='<div class="media s-container">
                        <div class="media-left"><img class="media-object" width="50px;" src="'.Utilitaires::img($comm[1],$comm[2]).'" /></div>
                        <div class="media-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <small class="text-grey-400 pull-right"><i class="fa fa-calendar fa-fw"></i> ' . Utilitaires::dateUS2FR($comm[3]) . ' <i class="fa fa-clock-o fa-fw"></i> ' . $comm[4] . '</small>
                                    <h5 class="media-heading margin-v-5">' . $user[0][1] . ' ' . $user[0][0] . '</h5>
                                    <p class="margin-none">' . $comm[5] . '</p>
                                    <a href="./blog-article?id=' . $_GET['id'] . '&delId=' . $comm[0] . '"><button class="btn btn-danger pull-right"><i class="fa fa-trash"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>';
                } else {
                    $html.='<div class="media s-container">
                        <div class="media-left"><img class="media-object" width="50px;" src="'.Utilitaires::img($comm[1],$comm[2]).'" /></div>
                        <div class="media-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <small class="text-grey-400 pull-right"><i class="fa fa-calendar fa-fw"></i> ' . Utilitaires::dateUS2FR($comm[3]) . ' <i class="fa fa-clock-o fa-fw"></i> ' . $comm[4] . '</small>
                                    <h5 class="media-heading margin-v-5">' . $user[0][1] . ' ' . $user[0][0] . '</h5>
                                    <p class="margin-none">' . $comm[5] . '</p>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            }
        } else {
            $html = '<div class="alert alert-info" role="alert">Aucun commentaire n\'a été fait, faites le premier !</div>';
        }
        return $html;
    }

    public function doComment($page) {
        if (isset($_POST['comment']) and $page == 'blog-article') {
            $comm = addslashes($_POST['comment']);
            $type = $_SESSION['userType'] == 0 ? 'eleves' : 'profs';
            $id = $_SESSION['id'];
            $date = date('Y-m-d');
            $heure = date('H:i');
            Database::exec('insert into commentaires (article_id,user_id,type,date,heure,texte) values (\'' . $_GET['id'] . '\',\'' . $id . '\',\'' . $type . '\',\'' . $date . '\',\'' . $heure . '\',\'' . $comm . '\')');
        }
    }

    public function doDelete($page) {
        if ($page == 'blog-article' and isset($_GET['delId'])) {
            if (!$_SESSION['admin']) {
                Security::addWarning('BA1');
                die;
            }
            $id = $_GET['delId'];
            Database::exec('delete from commentaires where id=' . $id);
            header('location: ./blog-article?id=' . $_GET['id']);
            die;
        }
    }

}
