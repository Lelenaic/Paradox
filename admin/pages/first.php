<?php
$first=new First();
$first->cantAccess();
$first->doInsert();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iControl - Première connexion</title>

  <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
  <meta name="robots" content="noindex">

  <!-- Material Design Icons  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Roboto Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

  <!-- Simplebar.js -->
  <link type="text/css" href="assets/vendor/simplebar.css" rel="stylesheet">

  <!-- App CSS -->
  <link type="text/css" href="assets/css/style.min.css" rel="stylesheet">
  <link rel="icon" href="favicon.ico" />
</head>

<body class="login">

  <div class="row">
    <div class="col-sm-10 col-sm-push-1 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
      <h2 class="text-primary center m-a-2">
        <i class="material-icons md-36">remove_red_eye</i> <span class="icon-text">iControl</span>
      </h2>
      <div class="card-group">
        <div class="card">
          <div class="card-block center">
            <h4 class="m-b-0">
                <i class="material-icons">home</i> <span class="icon-text">Bienvenue chez vous !</span><br><br>
            </h4>
              <div class="alert alert-success" role="alert"><strong>Bienvenue sur le panel de gestion iControl !</strong><br>
              Vous êtes désormais inscrit en tant que professeur. Avant de continuer, nous avons néanmoins besoin de quelques informations.</div>
              <form method="post" action="first">
                <div class="form-group">
                  <label>La matière que vous enseignez :</label>
                  <input type="text" class="form-control" placeholder="Mathématiques / Français / Histoire ..." name="matiere" required>
                </div>
                  <div class="form-group">
                    <label>Êtes-vous professeur principal ?</label>
                    <?= $first->getClasses() ?>
                  </div>
                  <button type="submit" class="btn btn-primary"><i class="material-icons">done</i> Valider !</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="assets/vendor/jquery.min.js"></script>

  <!-- Bootstrap -->
  <script src="assets/vendor/tether.min.js"></script>
  <script src="assets/vendor/bootstrap.min.js"></script>

  <!-- Simplebar.js -->
  <script src="assets/vendor/simplebar.min.js"></script>

  <!-- Bootstrap Layout -->
  <script src="assets/vendor/bootstrap-layout.js"></script>

  <!-- Bootstrap Layout Scrollable Extension JS -->
  <script src="assets/vendor/bootstrap-layout-scrollable.js"></script>

</body>

</html>
