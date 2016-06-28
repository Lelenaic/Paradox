<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Blog
 *
 * @author lelenaic
 */
class Blog {

    public function listeArticles() {
        $articles = Database::query('select articles.id,date,heure,nom,prenom,titre,texte from articles,profs where articles.auteur_id=profs.id and cache=0 order by 1 desc');
        $html = '';
        foreach ($articles as $article) {
            $html.='<div class="media media-grid media-paper-shadow margin-top-none s-container">
                    <div class="media-left">
                        <div class="icon-block half img-circle bg-grey-300">
                            <i class="fa fa-file-text text-white correctBug"></i>
                        </div>
                    </div>
                        <div class="media-body">
                            <div class="panel panel-default paper-shadow" data-z="0.5">
                                <div class="panel-body">
                                    <div class="pull-right">
                                        <a href="./blog-article?id='.$article[0].'" class="btn btn-white btn-flat"><i class="fa fa-comments fa-fw"></i> 12</a>
                                    </div>
                                    <h4 class="text-title media-heading">
                                        <a href="./blog-article?id='.$article[0].'" class="link-text-color">#' . $article[0] . ' - ' . $article[5] . '</a>
                                    </h4>
                                    <p class="text-light text-caption">
                                        Posté par
                                        <img src="images/people/110/guy-6.jpg" alt="person" class="img-circle width-20" /> ' . $article[4] . ' ' . $article[3] . ' &nbsp;
                                        | <i class="fa fa-clock-o fa-fw"></i> ' . Utilitaires::dateUS2FR($article[1]) . ' à ' . $article[2] . '
                                    </p>
                                    <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam atque deserunt, dicta eius, fuga id illo ipsa ipsam minus neque non sunt, vitae. Animi aperiam beatae blanditiis dicta dolore eaque, ex excepturi explicabo laudantium nobis nulla praesentium quia voluptatem.</p>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        return $html;
    }

}
