<?php

class Menu{
    private $_admin;
    private $_id;
    
    public function __construct(){
        $this->_admin=$this->isAdmin();
        $this->_id=$this->setId();
    }
    
    private function setId(){
        return $_SESSION['id'];
    }
    
    private function isAdmin(){
        if ($_SESSION['admin']==1) {
            return true;
        }else{
            return false;
        }
    }
    
    public function nomPage($page){
        switch ($page){
            case 'index';
                $nom='Tableau de bord';
                break;
            case 'editer_utilisateur':
                $nom='Edition d\'un utilisateur';
                break;
            case 'editer_entreprise':
                $nom='Edition d\'une entreprise';
                break;
            case 'ajouter_entreprise':
                $nom='Ajouter une entreprise';
                break;
            case 'ajouter_article':
                $nom='Ajout d\'un article';
                break;
            case 'editer_article':
                $nom='Edition d\'un article';
                break;
            case 'ajouter_utilisateur':
                $nom='Ajouter un utilisateur';
                break;
            default:
                $nom=$page;
        }
        return '<p class="navbar-brand first-child-lg">'.$nom.'</p>';
    }
    
    public function afficherMenu(){
        if ($this->isAdmin()) {
            return '<ul class="sidebar-menu sm-bordered sm-active-button-bg" data-toggle="sidebar-collapse">
                <li class="sidebar-menu-item active">
                    <a class="sidebar-menu-button" href="./index">
                        <i class="sidebar-menu-icon material-icons">home</i> Tableau de bord
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="#">
                        <i class="sidebar-menu-icon material-icons">group</i> Utilisateurs
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="./ajouter_utilisateur">Ajouter un utilisateur</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="./utilisateurs?type=eleves">Elèves</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="./utilisateurs?type=profs">Professeurs</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="./utilisateurs?type=stages">Entreprises</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="#">
                        <i class="sidebar-menu-icon material-icons">business_center</i> Entreprises
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="./ajouter_entreprise">Ajouter une entreprise</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="./entreprises">Liste des entreprises</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="#">
                        <i class="sidebar-menu-icon material-icons">assignment</i> <span>Stages</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="stages">Liste</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="#">
                        <i class="sidebar-menu-icon material-icons">format_align_left</i> <span>Articles</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ajouter_article">Ajout</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="articles">Liste</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="#">
                        <i class="sidebar-menu-icon material-icons">list</i> Listes
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="./categories">Catégories d\'entreprises</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="./classes">Classes</a>
                        </li>
                    </ul>
                </li>
            </ul>';
        }else{
            return '<ul class="sidebar-menu sm-bordered sm-active-button-bg" data-toggle="sidebar-collapse">
                <li class="sidebar-menu-item active">
                    <a class="sidebar-menu-button" href="index">
                        <i class="sidebar-menu-icon material-icons">home</i> Dashboard
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="#">
                        <i class="sidebar-menu-icon material-icons">view_compact</i> Layout Options
                        <span class="sidebar-menu-label label label-default">5</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="index">Default</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="layout-fluid-sidebar-light">Sidebar Light</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="layout-fluid-sidebar-multiple">Multiple Sidebars</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="layout-fluid-navbar-colored">Navbar Colored</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="layout-fixed">Fixed Layout</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="#">
                        <i class="sidebar-menu-icon material-icons">tune</i> UI Components
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-buttons">Buttons</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-cards">Cards</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-tabs">Tabs</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-tree">Tree</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-nestable">Nestable</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-notifications">Notifications</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-progress">Progress Bars</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="forms">Forms</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="ui-tables">Tables</span></a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button">Charts</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="calendar">Calendar</span></a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="maps">Filterable Map</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="maps-vector">Vector Maps</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="#">
                        <i class="sidebar-menu-icon material-icons">assignment</i> <span>Pages</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="appointments">Appointments</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="chat">Chat</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="invoice">Invoice</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="learning-dashboard">Learning Dashboard</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="learning-course">Learning Course</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="notes">Notes</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="property">Property</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="tickets">Tickets</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="timeline">Timeline</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="email">Email</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="user-profile">User Profile</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="reports">Reports</a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="login-signup">Login / Sign Up</a>
                        </li>
                    </ul>
                </li>
            </ul>';
        }
    }
    
    public function afficherUser(){
        $user=$this->userInfos();
        return '<a href="user-profile" class="sidebar-link sidebar-user m-b-0">
                <i class="material-icons">person</i> '.$user[0].' '.$user[1].'
            </a>';
    }
    
    public function userInfos(){
        $infos=Database::query('select nom,prenom from profs where id='.$this->_id);
        return $infos[0];
    }
}
