<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li><a class="active">iControl</a></li>
        </ol>
        <?= $dash->messages() ?>
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        <p class="text-muted pull-xs-right"><?= $dash->diskSpace() ?></p>
                        <h5 class="m-b-1"><i class="material-icons">storage</i> <span class="icon-text">Espace disque</span></h5>
                        <progress class="progress progress-animated progress-primary m-a-0" value="<?= $dash->getStats() ?>" max="100"></progress>
                    </div>
                </div>
            </div>
            <!-- // END Column -->
            <?= $dash->serverLoad() ?>
            <!-- Column -->
            <!-- // END Column -->

        </div>
        <!-- // END Row -->

        <!-- Row -->
        <div class="row">

            <!-- Column -->
            <div class="col-md-8">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="history-tab" data-toggle="tab" href="#history">
                                <i class="material-icons">warning</i> <span class="icon-text">Incidents</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="customers-tab" data-toggle="tab" href="#customers">
                                <i class="material-icons">person_add</i> <span class="icon-text">Sign Ups</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="history">
                            <ul class="list-group list-group-fit">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="material-icons md-36 text-muted">receipt</i>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-a-0">
                                                <a href="#">Sam</a> added a new invoice <a href="#">#9591</a>
                                            </p>
                                            <small class="text-muted">
                                                <i class="material-icons md-18">timer</i> <span class="icon-text">5 hrs ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="material-icons md-36 text-muted">dns</i>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-a-0">
                                                <a href="#">John</a> created a new <a href="#">task</a>
                                            </p>
                                            <small class="text-muted">
                                                <i class="material-icons md-18">today</i> <span class="icon-text">1 day ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left media-middle">
                                            <i class="material-icons md-36 text-muted">group</i>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-a-0">
                                                <a href="#">Partick</a> added <a href="#">Sam</a> are now friends.
                                            </p>
                                            <small class="text-muted">
                                                <i class="material-icons md-18">today</i> <span class="icon-text">2 days ago</span>
                                            </small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="customers">
                            <table class="table  m-b-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th width="120" class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#"> Derek S.</a></td>
                                        <td>Reel Ltd.</td>
                                        <td class="text-xs-center">
                                            <a href="#" class="btn btn-white btn-sm">
                                                <i class="material-icons md-18">edit</i>
                                            </a>
                                            <a href="#" class="btn btn-white btn-sm">
                                                <i class="material-icons md-18">email</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"> Paul M.</a></td>
                                        <td>Places Ltd.</td>
                                        <td class="text-xs-center">
                                            <a href="#" class="btn btn-white btn-sm">
                                                <i class="material-icons md-18">edit</i>
                                            </a>
                                            <a href="#" class="btn btn-white btn-sm">
                                                <i class="material-icons md-18">email</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"> John D.</a></td>
                                        <td>Woot Ltd.</td>
                                        <td class="text-xs-center">
                                            <a href="#" class="btn btn-white btn-sm">
                                                <i class="material-icons md-18">edit</i>
                                            </a>
                                            <a href="#" class="btn btn-white btn-sm">
                                                <i class="material-icons md-18">email</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">Amy T.</a></td>
                                        <td>Scoop Ltd.</td>
                                        <td class="text-xs-center">
                                            <a href="#" class="btn btn-white btn-sm">
                                                <i class="material-icons md-18">edit</i>
                                            </a>
                                            <a href="#" class="btn btn-white btn-sm">
                                                <i class="material-icons md-18">email</i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-button-wrapper">
                        <div class="dropdown">
                            <a href="#" class="card-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <h5 class="card-title">Current Stats</h5>
                        <p class="card-subtitle">Quick summary of this month's activity</p>

                        <div id="stats" style="height:240px;"></div>
                    </div>
                </div>

            </div>
            <!-- // END Column -->

            <!-- Column -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="card-title">Gestion générale</h5>
                            </div>
                            <div class="media-right media-middle">
                                <i class="material-icons">build</i>
                            </div>
                        </div>
                    </div>
                    <table class="table table-md m-a-0">
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="import_eleves">Import des élèves </a>
                            </td>
                            <td class="right">
                                <?= $dash->importEleves() ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="affectation_eleves">Attribution des classes</a>
                            </td>
                            <td class="right">
                                <?= $dash->attributionClasses() ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class="btn btn-primary">Attribution des profs</button>
                            </td>
                            <td class="right">
                                <?= $dash->attributionProfs() ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="media">
                            <div class="media-body media-middle">
                                <h5 class="card-title m-b-0">Todo's</h5>
                            </div>
                            <div class="media-right media-middle">
                                <a href="#" class="btn btn-white">
                                    <i class="material-icons">add</i> <span class="icon-text">Add</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="c-inputs-stacked">
                            <label class="c-input c-checkbox">
                                <input type="checkbox">
                                <span class="c-indicator"></span> Admin Plus in Ruby on Rails
                            </label>
                            <label class="c-input c-checkbox">
                                <input type="checkbox">
                                <span class="c-indicator"></span> Create a Map UI
                            </label>
                            <label class="c-input c-checkbox">
                                <input type="checkbox">
                                <span class="c-indicator"></span> Extend Timeline with Chat
                            </label>
                            <label class="c-input c-checkbox">
                                <input type="checkbox" checked>
                                <span class="c-indicator"></span> Extend Timeline with Chat
                            </label>
                            <label class="c-input c-checkbox">
                                <input type="checkbox" checked>
                                <span class="c-indicator"></span> Refactor Spacings
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="pull-right">
                            <a href="#">Completed <span class="text-muted">(24)</span></a>
                        </div>
                        Pending (3)
                    </div>
                </div>
            </div>
            <!-- // END Column -->

        </div>
        <!-- // END Row -->

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

<!-- Theme Colors -->
<script src="assets/js/colors.js"></script>

<!-- morris.js Charts -->
<script src="assets/vendor/raphael.min.js"></script>
<script src="assets/vendor/morris.min.js"></script>

<!-- Chart.js -->
<script src="assets/vendor/Chart.min.js"></script>

<!-- Init -->
<script src="examples/js/chart.js"></script>
<script src="examples/js/chartjs.js"></script>

</body>

</html>
