<?php $security->mustBeAdmin() ?>
<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="./">iControl</a></li>
            <li class="active">Ajout d'entreprise</li>
        </ol>
        <!-- // END Breadcrumb -->
        
        <!-- Content -->
        
            <?php
            echo $newEntreprise->messages();
            echo $newEntreprise->afficherFormulaire();
            ?>
        
        <!-- ./Content -->
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

<!-- Vendor JS -->
<script src="assets/vendor/jquery.dataTables.js"></script>
<script src="assets/vendor/dataTables.bootstrap.js"></script>

<!-- Initialize -->
<script type="text/javascript">
    $(document).ready( function () {
        $('#users').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    } );
</script>
</body>

</html>