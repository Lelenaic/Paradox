<?php

class Entreprises {
    
    public function afficherTableau(){
        $html='<table id="users" class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>Dénomination</th>
                        <th>Activité</th>
                        <th>E-mail</th>
                        <th>Rue</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Téléphone</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
        $data=$this->getData();
        foreach ($data as $entreprise){
            $html.='<tr>';
            $html.=$this->makeLine($entreprise);
            $html.='</tr>';
        }
        return $html;
    }
    
    private function getData(){
        $data=Database::query('select entreprises.id,denomination,nom,mail,rue,cp,ville,tel,contact,valide from entreprises,categoriesEntreprises where entreprises.categorie_id=categoriesEntreprises.id');
        return $data;
    }
    
    public function messages(){
        if (isset($_GET['editOk'])) {
            return '<div class="alert alert-success" role="alert">Edition effectuée avec succès !</div>';
        }elseif (isset($_GET['ajoutOk'])) {
            return '<div class="alert alert-success" role="alert">L\'entreprise a été ajouté avec succès !</div>';
        }elseif (isset($_GET['supprOk'])) {
            return '<div class="alert alert-success" role="alert">L\'entreprise a été supprimée avec succès !</div>';
        }elseif (isset($_GET['validOk'])) {
            return '<div class="alert alert-success" role="alert">L\'entreprise a été validée avec succès !</div>';
        }
    }
    
    private function makeLine($data){
        $html='<td>'.$data[1].'</td>';
        $html.='<td>'.$data[2].'</td>';
        $html.='<td>'.$data[3].'</td>';
        $html.='<td>'.$data[4].'</td>';
        $html.='<td>'.$data[5].'</td>';
        $html.='<td>'.$data[6].'</td>';
        $html.='<td>'.$data[7].'</td>';
        $html.='<td>'.$data[8].'</td>';
        $html.='<script type="text/javascript">
                function subb(){
                    return confirm("Êtes-vous sûr de vouloir supprimer cette entreprise ?");
                }
                </script>';
        $html.='<td><a href="./editer_entreprise?id='.$data[0].'">Editer</a>  <a href="./entreprises?supprId='.$data[0].'" onclick="return subb()">Supprimer</a>'.$this->isValid($data[9],$data[0]).'</td>';
        return $html;
    }
    
    private function isValid($etat,$id){
        if (!$etat) {
            return '  <a href="./entreprises?validId='.$id.'"><button type="button" class="btn btn-success">Confirmer</button></a>';
        }
    }
    
    public function doDelete($page){
        if (isset($_GET['supprId']) and $page=='entreprises') {
            Database::exec('delete from entreprises where id='.$_GET['supprId']);
            header('location: ./entreprises?supprOk');
        }
    }
    
    public function doValid($page){
        if (isset($_GET['validId']) and $page=='entreprises') {
            Database::exec('update entreprises set valide=\'1\' where id='.$_GET['validId']);
            header('location: ./entreprises?validOk');
        }
    }
}