<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

date_default_timezone_set('Europe/Paris');
include ('../includes/options.php');
include ('../class/Database.php');

// Début archivage articles

$date = date('Y-m-d');
$articles = Database::query('select id from articles where expiration<=\'' . $date . '\'');

foreach ($articles as $article) {
    Database::exec('insert into archive_articles (id,date,heure,auteur_id,titre,texte,tags,expiration,cache,dateSortie) select id,date,heure,auteur_id,titre,texte,tags,expiration,cache,dateSortie from articles where id=' . $article[0]);
    Database::exec('delete from commentaires where article_id=' . $article[0]);
    Database::exec('delete from articles where id=' . $article[0]);
}

// Fin archivage articles
// Début sortie articles

$articles = Database::query('select id from articles where dateSortie<=\'' . $date . '\'');

foreach ($articles as $article) {
    Database::exec('update articles set cache=0, dateSortie=null where id=' . $article[0]);
}

// Fin sortie articles
// Début changement classe élèves

if (date('m-d') == '07-10') {
    Database::exec('update eleves set annee=annee+1 where redoublant=0');
    Database::exec('update options set valeur=0 where nom=\'importEleves\'');
    Database::exec('update options set valeur=0 where nom=\'attributionClasses\'');
    Database::exec('update eleves set redoublant=0');
    $anciens = Database::query('select id from eleves where annee=4');

}

// Fin changement classe élèves
