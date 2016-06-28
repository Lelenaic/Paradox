<?hh

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EditUser
 *
 * @author lelenaic
 */

class EditStage {

    private $_id;
    private $_data;

    public function setAtt($page){
        if ($page=='editer_stage') {
            $this->_id=isset($_GET['id']) ? $_GET['id']:$_POST['id'];
        }
    }

    public function afficherFormulaire() {
        $data = Database::query('select debutStage,finStage,description,nom,prenom,mail from stages where id='.$this->_id);
        $this->_data = $data[0];
        return $this->getForm();
    }

    private function getForm() {
        return '<form method="POST" action="editer_stage">
            <input type="text" name="id" value="' . $this->_id . '" hidden>
            <div class="form-group">
                <label>Date de début du stage</label>
                <input class="form-control" type="text" name="dateDebut" value="' . $this->_data[0] . '" required>
            </div>
            <div class="form-group">
                <label>Date de fin du stage</label>
                <input class="form-control" type="text" name="dateFin" value="' . $this->_data[1] . '" required>
            </div>
            <div class="form-group">
                <label>Description du stage</label>
                <textarea class="form-control" name="description" required>' . $this->_data[2] . '</textarea>
            </div>
            <div class="form-group">
                <label>Nom du responsable</label>
                <input class="form-control" type="text" name="nom" value="' . $this->_data[3] . '" required>
            </div>
            <div class="form-group">
                <label>Prénom du responsable</label>
                <input class="form-control" type="text" name="prenom" value="' . $this->_data[4] . '" required>
            </div>
            <div class="form-group">
                <label>E-mail du responsable</label>
                <input class="form-control" type="email" name="mail" value="' . $this->_data[5] . '" required>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>  <button type="button" class="btn btn-danger" onclick="history.back()">Annuler</button>
            </form>';
    }

    public function doEdit($page){
        if (isset($_POST['dateDebut']) && $page=='editer_stage') {
            $dateDebut=$_POST['dateDebut'];
            $dateFin=$_POST['dateFin'];
            $rue=$_POST['rue'];
            $cp=$_POST['cp'];
            $ville=$_POST['ville'];
            $categorie=$_POST['categorie'];
            //Database::exec('update entreprises set denomination=\''.$denomination.'\',mail=\''.$mail.'\',rue=\''.$rue.'\',cp=\''.$cp.'\',ville=\''.$ville.'\',categorie_id=\''.$categorie.'\' where id='.$this->_id);
            header('location: ./entreprises?editOk');
        }
    }
}
