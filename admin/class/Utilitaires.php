<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilitaires
 *
 * @author lelenaic
 */
class Utilitaires {

    public static function logout() {
        if (isset($_GET['logout'])) {
            unset($_SESSION['id']);
            unset($_SESSION['userType']);
            unset($_SESSION['admin']);
            unset($_SESSION['tit']);
            unset($_SESSION['first']);
            session_destroy();
            header('location: ./login?deco');
            die;
        }
    }

    public static function mustLogged() {
        if (!isset($_SESSION['id']) || $_SESSION['userType'] != 1) {
            header('location: ../login');
            die;
        }
    }

    public static function redirect($location) {
        echo '<meta http-equiv="refresh" content="0;url=./' . $location . '"/>';
        die;
    }

    public static function dateUS2FR($dateus) {
        $datefr = explode('-', $dateus);
        return $datefr[2] . '/' . $datefr[1] . '/' . $datefr[0];
    }

    public static function dateFR2US($datefr) {
        $dateus = explode('/', $datefr);
        return $dateus[2] . '-' . $dateus[1] . '-' . $dateus[0];
    }

    public static function urlIncorrect() {
        echo '<meta http-equiv="refresh" content="0;url=./"/>';
        die;
    }

    public static function addLog($logType, $details, $success) {
        $date = date('Y-m-d');
        $heure = date('H:i:s');
        $ip = $_SERVER['REMOTE_ADDR'];
        $id = $_SESSION['id'];
        $type = $_SESSION['userType'];
        Database::exec('insert into logs (user_id,type,date,heure,ip,logType,details,success) values (\'' . $id . '\',\'' . $type . '\',\'' . $date . '\',\'' . $heure . '\',\'' . $ip . '\',\'' . $logType . '\',\'' . $details . '\',\'' . $success . '\')');
    }

    public static function img($id = null, $type = null) {
        if (is_null($id)) {
            if (isset($_SESSION['id'])) {
                $id=$_SESSION['id'];
                $type=self::getUserType($_SESSION['userType'], true);
            }else{
                return substr(file_get_contents(_URL_ . 'admin/getImg?mail=default'), 3);
            }
        }
        $id = is_null($id) ? $_SESSION['id'] : $id;
        $type = is_null($type) ? self::getUserType($_SESSION['userType'], true) : $type;
        $mail = Database::query('select mail from ' . $type . ' where id=' . $id);
        if (!file_get_contents(_URL_ . 'admin/getImg?mail=' . $mail[0][0])) {
            return substr(file_get_contents(_URL_ . 'admin/getImg?mail=default'), 3);
        } else {
            return substr(file_get_contents(_URL_ . 'admin/getImg?mail=' . $mail[0][0]), 3);
        }
    }

    public static function getUserType($type, $bdd = false) {
        if ($type == 0) {
            if ($bdd) {
                return 'eleves';
            } else {
                return 'Elève';
            }
        } elseif ($type == 1) {
            if ($bdd) {
                return 'profs';
            } else {
                return 'Professeur';
            }
        } else {
            if ($bdd) {
                return 'entreprises';
            } else {
                return 'Entrepreneur';
            }
        }
    }

}
