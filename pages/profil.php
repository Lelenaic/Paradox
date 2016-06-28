<div class="parallax overflow-hidden bg-blue-400 page-section third">
    <div class="container parallax-layer" data-opacity="true">
        <?= $profil->getHeader() ?>
    </div>
</div>

<div class="container">

    <div class="page-section">
        <div class="row">

            <div class="col-md-9">


                <!-- Tabbable Widget -->
                <div class="tabbable paper-shadow relative" data-z="0.5">

                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="website-student-profile.html"><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs">Mon compte</span></a></li>
                        <li><a href="website-student-billing.html"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Détails personnels</span></a></li>
                    </ul>
                    <!-- // END Tabs -->
                    <?= $profil->messages() ?>
                    <!-- Panes -->
                    <div class="tab-content">


                        <div id="account" class="tab-pane active">
                            <?= $profil->afficherFormulaire() ?>
                        </div>




                    </div>
                    <!-- // END Panes -->

                </div>
                <!-- // END Tabbable Widget -->




                <br/>
                <br/>

            </div>
            <div class="col-md-3">

                <div class="panel panel-default" data-toggle="panel-collapse" data-open="true">
                    <div class="panel-heading panel-collapse-trigger">
                        <h4 class="panel-title">My Account</h4>
                    </div>
                    <div class="panel-body list-group">
                        <ul class="list-group list-group-menu">
                            <li class="list-group-item"><a class="link-text-color" href="website-student-dashboard.html">Dashboard</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-student-courses.html">My Courses</a></li>
                            <li class="list-group-item active"><a class="link-text-color" href="website-student-profile.html">Profile</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-student-messages.html">Messages</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="login.html"><span>Logout</span></a></li>
                        </ul>
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