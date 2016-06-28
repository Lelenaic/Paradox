<?hh

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjoutArticle
 *
 * @author lelenaic
 */
class AjoutArticle {
    public function doAjout($page){
        if (isset($_POST['texte']) && $page=='ajouter_article') {
            $date=date('Y-m-d');
            $heure=date('H:i');
            $auteur=$_SESSION['id'];
            $titre=addslashes($_POST['titre']);
            $texte=addslashes($_POST['texte']);
            $sortie=$_POST['sortie']=='' ? 'null':'\''.Utilitaires::dateFR2US($_POST['sortie']).'\'';
            $cache=$sortie=='null' ? $_POST['cache']:1;
            $expiration=$_POST['expiration']=='' ? 'null':'\''.Utilitaires::dateFR2US($_POST['expiration']).'\'';
            Database::exec('insert into articles (date,heure,auteur_id,titre,texte,expiration,cache,dateSortie) values (\''.$date.'\',\''.$heure.'\',\''.$auteur.'\',\''.$titre.'\',\''.$texte.'\','.$expiration.',\''.$cache.'\','.$sortie.')');
            header('location: ./articles?ajoutOk');
            die;
        }
    }
}
