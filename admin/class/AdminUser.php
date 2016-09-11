<?hh

class AdminUser {
    private $_userType;

    public function __construct(){
        $this->_userType=isset($_GET['type']) ? $_GET['type']:'';
    }

    public function afficherTableau(){
        $html='<table id="users" class="table table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>E-mail</th>';
                        $html.=$this->_userType=='eleves' ?'<th>Classe</th>':'';
        $html.='        <th>Nombre de connexions</th>
                        <th>Dernière connexion</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
        $data=$this->getData();
        foreach ($data as $user){
            $html.='<tr>';
            $html.=$this->makeLine($user);
            $html.='</tr>';
        }
        return $html;
    }

    private function getData(){
        $data=$this->_userType=='eleves' ? Database::query('select id,nom,prenom,mail,classe_sigle from eleves'):Database::query('select id,nom,prenom,mail from '.$this->_userType);
        return $data;
    }

    public function messages(){
        if (isset($_GET['editOk'])) {
            return '<div class="alert alert-success" role="alert">Edition effectuée avec succès !</div>';
        }elseif (isset($_GET['ajoutOk'])) {
            return '<div class="alert alert-success" role="alert">L\'utilisateur a été ajouté avec succès !</div>';
        }elseif (isset($_GET['supprOk'])) {
            return '<div class="alert alert-success" role="alert">L\'utilisateur a été supprimé avec succès !</div>';
        }elseif (isset($_GET['affectOk'])) {
            return '<div class="alert alert-success" role="alert">Les affectations de classes ont été effectuées avec succès !</div>';
        }
    }

    private function makeLine($data){
        $nombreCo=Database::query('select count(id) from logs_co where user_id='.$data[0].' and type=\''.$this->_userType.'\'');
        $lastCoTable=Database::query('select max(date) from logs_co where user_id='.$data[0].' and type=\''.$this->_userType.'\'');
        $html='<td>'.$data[1].'</td>';
        $html.='<td>'.$data[2].'</td>';
        $html.='<td>'.$data[3].'</td>';
        $html.=$this->_userType=='eleves' ?'<td>'.$data[4].'</td>':'';
        $html.='<td>'.$nombreCo[0][0].'</td>';
        $lastCo=$lastCoTable[0][0]=='' ? 'Jamais':Utilitaires::dateUS2FR($lastCoTable[0][0]);
        $html.='<td>'.$lastCo.'</td>';
        $type=$this->_userType=='stages' ? 'entreprises':$this->_userType;
        $html.='<script type="text/javascript">
                function subb(){
                    return confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");
                }
                </script>';
        $html.='<td><a href="./editer_utilisateur?id='.$data[0].'&type='.$type.'">Editer</a>  <a href="./utilisateurs?supprId='.$data[0].'&type='.$type.'" onclick="return subb()">Supprimer</a></td>';
        return $html;
    }

    public function doDelete($page){
        if (isset($_GET['supprId']) && $page=='utilisateurs') {
            if ($_GET['type']=='eleves') {
                Database::exec('delete from stages where eleve_id='.$_GET['supprId']);
                self::deleteDir('../../html/files/'.$_GET['supprId']);
            }
            $img=Database::query('select img from '.$_GET['type'].' where id='.$_GET['supprId']);
            unlink('../html/images/users/'.$img[0][0]);
            Database::exec('delete from stages where user_id='.$_GET['supprId'].' and user_type=\''.$GET['type'].'\'');
            Database::exec('delete from '.$_GET['type'].' where id='.$_GET['supprId']);
            header('location: ./utilisateurs?type='.$this->_userType.'&supprOk');
        }
    }

    public static function deleteDir($del) {
        if (substr($del, strlen($del) - 1, 1) != '/') {
            $del .= '/';
        }
        $files = glob($del . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($del);
    }
}
