<?hh

class Stages {
    private string $_classe;

    public function __construct(){
        $this->_classe=isset($_GET['classe']) ? $_GET['classe']:'';
    }

    public function afficherTableau(): string {
        $html='<table id="users" class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Entreprise</th>
                        <th>Date d\'ajout</th>
                        <th>Actions</th>';
                    $html.='</tr>
                </thead>';
        $data=$this->getData();
        foreach ($data as $user){
            $html.='<tr>';
            $html.=$this->makeLine($user);
            $html.='</tr>';
        }
        return $html;
    }

    private function getData(array<array> $data=array()): array<array> {
        $data=Database::query('select stages.id,eleves.nom,eleves.prenom,entreprises.denomination,stages.date from stages,eleves,entreprises where entreprises.id=stages.entreprise_id and eleves.id=stages.eleve_id and classe_sigle=\''.$this->_classe.'\'');
        return $data;
    }

    public function messages(){
        if (isset($_GET['editOk'])) {
            return '<div class="alert alert-success" role="alert">Edition effectuée avec succès !</div>';
        }elseif (isset($_GET['validOk'])) {
            return '<div class="alert alert-success" role="alert">Modification de l\'état du stage effectuée !</div>';
        }
    }

    private function makeLine(array<string> $data){
        $html='<td>'.$data[1].'</td>';
        $html.='<td>'.$data[2].'</td>';
        $html.='<td>'.$data[3].'</td>';
        $html.='<td>'.Utilitaires::dateUS2FR($data[4]).'</td>';
        $html.='<script type="text/javascript">
                function subb(){
                    return confirm("Êtes-vous sûr de vouloir supprimer ce stage ?");
                }
                </script>';
        $html.='<td><button type="button" class="btn btn-default">Plus d\'informations</button>  <a href="./stages?validId='.$data[0].'&classe='.$this->_classe.'">'.$this->confirmButton($data[0]).'</a> <a href="./editer_stage?id='.$data[0].'"><button type="button" class="btn btn-primary">Editer</button></a> <a href="./entreprises?validId=" onclick="return subb()"><button type="button" class="btn btn-danger">Supprimer</button></a></td>';
        return $html;
    }

    private function confirmButton($id){
        $verif=Database::query('select valide from stages where id='.$id);
        if ($verif[0][0]) {
            return '<button type="button" class="btn btn-warning">Invalider</button>';
        }else{
            return '<button type="button" class="btn btn-success">Confirmer</button>';
        }
    }

    public function doValidStage($page){
        if (isset($_GET['validId']) && $page=='stages') {
            $id=$_GET['validId'];
            $etat=Database::query('select valide from stages where id='.$id);
            $new=1-$etat[0][0];
            Database::exec('update stages set valide='.$new.' where id='.$id);
            header('location: ./stages?classe='.$this->_classe.'&validOk');
        }
    }
}
