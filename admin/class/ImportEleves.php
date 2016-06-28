<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImportEleves
 *
 * @author lelenaic
 */
class ImportEleves {

    public function messages() {
        if (isset($_GET['type'])) {
            return '<div class="alert alert-danger" role="alert">Erreur, votre fichier n\'est pas un fichier CSV !</div>';
        }
    }

    public function doInsert($page) {
        if (isset($_FILES['eleves']) and $page == 'import_eleves') {
            if ($_FILES['eleves']['error']) {
                switch ($_FILES['eleves']['error']) {
                    case 1: // UPLOAD_ERR_INI_SIZE     
                        echo"Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";
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
                if (substr($_FILES['eleves']['name'], -3, 3) != 'csv') {
                    header('location: ./import_eleves?type');
                    die;
                }
                if (($handle = fopen($_FILES['eleves']['tmp_name'], "r")) !== FALSE) {
                    $tableau = array();
                    $i = 0;
                    while (($data = fgetcsv($handle, 0, ";", '"', '\n')) !== FALSE) {
                        $num = count($data);
                        for ($c = 0; $c < $num; $c++) {
                            if ($c == 1) {
                                $mdp = bin2hex(random_bytes(10));
                                $tableau[$i][] = $mdp;
                                $tableau[$i][] = $data[$c];
                            } else {
                                $tableau[$i][] = $data[$c];
                            }
                        }
                        $i++;
                    }
                    fclose($handle);
                    foreach ($tableau as $eleve) {
                        $this->addEleve($eleve[0], $eleve[1], $eleve[2], $eleve[3], $eleve[4], $eleve[5], $eleve[6], $eleve[7], $eleve[8]);
                    }
                    Database::exec('update options set valeur=1 where nom=\'importEleves\'');
                    header('location: ./utilisateurs?type=eleves&importOk');
                    die;
                }
            }
        }
    }

    /*
     * Structure du CSV :
     * email;Nom;Prénom;Annee de scolarite (1,2 ou 3);Rue;Code postal;ville;numéro de téléphone
     * Les lignes se terminent par des sauts de ligne
     */

    private function addEleve($email, $pass, $nom, $prenom, $annee, $rue, $cp, $ville, $tel) {
        $tableClasse = Database::query('select sigle from classes where annee=\'' . $annee . '\'');
        $classe = $_POST['doClasse'] == 'true' ? '\'' . $tableClasse[0][0] . '\'' : 'null';
        Database::exec('insert into eleves (nom,prenom,classe_sigle,mail,mdp,annee,rue,cp,ville,tel) values (\'' . $nom . '\',\'' . $prenom . '\',' . $classe . ',\'' . $email . '\',\'' . password_hash($pass, PASSWORD_DEFAULT) . '\',\'' . $annee . '\',\'' . $rue . '\',\'' . $cp . '\',\'' . $ville . '\',\'' . $tel . '\')');
        $message = '<p style="font-size:12px; font-family:Helvetica,Arial,sans-serif">Bonjour ' . $this->_prenom . ',</p>
                                                                <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Vous avez été inscrit sur ' . _NOM_ . '</p>
                                                                <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Vos identifiants vous sont donc communiqués ci-dessous<br>
                                                                    Lien du site : <a href="' . _URL_ . '" target="_blank">' . _URL_ . '</a><br>
                                                                    Votre e-mail : ' . $email . '<br>
                                                                    Votre mot de passe : ' . $pass . '<br><br><br>
                                                                    Cordialement,<br>
                                                                    ' . _NOM_ . '
                                                                </p>';
        $mail = new Mail($email, 'Nouveau compte utilisateur', $message);
        $mail->creerMail();
        AjoutUser::initDossier($email);
    }

    public function radio() {
        $verif1 = Database::query('select count(sigle) from classes where annee=1');
        $verif2 = Database::query('select count(sigle) from classes where annee=2');
        $verif3 = Database::query('select count(sigle) from classes where annee=3');
        if ($verif1[0][0] > 1 or $verif2[0][0] > 1 or $verif3[0][0] > 1) {
            return '<div class="radio" disabled>
                    <label>
                        <input type="radio" name="doClasse" value="true" disabled>
                        Oui
                    </label>
                </div>
                <div class="radio" disabled>
                    <label>
                        <input type="radio" name="doClasse" value="false" disabled checked>
                        Non
                    </label>
                </div>';
        } else {
            return '<div class="radio">
                    <label>
                        <input type="radio" name="doClasse" value="true" checked>
                        Oui
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="doClasse" value="false">
                        Non
                    </label>
                </div>';
        }
    }

}
