<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pass
 *
 * @author lelenaic
 */
class Pass {

    private $_user;
    private $_token;
    private $_mdp;
    private $_confirm;

    public function setGetToken() {
        $this->_token = isset($_GET['token']) ? $_GET['token'] : '';
    }

    private function verifyToken() {
        $date = date('Y-m-d');
        $verif = Database::query('select count(id) from passReset where token=\'' . $this->_token . '\' and date=\'' . $date . '\'');
        if (!$verif[0][0] == 1) {
            die('Le Token n\'existe pas ou a expir&eacute; !');
        }
    }

    public function getToken() {
        return $this->_token;
    }

    public function doChange() {
        if (isset($_GET['token'])) {
            $this->verifyToken();
            if (isset($_POST['mdp'])) {
                $this->setMdp();
                $this->token();
            }
        } else {
            die('Aucun Token n\'est donn&eacute; !');
        }
    }

    private function setMdp() {
        $this->_mdp = $_POST['mdp'];
        $this->_confirm = $_POST['confirm'];
    }

    public function token() {
        if ($this->_mdp == $this->_confirm) {
            $this->verifyToken();
            $mdp = password_hash($this->_mdp, PASSWORD_DEFAULT);
            $userInfos = Database::query('select user_id,user_type from passReset where token=\'' . $this->_token . '\'');
            Database::exec('delete from passReset where token=\'' . $this->_token . '\'');
            Database::exec('update ' . $userInfos[0][1] . ' set mdp=\'' . $mdp . '\' where id=\'' . $userInfos[0][0] . '\'');
            header('location: ./login?changeOk');
        } else {
            header('location: ./recovery?token=' . $this->_token . '&doubleMdp');
        }
    }

    public function doInsert() {
        if (isset($_POST['mail'])) {
            self::newToken($_POST['mail']);
        }
    }

    public static function newToken($mail) {
        $type = User::getTypeFromMail($mail);   
        if ($type != false) {
            $userId = Database::query('select id,prenom from ' . $type . ' where mail=\'' . $mail . '\'');
            $token = bin2hex(random_bytes(60));
            $date = date('Y-m-d');
            $heure=date('H:i:s');
            //Database::exec('delete from passReset where token=\'' . $this->_token . '\'');
            Database::exec('insert into passReset (user_id,user_type,token,date,heure) values (\'' . $userId[0][0] . '\',\'' . $type . '\',\'' . $token . '\',\'' . $date . '\',\'' . $heure . '\')');
            $message = '<p style="font-size:12px; font-family:Helvetica,Arial,sans-serif">Bonjour ' . $userId[0][1] . ',</p>
                        <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Vous avez demandé un nouveau mot de passe</p>
                        <p style="font-size:12px; line-height:20px; font-family:Helvetica,Arial,sans-serif">Afin de créer un nouveau mot de passe, merci de cliquer sur le lien ci-dessous :<br>
                            Recréez votre mot de passe : <a href="'._URL_.'recovery?token='.$token.'" target="_blank">Cliquez ici !</a><br>
                            Le lien est valide deux heures.<br>
                            <small>Si vous n\'avez pas demandé de nouveau mot de passe, merci d\'ignorer ce message.</small><br><br><br>
                            Cordialement,<br>
                            '._NOM_.'
                        </p>';
            $mail = new Mail($mail, 'Nouveau mot de passe', $message);
            $mail->creerMail();
            header('location: ./login?resetSend');
            die;
        } else {
            header('location: ./login?mail');
        }
    }

}
