<?php

class Classes {
    
    public function afficherTableau(){
        $html='<table id="users" class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>Sigle</th>
                        <th>Nom</th>
                        <th>Année</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';
        $data=$this->getData();
        foreach ($data as $categorie){
            $html.='<tr>';
            $html.=$this->makeLine($categorie);
            $html.='</tr>';
        }
        $html.='</tbody>';
        $html.='</table>';
        return $html;
    }
    
    private function getData(){
        $data=Database::query('select sigle,nom,annee from classes');
        return $data;
    }
    
    public function messages(){
        if (isset($_GET['ajoutOk'])) {
            return '<div class="alert alert-success" role="alert">La classe a été ajoutée avec succès !</div>';
        }elseif (isset($_GET['supprOk'])) {
            return '<div class="alert alert-success" role="alert" style="margin-top:10px;">La classe a été supprimée avec succès !</div>';
        }
    }
    
    private function makeLine($data){
        $html='<td>'.$data[0].'</td>';
        $html.='<td>'.$data[1].'</td>';
        $html.='<td>'.$data[2].'</td>';
        $html.='<script type="text/javascript">
                function subb(){
                    return confirm("Êtes-vous sûr de vouloir supprimer cette catégorie ?");
                }
                </script>';
        $html.='<td><a href="./classes?delId='.$data[0].'" onclick="return subb()" class="btn btn-danger"><i class="fa fa-trash-o"></i>  Supprimer</a></td>';
        return $html;
    }
    
    public function doDelete($page){
        if (isset($_GET['delId']) and $page=='classes') {
            $this->delEl($_GET['delId']);
            Database::exec('delete from classes where sigle=\''.$_GET['delId'].'\'');
            header('location: ./classes?supprOk');
            die;
        }
    }
    
    private function delEl($id){
        Database::exec('update eleves set classe_sigle=\'\' where classe_sigle=\''.$id.'\'');
        Database::exec('update profs set tit=null where tit=\''.$id.'\'');
    }
}