<?php
$security->mustBeStudent();
?>
<div class="parallax bg-white page-section">
    <div class="container parallax-layer" data-opacity="true">
        <div class="media v-middle">
            <div class="media-body">
                <h1 class="text-display-2 margin-none">Book professionnel</h1>
                <p class="text-light lead">Lien général : <?= '<a href="'._URL_.'book-pro-public?id='.$_SESSION['id'].'">'._URL_.'book-pro-public?id='.$_SESSION['id'].'</a>' ?></p>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <div class="page-section">
        <div class="row">
            <div class="col-md-9">
                <?php
                echo $files->messages();
                echo $files->remonter();
                echo $files->upload();
                echo $files->boutons();
                ?>
                <div class="row" data-toggle="isotope">
                    <?php
                    echo $files->afficherFichiers();
                    ?>
                    
                    <!-- <div class="item col-xs-12 col-sm-6 col-lg-4">
                        <div class="panel panel-default paper-shadow" data-z="0.5">

                            <div class="cover overlay cover-image-full hover">
                                <span class="img icon-block height-150 bg-default"></span>
                                <a href="website-course.html" class="padding-none overlay overlay-full icon-block bg-default">
                                    <span class="v-center">
                                        <i class="fa fa-github"></i>
                                    </span>
                                </a>

                                <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                    <span class="v-center">
                                        <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                    </span>
                                </a>

                            </div>

                            <div class="panel-body">
                                <h4 class="text-headline margin-v-0-10"><a href="website-course.html">Github Webhooks for Beginners</a></h4>

                            </div>
                            <hr class="margin-none" />
                            <div class="panel-body">

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet commodi delectus, excepturi.</p>



                            </div>

                        </div>
                    </div> -->
                </div>

                <br/>
                <br/>


            </div>
            <div class="col-md-3">

                <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
                    <div class="panel-heading panel-collapse-trigger">
                        <h4 class="panel-title">Category</h4>
                    </div>
                    <div class="panel-body list-group">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge pull-right">120+</span>
                                <a class="list-group-link" href="index.html">Design</a>
                            </li>
                            <li class="list-group-item active">
                                <span class="badge pull-right">30+</span>
                                <a class="list-group-link" href="index.html">Programming</a>
                            </li>
                            <li class="list-group-item">
                                <span class="badge pull-right">40+</span>
                                <a class="list-group-link" href="index.html">WordPress</a>
                            </li>
                            <li class="list-group-item">
                                <span class="badge pull-right">60+</span>
                                <a class="list-group-link" href="index.html">Workflow</a>
                            </li>
                            <li class="list-group-item">
                                <span class="badge pull-right">15+</span>
                                <a class="list-group-link" href="index.html">HTML</a>
                            </li>
                            <li class="list-group-item">
                                <span class="badge pull-right">25+</span>
                                <a class="list-group-link" href="index.html">CSS</a>
                            </li>
                            <li class="list-group-item">
                                <span class="badge pull-right">35+</span>
                                <a class="list-group-link" href="index.html">iOS</a>
                            </li>
                            <li class="list-group-item">
                                <span class="badge pull-right">20+</span>
                                <a class="list-group-link" href="index.html">Free</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default" data-toggle="panel-collapse" data-open="false">
                    <div class="panel-heading panel-collapse-trigger">
                        <h4 class="panel-title">Price</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group input-group margin-none">
                            <div class="row margin-none">
                                <div class="col-xs-6 padding-none">
                                    <input class="form-control" type="text" placeholder="Min .." />
                                </div>
                                <div class="col-xs-6 padding-none">
                                    <input class="form-control" type="text" placeholder="Max .." />
                                </div>
                            </div>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <h4>Featured</h4>
                <div class="slick-basic slick-slider" data-items="1" data-items-lg="1" data-items-md="1" data-items-sm="1" data-items-xs="1">
                    <div class="item">
                        <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                            <div class="panel-body">
                                <div class="media media-clearfix-xs">
                                    <div class="media-left">
                                        <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                            <span class="img icon-block s90 bg-default"></span>
                                            <span class="overlay overlay-full padding-none icon-block s90 bg-default">
                                                <span class="v-center">
                                                    <i class="fa fa-github"></i>
                                                </span>
                                            </span>
                                            <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                                <span class="v-center">
                                                    <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Github Webhooks for Beginners</a></h4>
                                        <p class="small margin-none">
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                            <div class="panel-body">
                                <div class="media media-clearfix-xs">
                                    <div class="media-left">
                                        <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                            <span class="img icon-block s90 bg-primary"></span>
                                            <span class="overlay overlay-full padding-none icon-block s90 bg-primary">
                                                <span class="v-center">
                                                    <i class="fa fa-css3"></i>
                                                </span>
                                            </span>
                                            <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                                <span class="v-center">
                                                    <span class="btn btn-circle btn-primary btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Awesome CSS with LESS Processing</a></h4>
                                        <p class="small margin-none">
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                            <div class="panel-body">
                                <div class="media media-clearfix-xs">
                                    <div class="media-left">
                                        <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                            <span class="img icon-block s90 bg-lightred"></span>
                                            <span class="overlay overlay-full padding-none icon-block s90 bg-lightred">
                                                <span class="v-center">
                                                    <i class="fa fa-windows"></i>
                                                </span>
                                            </span>
                                            <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                                <span class="v-center">
                                                    <span class="btn btn-circle btn-red-500 btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Portable Environments with Vagrant</a></h4>
                                        <p class="small margin-none">
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                            <div class="panel-body">
                                <div class="media media-clearfix-xs">
                                    <div class="media-left">
                                        <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                            <span class="img icon-block s90 bg-brown"></span>
                                            <span class="overlay overlay-full padding-none icon-block s90 bg-brown">
                                                <span class="v-center">
                                                    <i class="fa fa-wordpress"></i>
                                                </span>
                                            </span>
                                            <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                                <span class="v-center">
                                                    <span class="btn btn-circle btn-orange-500 btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading margin-v-5-3"><a href="website-course.html">WordPress Theme Development</a></h4>
                                        <p class="small margin-none">
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                            <div class="panel-body">
                                <div class="media media-clearfix-xs">
                                    <div class="media-left">
                                        <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                            <span class="img icon-block s90 bg-purple"></span>
                                            <span class="overlay overlay-full padding-none icon-block s90 bg-purple">
                                                <span class="v-center">
                                                    <i class="fa fa-jsfiddle"></i>
                                                </span>
                                            </span>
                                            <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                                <span class="v-center">
                                                    <span class="btn btn-circle btn-purple-500 btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Modular JavaScript with Browserify</a></h4>
                                        <p class="small margin-none">
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                            <div class="panel-body">
                                <div class="media media-clearfix-xs">
                                    <div class="media-left">
                                        <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                            <span class="img icon-block s90 bg-default"></span>
                                            <span class="overlay overlay-full padding-none icon-block s90 bg-default">
                                                <span class="v-center">
                                                    <i class="fa fa-cc-visa"></i>
                                                </span>
                                            </span>
                                            <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                                <span class="v-center">
                                                    <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Easy Online Payments with Stripe</a></h4>
                                        <p class="small margin-none">
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                            <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
<?php
echo $files->getModalsDossier();
echo $files->getModalsFichier();
echo $files->getModalsPartage();