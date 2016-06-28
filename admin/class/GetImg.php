<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetImg
 *
 * @author lelenaic
 */
class GetImg {

    private $_mail;

    public function __construct() {
        $this->_mail = isset($_GET['mail']) ? $_GET['mail'] : die('Aucun mail ...');
    }

    public function returnImg() {
        $type = $this->getTypeFromMail($this->_mail);
        if (!$type) {
            if ($this->_mail == 'default') {
                return _URL_ . 'admin/images/users/default.png';
            } else {
                die('Mail incorrect !');
            }
        }
        $img = Database::query('select img from ' . $type . ' where mail=\'' . $this->_mail . '\'');
        if (file_exists('../html/images/users/' . $img[0][0]) and $img[0][0]!='' and !is_null($img[0][0])) {
            return _URL_ . 'admin/images/users/' . $img[0][0];
        }else{
            return _URL_ . 'admin/images/users/default.png';
        }
    }

    private function getTypeFromMail($mail) {
        $verif = Database::query('select id from eleves where mail=\'' . $mail . '\'');
        $verifProf = Database::query('select id from profs where mail=\'' . $mail . '\'');
        $verifEnt = Database::query('select id from entreprises where mail=\'' . $mail . '\'');
        if (isset($verif[0][0])) {
            return 'eleves';
        } elseif (isset($verifProf[0][0])) {
            return 'profs';
        } elseif (isset($verifEnt[0][0])) {
            return 'entreprises';
        } else {
            return false;
        }
    }

}
