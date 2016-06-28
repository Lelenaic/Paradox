<?php
$security->mustBeStudent();
$stage=new DetailsStage();
?>
<div class="parallax bg-white page-section">
    <div class="parallax-layer container" data-opacity="true">
        <div class="media v-middle">
            <div class="media-left">
                <span class="icon-block s60 bg-lightred"><i class="fa fa-github correctBug2x"></i></span>
            </div>
            <div class="media-body">
                <h1 class="text-display-1 margin-none"><?= $stage->getHeader() ?></h1>
                <p class="small margin-none">
                    <span class="fa fa-fw fa-star text-yellow-800"></span>
                    <span class="fa fa-fw fa-star text-yellow-800"></span>
                    <span class="fa fa-fw fa-star text-yellow-800"></span>
                    <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                    <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                </p>
            </div>
            <div class="media-right">
                <a class="btn btn-white" href="stages-recherche-liste">Liste des stages</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-8">

            <div class="page-section">
                <?= $stage->afficherStage(); ?>
            </div>

            <div class="page-section">
                <div class="row">
                    <div class="col-md-7">
                        <h2 class="text-headline margin-none">What you'll learn</h2>
                        <p class="text-subhead text-light">A minus obcaecati optio pariatur porro.</p>
                        <ul class="list-group relative paper-shadow" data-hover-z="0.5" data-animated>
                            <li class="list-group-item">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <div class="icon-block s30 bg-red-300 text-white img-circle">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="media-body text-body-2">
                                        Basics of GIT and how to become a STAR.
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item paper-shadow">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <div class="icon-block s30 bg-green-300 text-white img-circle">
                                            <i class="fa fa-database"></i>
                                        </div>
                                    </div>
                                    <div class="media-body text-body-2">
                                        Database connections & some other nice features.
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item paper-shadow">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <div class="icon-block s30 bg-indigo-300 text-white img-circle">
                                            <i class="fa fa-trophy"></i>
                                        </div>
                                    </div>
                                    <div class="media-body text-body-2">
                                        Eaque ex exercitationem quia reprehenderit?
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item paper-shadow">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <div class="icon-block s30 bg-orange-300 text-white img-circle">
                                            <i class="fa fa-code-fork"></i>
                                        </div>
                                    </div>
                                    <div class="media-body text-body-2">
                                        Ab distinctio nemo, provident quia quibusdam ullam.
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item paper-shadow">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <div class="icon-block s30 bg-grey-500 text-white img-circle">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="media-body text-body-2">
                                        Conclusion & Notes.
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-lg-3 col-md-4">

            <div class="page-section">

                <!-- .panel -->
                <?= $stage->panel(); ?>
                <!-- // END .panel -->

                <!-- // END .panel -->

            </div>
            <!-- // END .page-section -->

        </div>
    </div>

</div>
