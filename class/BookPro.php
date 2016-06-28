<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BookPro
 *
 * @author lelenaic
 */
class BookPro {

    private $_dir;
    private $_id;
    private $_modalsDeplacerDossier;
    private $_modalsDeplacerFichier;
    private $_modalsPartage;

    public function __construct() {
        $this->_dir = isset($_GET['folder']) ? $_GET['folder'] : '';
        @$this->_id = isset($_SESSION['id']) ? $_SESSION['id'] : $_GET['id'];
        $this->_modalsDeplacerDossier = '';
        $this->_modalsDeplacerFichier = '';
    }

    public function messages() {
        if (isset($_GET['nomDoss'])) {
            return '<div class="alert alert-danger" role="alert"><strong>Erreur !</strong> Vous utilisez des caractères interdits dans le nom de votre dossier !</div>';
        } elseif (isset($_GET['extension'])) {
            return '<div class="alert alert-warning" role="alert"><strong>Erreur !</strong> Les extensions de fichiers autorisées sont : ' . $this->getExtensions() . '</div>';
        } elseif (isset($_GET['taille'])) {
            return '<div class="alert alert-warning" role="alert"><strong>Erreur !</strong> La taille maximum du fichier doit être de 5 mo.</div>';
        } elseif (isset($_GET['suppr'])) {
            return '<div class="alert alert-success" role="alert">Elément supprimé avec succès !</div>';
        } elseif (isset($_GET['dirAlready'])) {
            return '<div class="alert alert-warning" role="alert"><strong>Erreur !</strong> Le dossier existe déjà.</div>';
        } elseif (isset($_GET['fileAlready'])) {
            return '<div class="alert alert-warning" role="alert"><strong>Erreur !</strong> Le fichier existe déjà.</div>';
        } elseif (isset($_GET['uploadOk'])) {
            return '<div class="alert alert-success" role="alert">Fichier envoyé avec succès !</div>';
        } elseif (isset($_GET['moveOk'])) {
            return '<div class="alert alert-success" role="alert">Elément déplacé avec succès !</div>';
        }
    }

    public function getExtensions() {
        $ext = Database::query('select valeur from options where nom=\'extensions\'');
        return $ext[0][0];
    }

    public function getModalsDossier() {
        return $this->_modalsDeplacerDossier;
    }

    public function getModalsFichier() {
        return $this->_modalsDeplacerFichier;
    }

    public function getModalsPartage() {
        return $this->_modalsPartage;
    }

    public function remonter() {
        if ($this->_dir != '' and $this->_dir != '/') {
            $dir = explode('/', $this->_dir);
            $preDir = '';
            for ($i = 0; $i < count($dir) - 1; $i++) {
                $preDir.=$dir[$i];
                if (count($dir) - $i > 2) {
                    $preDir.='/';
                }
            }
            return '<a href="./book-pro-files?folder=' . $preDir . '"><button class="btn btn-primary" style="margin-bottom:5px;"><i class="fa fa-reply"></i></button></a>';
        }
    }

    public function getFile() {
        if (isset($_FILES['fichier'])) {
            if ($_FILES['fichier']['error']) {
                switch ($_FILES['nom_du_fichier']['error']) {
                    case 1: // UPLOAD_ERR_INI_SIZE     
                        echo "Le fichier dépasse la taille autorisée !";
                        break;
                    case 2: // UPLOAD_ERR_FORM_SIZE     
                        echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !";
                        break;
                    case 3: // UPLOAD_ERR_PARTIAL     
                        echo "L'envoi du fichier a été interrompu pendant le transfert !";
                        break;
                    case 4: // UPLOAD_ERR_NO_FILE     
                        echo "Le fichier que vous avez envoyé a une taille nulle !";
                        break;
                }
            } else {
                $tailleMax = Database::query('select valeur from options where nom=\'tailleMax\'');
                if ((isset($_FILES['fichier']['tmp_name']) && ($_FILES['fichier']['error'] == UPLOAD_ERR_OK)) and $_FILES['fichier']['size'] <= $tailleMax[0][0]) {
                    $tableExts = Database::query('select valeur from options where nom=\'extensions\'');
                    $exts = $tableExts[0][0];
                    if (!strstr($exts, substr($_FILES['fichier']['name'], -3, 3))) {
                        header('location: ./book-pro-files?folder=' . $this->_dir . '&extension');
                        die;
                    }
                    move_uploaded_file($_FILES['fichier']['tmp_name'], 'files/' . $this->_id . '/' . $this->_dir . '/' . $_FILES['fichier']['name']);
                    header('location: ./book-pro-files?folder=' . $this->_dir . '&uploadOk');
                    die;
                } else {
                    header('location: ./book-pro-files?folder=' . $this->_dir . '&taille');
                    die;
                }
            }
        }
    }

    public function upload() {
        $modal = '<button type="button" class="btn btn-default" style="margin-left:5px; margin-bottom:5px;" data-toggle="modal" data-target="#upload">
                    Téléverser un fichier
                  </button>
                <!-- Modal -->
                    <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="upload">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Envoi de fichier</h4>
                          </div>
                          <form method="post" action="book-pro-files?folder=' . $this->_dir . '" enctype="multipart/form-data"> 
                            <div class="modal-body">    
                               <input type="file" name="fichier" required>     
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary">Envoyer !</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>';
        return $modal;
    }

    public function doFolder() {
        if (isset($_POST['nomDossier'])) {
            $nomDossier = $_POST['nomDossier'];
            $interdits = array('.', '/');
            foreach ($interdits as $nope) {
                if (strstr($nomDossier, $nope) !== false) {
                    header('location: ./book-pro-files?folder=' . $this->_dir . '&nomDoss');
                    die;
                }
            }
            $scan = scandir('files/' . $_SESSION['id'] . $this->_dir . '/');
            if (in_array($_POST['nomDossier'], $scan)) {
                header('location: ./book-pro-files?folder=' . $this->_dir . '&dirAlready');
                die;
            }
            mkdir('files/' . $_SESSION['id'] . $this->_dir . '/' . $_POST['nomDossier']);
            header('location: ./book-pro-files?folder=' . $this->_dir);
        }
    }

    public function boutons() {
        $html = '<button class="btn btn-success" type="button" style="margin-bottom:5px;" data-toggle="modal" data-target="#creerDossier">Créer un dossier</button>';
        $html.='<div class="modal fade" id="creerDossier" tabindex="-1" role="dialog" aria-labelledby="upload">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Création de dossier</h4>
                          </div>
                          <form method="post" action="book-pro-files?folder=' . $this->_dir . '"> 
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nom du dossier</label>
                                    <input type="text" name="nomDossier" class="form-control" required>   
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary">Créer !</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>';
        return $html;
    }

    public function afficherFichiers() {
        $scan = scandir('files/' . $this->_id . $this->_dir);
        $html = '';
        for ($i = 2; $i < count($scan); $i++) {
            if (is_dir('files/' . $this->_id . $this->_dir . '/' . $scan[$i])) {
                $html.= '<div class="item col-xs-12 col-sm-6 col-lg-4" style="margin-top:5px;">
                    <div class="panel panel-default paper-shadow" data-z="0.5">
                        <div class="cover overlay cover-image-full hover">
                            <span class="img icon-block height-150 bg-default"></span>
                            <a href="website-course.html" class="padding-none overlay overlay-full icon-block bg-default">
                                <span class="v-center">
                                    <i class="fa fa-folder-o"></i>
                                </span>
                            </a>

                            <a href="./book-pro-files?folder=' . $this->_dir . '/' . $scan[$i] . '" class="overlay overlay-full overlay-hover overlay-bg-white">
                                <span class="v-center">
                                    <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-folder-open-o fa-2x"></i></span>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h4 class="text-headline margin-v-0-10 break"><a href="./book-pro-files?folder=' . $this->_dir . '/' . $scan[$i] . '">' . $scan[$i] . '</a></h4>
                        <script type="text/javascript">
                            function subb(){
                                return confirm("Êtes-vous sûr de vouloir le supprimer ?");
                            }
                        </script>
                        <a href="./book-pro-files?folder=' . $this->_dir . '&del=' . $this->_dir . '/' . $scan[$i] . '" onclick="return subb()"><button type="button" class="btn btn-danger" style="float:right;"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                        <button type="button" class="btn btn-success" style="float:right; margin-left:2px; margin-right:2px;" data-toggle="modal" data-target="#deplacerDossier' . $i . '"><i class="fa fa-arrows" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-primary" style="float:right; margin-right:2px;" data-toggle="modal" data-target="#partage' . $i . '"><i class="fa fa-share-alt" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>';
                $this->_modalsDeplacerDossier.='
                    <!-- Modal deplacement dossier -->
                    <div class="modal fade" id="deplacerDossier' . $i . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Déplacer un dossier</h4>
                          </div>
                          <form method="post" action="book-pro-files?folder=' . $this->_dir . '">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nouvel emplacement :</label>
                                    <input type="text" name="ancienEmplacement" value="' . $this->_dir . '/' . $scan[$i] . '" hidden>
                                    <input type="text" name="nouvelEmplacement" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary">Déplacer</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>';
                $this->_modalsPartage.='
                    <!-- Modal deplacement dossier -->
                    <div class="modal fade" id="partage' . $i . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Partager un dossier</h4>
                          </div>
                            <div class="modal-body">
                                Voici le lien correspondant à ce dossier :<br>
                                <pre>'._URL_.'book-pro-public?id='.$this->_id.'&folder='.$this->_dir.'/'.$scan[$i].'</pre>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i></button>
                            </div>
                        </div>
                      </div>
                    </div>';
            } else {
                $html.= '<div class="item col-xs-12 col-sm-6 col-lg-4" style="margin-top:5px;">
                    <div class="panel panel-default paper-shadow" data-z="0.5">
                        <div class="cover overlay cover-image-full hover">
                            <span class="img icon-block height-150 bg-default"></span>
                            <a href="website-course.html" class="padding-none overlay overlay-full icon-block bg-default">
                                <span class="v-center">
                                    <i class="fa fa-file-o"></i>
                                </span>
                            </a>
                            <a href="files/' . $this->_id . $this->_dir . '/' . $scan[$i] . '" class="overlay overlay-full overlay-hover overlay-bg-white" download>
                                <span class="v-center">
                                    <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-download fa-2x"></i></span>
                                </span>
                            </a>
                        </div>
                        <div class="panel-body">
                            <h4 class="text-headline margin-v-0-10 break"><a href=" files/' . $this->_id . $this->_dir . '/' . $scan[$i] . '" download>' . $scan[$i] . '</a></h4>
                        <script type="text/javascript">
                            function subb(){
                                return confirm("Êtes-vous sûr de vouloir le supprimer ?");
                            }
                        </script>
                        <a href="./book-pro-files?folder=' . $this->_dir . '&del=' . $this->_dir . '/' . $scan[$i] . '" onclick="return subb()"><button type="button" class="btn btn-danger" style="float:right; margin-left:2px;"><i class="fa fa-trash" aria-hidden="true"></i></button></a> 
                        <button type="button" class="btn btn-success" style="float:right; margin-left:2px; margin-right:2px;" data-toggle="modal" data-target="#deplacerFichier' . $i . '"><i class="fa fa-arrows" aria-hidden="true"></i></button> 
                        <button type="button" class="btn btn-primary" style="float:right; margin-right:2px;" data-toggle="modal" data-target="#partage' . $i . '"><i class="fa fa-share-alt" aria-hidden="true"></i></button>
                      </div>
                    </div>
                </div>';
                $this->_modalsDeplacerFichier.='
                    <!-- Modal deplacement dossier -->
                    <div class="modal fade" id="deplacerFichier' . $i . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Déplacer un dossier</h4>
                          </div>
                          <form method="post" action="book-pro-files?folder=' . $this->_dir . '">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nouvel emplacement :</label>
                                    <input type="text" name="ancienEmplacement" value="' . $this->_dir . '/' . $scan[$i] . '" hidden>
                                    <input type="text" name="nouvelEmplacement" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary">Déplacer</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>';
                $this->_modalsPartage.='
                    <!-- Modal deplacement dossier -->
                    <div class="modal fade" id="partage' . $i . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Partager un dossier</h4>
                          </div>
                            <div class="modal-body">
                                Voici le lien correspondant à ce dossier :<br>
                                <pre>'._URL_.'files/' . $this->_id . $this->_dir . '/' . $scan[$i] . '</pre>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i></button>
                            </div>
                        </div>
                      </div>
                    </div>';
            }
        }
        if (count($scan) == 2) {
            $html = '</div><div class="alert alert-info" role="alert"><strong>Hum, il semblerait que ce dossier soit vide ...<br>'
                    . 'Envoyez un fichier ou créez un dossier pour commencer !</strong></div><div>';
        }
        return $html;
    }

    public function doMove() {
        if (isset($_POST['nouvelEmplacement'])) {
            $new = 'files/' . $_SESSION['id'] . '/' . $_POST['nouvelEmplacement'];
            if (strstr($new, '..')) {
                header('location: ./book-pro-files?folder=' . $this->_dir . '&nomDoss');
                die;
            }
            $old = 'files/' . $_SESSION['id'] . $_POST['ancienEmplacement'];
            rename($old, $new);
            header('location: ./book-pro-files?folder=' . $this->_dir . '&moveOk');
            die;
        }
    }

    public function doDelete() {
        if (isset($_GET['del'])) {
            $del = 'files/' . $_SESSION['id'] . $_GET['del'];
            if (!is_dir($del)) {
                unlink($del);
                header('location: ./book-pro-files?folder=' . $this->_dir . '&suppr');
                die;
            } else {
                self::deleteDir($del);
                header('location: ./book-pro-files?folder=' . $this->_dir . '&suppr');
                die;
            }
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
