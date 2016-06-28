<div class="parallax bg-white page-section">
    <div class="container parallax-layer" data-opacity="true">
        <div class="media v-middle">
            <div class="media-body">
                <h1 class="text-display-2 margin-none">Recherche de stage</h1>
                <p class="text-light lead">Liste de vos recherches de stages</p>
            </div>
        </div>
    </div>
</div>
<?php
$security->mustBeStudent();
$stages=new RechercheStage();
echo $stages->messages();
?>
<div class="container">
    <div class="page-section">
        <div class="row">
            <div class="col-md-9">
                
                <?php
                $stages->afficherStages();
                ?>
                <br/>
                <br/>


            </div>
            <div class="col-md-3">

                <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
                    <div class="panel-heading">
                        <h4 class="panel-title">Actions :</h4>
                    </div>
                    <div class="panel-body">
                        <a href="stages-recherche-ajout"><button type="button" class="btn btn-success"><i class="fa fa-search"></i> Ajouter une recherche</button></a>
                        
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>