<?hh

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

/**
* Description of Dashboard
*
* @author lelenaic
*/
class Dashboard {

  private $_pourcentage;

  public function messages(){
    if (isset($_GET['oldPass'])) {
      return '<div class="alert alert-danger" role="alert"><strong>Erreur !</strong> Votre ancien mot de passe est erroné !</div>';
    }elseif (isset($_GET['notSame'])) {
      return '<div class="alert alert-danger" role="alert"><strong>Erreur !</strong> Le nouveau mot de passe et sa confirmation sont différents !</div>';
    }elseif (isset($_GET['passOk'])) {
      return '<div class="alert alert-success" role="alert">Votre mot de passe a été modifié avec succès !</div>';
    }
  }

  public function diskSpace(): string {
    $total = disk_total_space(_PARTITION_);
    $preTotal = $total;
    while ($total >= 1024) {
      $total = $total / 1024;
    }

    $free = $preTotal - disk_free_space(_PARTITION_);
    $this->_pourcentage = $free / $preTotal * 100;
    while ($free >= 1024) {
      $free = $free / 1024;
    }
    return number_format($free, 2) . ' Gio / ' . number_format($total, 2) . ' Gio';
  }

  public function getStats() {
    return $this->_pourcentage;
  }

  public function doChangePass(){
    if (isset($_POST['newPass'])) {
      $newPass=$_POST['newPass'];
      $confPass=$_POST['confPass'];
      $ancien=$_POST['oldPass'];
      $verif=Database::query('select mdp from profs where id='.$_SESSION['id']);
      if (!password_verify($ancien, $verif[0][0])) {
        header('location: ./index?oldPass');
        die;
      }
      if ($newPass==$confPass) {
        $pass=password_hash($newPass, PASSWORD_DEFAULT);
        Database::exec('update profs set mdp=\''.$pass.'\' where id='.$_SESSION['id']);
        header('location: ./index?passOk');
        die;
      }else{
        header('location: ./index?notSame');
        die;
      }
    }
  }

  public function serverLoad(){
    $load = sys_getloadavg();
    return '
    <div class="card card-stats-primary col-md-6">
    <div class="card-block">
    <p class="pull-xs-right text-primary">
    <strong>'.($load[0]*10).'%</strong>
    </p>
    <h5 class="m-b-1">Charge du serveur</h5>
    <progress class="progress progress-primary progress-animated m-a-0" value="'.($load[0]*10).'" max="100">'.($load[0]*10).'%</progress>
    </div>
    </div>';
  }

  public function importEleves(): string {
    $verif=Database::query('select valeur from options where nom=\'importEleves\'');
    if (!$verif[0][0]) {
      return '<span class="label label-warning">A faire</span>';
    }else{
      return '<span class="label label-success">Effectué</span>';
    }
  }

  public function attributionClasses(): string {
    $verif=Database::query('select valeur from options where nom=\'attributionClasses\'');
    if (!$verif[0][0]) {
      return '<span class="label label-warning">A faire</span>';
    }else{
      return '<span class="label label-success">Effectué</span>';
    }
  }

  public function attributionProfs(): string {
    $verif=Database::query('select valeur from options where nom=\'attributionProfs\'');
    if (!$verif[0][0]) {
      return '<span class="label label-warning">A faire</span>';
    }else{
      return '<span class="label label-success">Effectué</span>';
    }
  }

}
