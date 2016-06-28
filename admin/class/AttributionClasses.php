<?hh

class AttributionClasses{
  private string $_etape;

  public function __construct(string $etape=''){
    $this->_etape=isset($_GET['step']) ? $_GET['step']:$etape;
  }

  public function choseStep(){
    switch ($this->_etape){
      case 0:
        return $this->stepOne();
        break;
      case 1:
    }
  }

  private function stepOne(){
    $sql=Database::query('select sigle from classes where annee='.$this->_etape);
    $eleves=Database::query('select nom,prenom from eleves where annee='.$this->_etape);
    $html='';
    foreach ($eleves as $eleve){
      $html.='<tr>';
      $html.='<td>'.$eleve[0].'</td>';
      $html.='<td>'.$eleve[1].'</td>';
      $html.='</tr>';
    }
    return $html;
  }

}
