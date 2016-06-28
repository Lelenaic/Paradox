<?php $security->mustBeAdmin() ?>
<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">

        <ol class="breadcrumb">
            <li><a href="./">iControl</a></li>
            <li class="active">Articles</li>
        </ol>
        <div class="row m-b-1">
            <div class="col-md-6">
                <div class="card card-stats-primary">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="material-icons text-primary md-36">query_builder</i>
                            </div>
                            <div class="media-body media-middle">
                                <h4 class="card-title m-b-0">
                                    <strong class="text-primary"><?= $articles->getNbActifs(); ?></strong> Article(s) actif(s)
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-stats-success">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="material-icons text-success md-36">done_all</i>
                            </div>
                            <div class="media-body media-middle">
                                <h4 class="card-title m-b-0">
                                    <strong class="text-success"><?= $articles->getNbTotal(); ?></strong> Article(s) au total
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Liste des articles</span> <a href="./ajouter_article" class="btn btn-primary btn-rounded-deep m-l-1">Nouveau <i class="material-icons">add</i></a></h3>
            </div>
        </div>
        <?= $articles->messages() ?>

        <div class="card">
            <ul class="list-group list-group-fit">
                <?= $articles->afficherArticles() ?>
            </ul>
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

<!-- Tooltip -->
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</body>

</html>
