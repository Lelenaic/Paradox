<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard</title>

        <meta name="robots" content="noindex">

        <!-- Material Design Icons  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Roboto Web Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

        <!-- Simplebar.js -->
        <link type="text/css" href="assets/vendor/simplebar.css" rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css" href="assets/css/style.min.css" rel="stylesheet">

        <!-- morris.js Charts CSS -->
        <link rel="stylesheet" href="examples/css/morris.min.css">

        <!-- Datatables & FontAwesome -->
        <link rel="stylesheet" href="examples/css/datatables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

        <!-- Datepicker -->
        <link rel="stylesheet" href="examples/css/bootstrap-datepicker.min.css">

        <link rel="icon" href="favicon.ico" />
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea', language_url: 'assets/fr_FR.js', height: 300, plugins: 'autolink link image lists charmap print preview autosave table code'});</script>
    </head>

    <body class="layout-container ls-top-navbar layout-sidebar-l3-md-up">

        <!-- Navbar -->
        <nav class="navbar navbar-light bg-white navbar-full navbar-fixed-top ls-left-sidebar">

            <!-- Sidebar toggle -->
            <button class="navbar-toggler pull-xs-left hidden-lg-up" type="button" data-toggle="sidebar" data-target="#sidebarLeft"><span class="material-icons">menu</span></button>

            <!-- Brand -->
            <?php
            $menu = new Menu();
            echo $menu->nomPage($page);
            ?>

            <!-- Search
            <form class="form-inline pull-xs-left hidden-sm-down">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Chercher un élève ...">
                    <span class="input-group-btn"><button class="btn" type="button"><i class="material-icons">search</i></button></span>
                </div>
            </form>
            <!-- // END Search -->

            <!-- Menu -->
            <ul class="nav navbar-nav pull-xs-right hidden-md-down">
                <!-- User dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false">
                        <img src="<?= Utilitaires::img() ?>" alt="Avatar" class="img-circle" width="40">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
                        <a data-toggle="modal" data-target="#modalAppointments" class="dropdown-item" href="#"><i class="material-icons md-18">lock</i> <span class="icon-text">Changer de mot de passe</span></a>
                        <a class="dropdown-item" href="./index?logout">Déconnexion</a>
                    </div>
                </li>
                <!-- // END User dropdown -->

            </ul>
            <!-- // END Menu -->

        </nav>
        <!-- // END Navbar -->

        <!-- Sidebar -->
        <div class="sidebar sidebar-left sidebar-size-3 sidebar-visible-md-up sidebar-dark bg-primary" id="sidebarLeft" data-scrollable>

            <!-- Brand -->
            <a href="index" class="sidebar-brand sidebar-brand-border sidebar-brand-bg m-b-0">
                <i class="material-icons">remove_red_eye</i> iControl
            </a>

            <!-- User -->

            <!-- // END User -->
            <?php
            echo $menu->afficherUser();
            ?>
            <!-- Menu -->
            <?php
            echo $menu->afficherMenu();
            ?>
            <!-- // END Menu -->

            <!-- Stats -->
            <div class="sidebar-stats">
                <div class="sidebar-stats-lead text-primary">
                    <span>0</span>
                </div>
                <small>Elèves ayant un stage</small>
            </div>
            <!-- // END Stats -->

        </div>
        <!-- // END Sidebar -->

        <!-- Right Sidebars -->
        <!-- Modal changement de mot de passe -->
        <div class="modal fade" id="modalAppointments">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="m-b-0 center">Changer de mot de passe</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="./">
                            <div class="form-group row">
                                <label class="control-label">Ancien mot de passe :</label>
                                <input type="password" name="oldPass" class="form-control" required>
                            </div>
                            <div class="form-group row">
                                <label class="control-label">Nouveau mot de passe :</label>
                                <input type="password" name="newPass" class="form-control" required>
                            </div>
                            <div class="form-group row">
                                <label class="control-label">Confirmez :</label>
                                <input type="password" name="confPass" class="form-control" required>
                            </div>
                            <div class="center">
                                <button type="submit" class="btn btn-primary">Changer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
