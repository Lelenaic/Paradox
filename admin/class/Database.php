<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PersistanceSQL
 *
 * @author usersio
 */
class Database {
    
    //Méthodes de travail
    private static function connexion(){
        try{
            $bdd = new PDO('mysql:host='._BDDHOST_.';dbname='._BDDNAME_.';charset=utf8', _BDDUSER_, _BDDPASS_);
            return $bdd;
        }catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    
    public static function query($requete){
        $bdd=Database::connexion();
        $reponse = $bdd->query($requete);
        $donnees = $reponse->fetchAll(PDO::FETCH_NUM);
        $reponse->closeCursor();
        return $donnees;
    }
    
    public static function exec($requete){
        $bdd=Database::connexion();
        $bdd->exec($requete);
        return $bdd->lastInsertId();
    }
    
}
