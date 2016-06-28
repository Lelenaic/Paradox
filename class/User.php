<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateurs
 *
 * @author lelenaic
 */
class User {

    private $_mail;
    private $_mdp;
    private $_id;
    private $_nom;
    private $_prenom;

    public function messages() {
        if (isset($_GET['mail'])) {
            return '<div class="alert alert-warning" role="alert">Hum, il semblerait que votre mail n\'existe pas ...</div>';
        } elseif (isset($_GET['resetSend'])) {
            return '<div class="alert alert-info" role="alert">Un e-mail vous a été envoyé avec les instructions pour recréer un mot de passe.</div>';
        } elseif (isset($_GET['changeOk'])) {
            return '<div class="alert alert-success" role="alert">Vous pouvez maintenant vous connecter avec votre nouveau mot de passe.</div>';
        } elseif (isset($_GET['doubleMdp'])) {
            return '<div class="alert alert-warning" role="alert">Les mots de passe ne correspondent pas.</div>';
        } elseif (isset($_GET['deco'])) {
            return '<div class="alert alert-success" role="alert"><strong>Vous avez bien été déconnecté !</strong></div>';
        } elseif (isset($_GET['erreur'])) {
            return '<div class="alert alert-danger" role="alert">Vous identifiants sont incorrects ...</div>';
        } elseif (isset($_GET['expired'])) {
            return '<div class="alert alert-warning" role="alert">Votre session a expiré, merci de vous reconnecter.</div>';
        }
    }

    private function setAtt() {
        if (isset($_SESSION['userType'])) {
            $type = self::getUserType(true);
            $this->_id = $_SESSION['id'];
            $infos = Database::query('select nom,prenom from ' . $type . ' where id=' . $this->_id);
            $this->_nom = $infos[0][0];
            $this->_prenom = $infos[0][1];
        }
    }

    public function monStage() {
        $verif = Database::query('select count(id) from stages where valide=1');
        if ($verif[0][0] == 1) {
            return '<li><a href="stage">Mon stage</a></li>';
        } else {
            return '<li><a href="stages-recherche-liste">Liste des recherches</a></li>';
        }
    }

    public function isLogged() {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function doLogin($page) {
        if ($page == 'index') {
            if (isset($_SESSION['mailLogin']) and isset($_SESSION['guardOk'])) {
                $this->_mail = $_SESSION['mailLogin'];
                $this->_mdp = $_SESSION['mdpLogin'];
                unset($_SESSION['mailLogin']);
                unset($_SESSION['mdpLogin']);
                $this->login();
            } elseif (isset($_POST['mailLogin'])) {
                $this->_mail = $_POST['mailLogin'];
                $this->_mdp = $_POST['mdpLogin'];
                $this->login();
            }
        }
    }

    private function login() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d');
        if (!isset($_SESSION['guardOk'])) {
            $paraGuard = new ParaGuard();
            $co=$paraGuard->hasGuard($this->_mail, $this->_mdp);
            if (!$co) {
                die;
            }
        }
        unset($_SESSION['guardOk']);
        $verif = Database::query('select id,mdp from eleves where mail=\'' . $this->_mail . '\'');
        $verif[0][1] = $verif[0][1] != '' ? $verif[0][1] : '';
        if (password_verify($this->_mdp, $verif[0][1])) {
            $_SESSION['id'] = $verif[0][0];
            $_SESSION['userType'] = 0;
            $_SESSION['admin'] = 0;
            $_SESSION['ip'] = $ip;
            Database::exec('insert into logs_co (user_id,type,date,ip) values (\'' . $verif[0][0] . '\',\'eleves\',\'' . $date . '\',\'' . $ip . '\')');
        } else {
            $verif = Database::query('select id,mdp,admin,tit,matiere from profs where mail=\'' . $this->_mail . '\'');
            $verif[0][1] = $verif[0][1] != '' ? $verif[0][1] : '';
            if (password_verify($this->_mdp, $verif[0][1])) {
                $_SESSION['id'] = $verif[0][0];
                $_SESSION['userType'] = 1;
                $_SESSION['admin'] = $verif[0][2];
                $_SESSION['tit'] = $verif[0][3];
                $_SESSION['first'] = is_null($verif[0][4]) ? true : false;
                $_SESSION['ip'] = $ip;
                Database::exec('insert into logs_co (user_id,type,date,ip) values (\'' . $verif[0][0] . '\',\'profs\',\'' . $date . '\',\'' . $ip . '\')');
            } else {
                $verif = Database::query('select id,mdp from entreprises where mail=\'' . $this->_mail . '\'');
                $verif[0][1] = $verif[0][1] != '' ? $verif[0][1] : '';
                if (password_verify($this->_mdp, $verif[0][1])) {
                    $_SESSION['id'] = $verif[0][0];
                    $_SESSION['userType'] = 2;
                    $_SESSION['admin'] = 0;
                    $_SESSION['ip'] = $ip;
                    Database::exec('insert into logs_co (user_id,type,date,ip) values (\'' . $verif[0][0] . '\',\'stages\',\'' . $date . '\',\'' . $ip . '\')');
                } else {
                    header('location: ./login?erreur');
                }
            }
        }
        header('location: ./index');
        die;
    }

    public function isAdmin() {
        if (isset($_SESSION['admin']) and @ $_SESSION['admin'] == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUserType($bdd = null) {
        if ($_SESSION['userType'] == 0) {
            if (isset($bdd)) {
                return 'eleves';
            } else {
                return 'Elève';
            }
        } elseif ($_SESSION['userType'] == 1) {
            if (isset($bdd)) {
                return 'profs';
            } else {
                return 'Professeur';
            }
        } else {
            if (isset($bdd)) {
                return 'entreprises';
            } else {
                return 'Entrepreneur';
            }
        }
    }

    public static function getTypeFromMail($mail) {
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

    public function menu() {
        $this->setAtt();
        switch (isset($_SESSION['userType']) ? $_SESSION['userType'] : -1) {
            case 0:
                $html = '<div class="collapse navbar-collapse" id="main-nav">
                        <ul class="nav navbar-nav navbar-nav-margin-left">
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stages <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                ' . $this->monStage() . '
                                <li><a href="tutors">Tutors</a></li>
                                <li><a href="survey">Survey</a></li>
                                <li><a href="website-forum">Forum Home</a></li>
                                <li><a href="website-forum-category">Forum Category</a></li>
                                <li><a href="website-forum-thread">Forum Thread</a></li>
                                <li><a href="website-blog">Blog Listing</a></li>
                                <li><a href="website-blog-post">Blog Post</a></li>
                                <li><a href="website-contact">Contact</a></li>
                            </ul>
                        </li>
                        <li><a href="book-pro-files">Book pro</a></li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="website-student-dashboard">Dashboard</a></li>
                                <li><a href="website-student-courses">My Courses</a></li>
                                <li><a href="website-take-course">Take Course</a></li>
                                <li><a href="website-course-forums">Course Forums</a></li>
                                <li><a href="website-take-quiz">Take Quiz</a></li>
                                <li><a href="website-student-messages">Messages</a></li>
                                <li><a href="website-student-profile">Private Profile</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Instructor <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="website-instructor-dashboard">Dashboard</a></li>
                                <li><a href="website-instructor-courses">My Courses</a></li>
                                <li><a href="website-instructor-course-edit-course">Edit Course</a></li>
                                <li><a href="website-instructor-earnings">Earnings</a></li>
                                <li><a href="website-instructor-statement">Statement</a></li>
                                <li><a href="website-instructor-messages">Messages</a></li>
                                <li><a href="website-instructor-profile">Private Profile</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">UI <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="essential-buttons">Buttons</a></li>
                                <li><a href="essential-icons">Icons</a></li>
                                <li><a href="essential-progress">Progress</a></li>
                                <li><a href="essential-grid">Grid</a></li>
                                <li><a href="essential-forms">Forms</a></li>
                                <li><a href="essential-tables">Tables</a></li>
                                <li><a href="essential-tabs">Tabs</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="admin/reporter">Bug reporter</a></li>
                        </ul>
                        <div class="navbar-right">
                            <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
                                <!-- user -->
                                <li class="dropdown user active">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="' . Utilitaires::img() . '" alt="" class="img-circle"/> ' . $this->_nom . ' ' . $this->_prenom . '<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="active"><a href="dashboard"><i class="fa fa-bar-chart-o"></i> Dashboard</a></li>
                                        <li><a href="profil"><i class="fa fa-user"></i> Profil</a></li>
                                        <li><a href="./index?logout"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>';
                break;
            case 1:
                $html = '<div class="collapse navbar-collapse" id="main-nav">
                        <ul class="nav navbar-nav navbar-nav-margin-left">
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index">Home page</a></li>
                                <li><a href="pricing">Pricing</a></li>
                                <li><a href="tutors">Tutors</a></li>
                                <li><a href="survey">Survey</a></li>
                                <li><a href="website-forum">Forum Home</a></li>
                                <li><a href="website-forum-category">Forum Category</a></li>
                                <li><a href="website-forum-thread">Forum Thread</a></li>
                                <li><a href="website-blog">Blog Listing</a></li>
                                <li><a href="website-blog-post">Blog Post</a></li>
                                <li><a href="website-contact">Contact</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="website-directory-grid">Grid Directory</a></li>
                                <li><a href="website-directory-list">List Directory</a></li>
                                <li><a href="website-course">Single Course</a></li>
                            </ul>
                        </li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="website-student-dashboard">Dashboard</a></li>
                                <li><a href="website-student-courses">My Courses</a></li>
                                <li><a href="website-take-course">Take Course</a></li>
                                <li><a href="website-course-forums">Course Forums</a></li>
                                <li><a href="website-take-quiz">Take Quiz</a></li>
                                <li><a href="website-student-messages">Messages</a></li>
                                <li><a href="website-student-profile">Private Profile</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Instructor <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="website-instructor-dashboard">Dashboard</a></li>
                                <li><a href="website-instructor-courses">My Courses</a></li>
                                <li><a href="website-instructor-course-edit-course">Edit Course</a></li>
                                <li><a href="website-instructor-earnings">Earnings</a></li>
                                <li><a href="website-instructor-statement">Statement</a></li>
                                <li><a href="website-instructor-messages">Messages</a></li>
                                <li><a href="website-instructor-profile">Private Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="admin/index"><strong>Administration</strong></a></li>
                        <li class="active"><a href="admin/reporter">Bug reporter</a></li>
                        </ul>
                        <div class="navbar-right">
                            <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
                                <!-- user -->
                                <li class="dropdown user active">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="' . Utilitaires::img() . '" alt="" class="img-circle"/> ' . $this->_nom . ' ' . $this->_prenom . '<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="active"><a href="website-student-dashboard"><i class="fa fa-bar-chart-o"></i> Dashboard</a></li>
                                        <li><a href="website-student-courses"><i class="fa fa-mortar-board"></i> My Courses</a></li>
                                        <li><a href="profile"><i class="fa fa-user"></i> Profil</a></li>
                                        <li><a href="./index?logout"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>';
                break;
            case 2:
                $html = '<div class="collapse navbar-collapse" id="main-nav">
                        <ul class="nav navbar-nav navbar-nav-margin-left">
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index">Home page</a></li>
                                <li><a href="pricing">Pricing</a></li>
                                <li><a href="tutors">Tutors</a></li>
                                <li><a href="survey">Survey</a></li>
                                <li><a href="website-forum">Forum Home</a></li>
                                <li><a href="website-forum-category">Forum Category</a></li>
                                <li><a href="website-forum-thread">Forum Thread</a></li>
                                <li><a href="website-blog">Blog Listing</a></li>
                                <li><a href="website-blog-post">Blog Post</a></li>
                                <li><a href="website-contact">Contact</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="website-directory-grid">Grid Directory</a></li>
                                <li><a href="website-directory-list">List Directory</a></li>
                                <li><a href="website-course">Single Course</a></li>
                            </ul>
                        </li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="website-student-dashboard">Dashboard</a></li>
                                <li><a href="website-student-courses">My Courses</a></li>
                                <li><a href="website-take-course">Take Course</a></li>
                                <li><a href="website-course-forums">Course Forums</a></li>
                                <li><a href="website-take-quiz">Take Quiz</a></li>
                                <li><a href="website-student-messages">Messages</a></li>
                                <li><a href="website-student-profile">Private Profile</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Instructor <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="website-instructor-dashboard">Dashboard</a></li>
                                <li><a href="website-instructor-courses">My Courses</a></li>
                                <li><a href="website-instructor-course-edit-course">Edit Course</a></li>
                                <li><a href="website-instructor-earnings">Earnings</a></li>
                                <li><a href="website-instructor-statement">Statement</a></li>
                                <li><a href="website-instructor-messages">Messages</a></li>
                                <li><a href="website-instructor-profile">Private Profile</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">UI <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="essential-buttons">Buttons</a></li>
                                <li><a href="essential-icons">Icons</a></li>
                                <li><a href="essential-progress">Progress</a></li>
                                <li><a href="essential-grid">Grid</a></li>
                                <li><a href="essential-forms">Forms</a></li>
                                <li><a href="essential-tables">Tables</a></li>
                                <li><a href="essential-tabs">Tabs</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="admin/reporter">Bug reporter</a></li>
                        </ul>
                        <div class="navbar-right">
                            <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
                                <!-- user -->
                                <li class="dropdown user active">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="' . Utilitaires::img() . '" alt="" class="img-circle"/> Bill<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li class="active"><a href="website-student-dashboard"><i class="fa fa-bar-chart-o"></i> Dashboard</a></li>
                                        <li><a href="website-student-courses"><i class="fa fa-mortar-board"></i> My Courses</a></li>
                                        <li><a href="website-student-profile"><i class="fa fa-user"></i> Profile</a></li>
                                        <li><a href="./index?logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>';
                break;
            default:
                $html = '<div class="navbar-right"><a href="login" class="navbar-btn btn btn-primary">Se connecter</a></div>';
                break;
        }
        return $html;
    }

}
