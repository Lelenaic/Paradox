<?php

class Categories {
    
    public function afficherTableau(){
        $html='<table id="users" class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>Nom</th>
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
        $data=Database::query('select id,nom from categoriesEntreprises');
        return $data;
    }
    
    public function messages(){
        if (isset($_GET['ajoutOk'])) {
            return '<div class="alert alert-success" role="alert">La catégorie a été ajoutée avec succès !</div>';
        }elseif (isset($_GET['supprOk'])) {
            return '<div class="alert alert-success" role="alert">La catégorie a été supprimée avec succès !</div>';
        }
    }
    
    private function makeLine($data){
        $html='<td>'.$data[1].'</td>';
        $html.='<script type="text/javascript">
                function subb(){
                    return confirm("Êtes-vous sûr de vouloir supprimer cette catégorie ?");
                }
                </script>';
        $html.='<td><a href="./categories?delId='.$data[0].'" onclick="return subb()" class="btn btn-danger"><i class="fa fa-trash-o"></i>  Supprimer</a></td>';
        return $html;
    }
    
    public function doDelete($page){
        if (isset($_GET['delId']) and $page=='categories') {
            $this->delEntr($_GET['delId']);
            Database::exec('delete from categoriesEntreprises where id='.$_GET['delId']);
            header('location: ./categories?supprOk');
        }
    }
    
    private function delEntr($id){
        $entreprises=Database::query('select id from entreprises where categorie_id='.$id);
        foreach ($entreprises as $entreprise){
            Database::exec('delete from stages where entreprise_id='.$entreprise[0]);
        }
        Database::exec('delete from entreprises where categorie_id='.$id);
    }
}