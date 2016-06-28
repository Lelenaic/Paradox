<?php $security->mustBeAdmin() ?>
<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li><a href="./">iControl</a></li>
            <li class="active">Edition d'entreprise</li>
        </ol>
        <!-- // END Breadcrumb -->
        
        <!-- Content -->
        
            <?php
            echo $editArticle->afficherFormulaire();
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

<!-- Vendor JS -->
<script src="assets/vendor/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendor/bootstrap-datepicker.min.js"></script>
<script src="assets/vendor/bootstrap-timepicker.js"></script>

<!-- Langue -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/locales/bootstrap-datepicker.fr.min.js"></script>

<!-- Initialize -->
<script type="text/javascript">
    $(document).ready( function () {
        $('#users').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
        });
    } );

    $('.datepicker').datepicker({
        todayBtn: "linked",
        clearBtn: true,
        language: "fr",
        orientation: "bottom auto",
        todayHighlight: true
    });
</script>




</body>

</html>