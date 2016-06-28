<?hh

class First{
  public function getClasses(array<array> $classes=array(), string $html=''): string{
    $classes=Database::query('select sigle,nom from classes');
    $html.='<select name="classe" class="form-control">';
    $html.='<option value="0" selected>Je ne suis pas professeur principal</option>';
    foreach ($classes as $classe){
      $html.='<option value="'.$classe[0].'">'.$classe[0].' - '.$classe[1].'</option>';
    }
    $html.='</select>';
    return $html;
  }

  public function doInsert(string $classe='', string $matiere='', int $id=intval($_SESSION['id'])): void {
    if (isset($_POST['classe'])) {
      $classe=$_POST['classe']==0 ? 'null':'\''.$_POST['classe'].'\'';
      $matiere=$_POST['matiere'];
      $_SESSION['first']=false;
      Database::exec('update profs set tit='.$classe.',matiere=\''.$matiere.'\' where id='.$id);
      header('location: ./index');
      die;
    }
  }

  public function isFirst(): void {
    if ($_SESSION['first']) {
      header('location: ./first');
      die;
    }
  }

  public function cantAccess(){
    if (!$_SESSION['first']) {
      header('location: ./index');
      die;
    }
  }

}
