<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ParaGuard
 *
 * @author lelenaic
 */
class ParaGuard {

    private $_mail;
    private $_mdp;
    private $_code;

    public function messages() {
        if (isset($_GET['error'])) {
            return '<div class="alert alert-danger" role="alert">Il semblerait que le code soit faux ou qu\'il ait expiré !<br> Un nouveau code vous a été envoyé par e-mail.</div>';
        } elseif (isset($_SESSION['guardSent'])) {
            unset($_SESSION['guardSent']);
            return '<div class="alert alert-info" role="alert">Un nouveau code de sécurité vient de vous être envoyé par e-mail.</div>';
        }
    }

    public function hasGuard($mail, $mdp) {
        $this->_mail = $mail;
        $this->_mdp = $mdp;
        $_SESSION['mailLogin'] = $this->_mail;
        $_SESSION['mdpLogin'] = $this->_mdp;
        $verif = Database::query('select id,mdp,guard from eleves where mail=\'' . $this->_mail . '\'');
        $verif[0][1] = $verif[0][1] != '' ? $verif[0][1] : '';
        if (password_verify($mdp, $verif[0][1])) {
            if ($verif[0][2]) {
                $this->addGuard($verif[0][0], 0);
                $_SESSION['guardSent'] = true;
                $_SESSION['guardUserId'] = $verif[0][0];
                $_SESSION['guardUserType'] = 0;
                $_SESSION['guardUserMail'] = $this->_mail;
                header('location: ./guard');
                die;
            }
        } else {
            $verif = Database::query('select id,mdp,admin,tit,matiere,guard from profs where mail=\'' . $this->_mail . '\'');
            $verif[0][1] = $verif[0][1] != '' ? $verif[0][1] : '';
            if (password_verify($this->_mdp, $verif[0][1])) {
                if ($verif[0][5]) {
                    $this->addGuard($verif[0][0], 1);
                    $_SESSION['guardSent'] = true;
                    $_SESSION['guardUserId'] = $verif[0][0];
                    $_SESSION['guardUserType'] = 1;
                    $_SESSION['guardUserMail'] = $this->_mail;
                    header('location: ./guard');
                    die;
                }
            } else {
                $verif = Database::query('select id,mdp,guard from entreprises where mail=\'' . $this->_mail . '\'');
                $verif[0][1] = $verif[0][1] != '' ? $verif[0][1] : '';
                if (password_verify($this->_mdp, $verif[0][1])) {
                    if ($verif[0][2]) {
                        $this->addGuard($verif[0][0], 2);
                        $_SESSION['guardSent'] = true;
                        $_SESSION['guardUserId'] = $verif[0][0];
                        $_SESSION['guardUserType'] = 2;
                        $_SESSION['guardUserMail'] = $this->_mail;
                        header('location: ./guard');
                        die;
                    }
                } else {
                    header('location: ./login?erreur');
                    die;
                }
            }
        }
        return true;
    }

    private function addGuard($id, $type) {
        $type = Utilitaires::getUserType($type, true);
        $this->_code = rand(10000, 99999);
        $date = date('Y-m-d');
        $heure = date('H:i:s');
        $email = is_null($this->_mail) ? $_SESSION['guardUserMail'] : $this->_mail;
        Database::exec('delete from guard where user_id=\'' . $_SESSION['guardUserId'] . '\' and type=\'' . Utilitaires::getUserType($_SESSION['guardUserType'], true) . '\'');
        Database::exec('insert into guard (date,heure,code,user_id,type) values (\'' . $date . '\',\'' . $heure . '\',\'' . $this->_code . '\',\'' . $id . '\',\'' . $type . '\')');
        $body = '<p style="font-size:12px; font-family:Helvetica,Arial,sans-serif">Bonjour ' . $email . ',</p>
                                                                <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Suite à votre demande de connexion sur ' . _NOM_ . ', nous vous transmettons votre code ParaGuard ci-dessous.<br>
                                                                    Celui-ci est valable 10 minutes.<br>
                                                                    <h1><strong>' . $this->_code . '</strong></h1><br><br><br>
                                                                    Cordialement,<br>
                                                                    ' . _NOM_ . '
                                                                </p>';
        $mail = new Mail($email, 'Code d\'identification ParaGuard', $body);
        $mail->creerMail();
    }

    public function doLogin($page) {
        if ($page == 'guard' and isset($_POST['guard'])) {
            $code = $_POST['guard'];
            $type = Utilitaires::getUserType($_SESSION['guardUserType'], true);
            $verif = Database::query('select id from guard where code=\'' . $code . '\' and user_id=' . $_SESSION['guardUserId'] . ' and type=\'' . $type . '\'');
            if (isset($verif[0][0])) {
                Database::exec('delete from guard where code=\'' . $_POST['guard'] . '\'');
                unset($_SESSION['guardId']);
                $_SESSION['guardOk'] = true;
                unset($_SESSION['guardUserId']);
                unset($_SESSION['guardUserType']);
                unset($_SESSION['guardUserMail']);
                $user = new User();
                $user->doLogin('index');
                die;
            } else {
                $this->addGuard($_SESSION['guardUserId'], $_SESSION['guardUserType']);
                header('location: ./guard?error');
                die;
            }
        }
    }

}
