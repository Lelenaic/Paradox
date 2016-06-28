<?php
$dash = new Dashboard();
echo $dash->afficherProfil();
$dash->isProf();
?>

<div class="container">

    <div class="page-section">
        <div class="row">

            <div class="col-md-9">


                <?= $dash->afficherAlerteAnnee() ?>

                <div class="row" data-toggle="isotope">
                    <div class="item col-xs-12 col-lg-6">
                        <div class="panel panel-default paper-shadow" data-z="0.5">
                            <div class="panel-heading">
                                <h4 class="text-headline margin-none">Courses</h4>
                                <p class="text-subhead text-light">Your recent courses</p>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item media v-middle">
                                    <div class="media-body">
                                        <a href="website-take-course.html" class="text-subhead list-group-link">Basics of HTML</a>
                                    </div>
                                    <div class="media-right">
                                        <div class="progress progress-mini width-100 margin-none">
                                            <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:45%;">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item media v-middle">
                                    <div class="media-body">
                                        <a href="website-take-course.html" class="text-subhead list-group-link">Angular in Steps</a>
                                    </div>
                                    <div class="media-right">
                                        <div class="progress progress-mini width-100 margin-none">
                                            <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%;">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item media v-middle">
                                    <div class="media-body">
                                        <a href="website-take-course.html" class="text-subhead list-group-link">Bootstrap Foundations</a>
                                    </div>
                                    <div class="media-right">
                                        <div class="progress progress-mini width-100 margin-none">
                                            <div class="progress-bar progress-bar-green-300" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%;">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="panel-footer text-right">
                                <a href="website-student-courses.html" class="btn btn-white paper-shadow relative" data-z="0" data-hover-z="1" data-animated> View all</a>
                            </div>
                        </div>
                    </div>
                    <div class="item col-xs-12 col-lg-6">
                        <div class="panel panel-default paper-shadow" data-z="0.5">
                            <div class="panel-body">
                                <h4 class="text-headline margin-none">Rewards</h4>
                                <p class="text-subhead text-light">Your latest achievements</p>
                                <div class="icon-block half img-circle bg-purple-300">
                                    <i class="fa fa-star text-white"></i>
                                </div>
                                <div class="icon-block half img-circle bg-indigo-300">
                                    <i class="fa fa-trophy text-white"></i>
                                </div>
                                <div class="icon-block half img-circle bg-green-300">
                                    <i class="fa fa-mortar-board text-white"></i>
                                </div>
                                <div class="icon-block half img-circle bg-orange-300">
                                    <i class="fa fa-code-fork text-white"></i>
                                </div>
                                <div class="icon-block half img-circle bg-red-300">
                                    <i class="fa fa-diamond text-white"></i>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default paper-shadow" data-z="0.5">
                            <div class="panel-heading">
                                <h4 class="text-headline">Certificates <small>(4)</small></h4>
                            </div>
                            <div class="panel-body">
                                <a class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of Certificate">
                                    <i class="fa fa-file-text"></i>
                                </a>
                                <a class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of Certificate">
                                    <i class="fa fa-file-text"></i>
                                </a>
                                <a class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of Certificate">
                                    <i class="fa fa-file-text"></i>
                                </a>
                                <a class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of Certificate">
                                    <i class="fa fa-file-text"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item col-xs-12 col-lg-6">
                        <div class="panel panel-default paper-shadow" data-z="0.5">
                            <div class="panel-heading">
                                <h4 class="text-headline margin-none">Quizzes</h4>
                                <p class="text-subhead text-light">Your recent performance</p>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item media v-middle">
                                    <div class="media-body">
                                        <h4 class="text-subhead margin-none">
                                            <a href="website-take-quiz.html" class="list-group-link">Title of quiz goes here?</a>
                                        </h4>
                                        <div class="caption">
                                            <span class="text-light">Course:</span>
                                            <a href="website-take-course.html">Basics of HTML</a>
                                        </div>
                                    </div>
                                    <div class="media-right text-center">
                                        <div class="text-display-1">5.8</div>
                                        <span class="caption text-light">Good</span>
                                    </div>
                                </li>
                                <li class="list-group-item media v-middle">
                                    <div class="media-body">
                                        <h4 class="text-subhead margin-none">
                                            <a href="website-take-quiz.html" class="list-group-link">Directives & Routing</a>
                                        </h4>
                                        <div class="caption">
                                            <span class="text-light">Course:</span>
                                            <a href="website-take-course.html">Angular in Steps</a>
                                        </div>
                                    </div>
                                    <div class="media-right text-center">
                                        <div class="text-display-1 text-green-300">9.8</div>
                                        <span class="caption text-light">Great</span>
                                    </div>
                                </li>
                                <li class="list-group-item media v-middle">
                                    <div class="media-body">
                                        <h4 class="text-subhead margin-none">
                                            <a href="website-take-quiz.html" class="list-group-link">Responsive & Retina</a>
                                        </h4>
                                        <div class="caption">
                                            <span class="text-light">Course:</span>
                                            <a href="website-take-course.html">Bootstrap Foundations</a>
                                        </div>
                                    </div>
                                    <div class="media-right text-center">
                                        <div class="text-display-1 text-red-300">3.4</div>
                                        <span class="caption text-light">Failed</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="panel-footer">
                                <a href="website-student-quizzes.html" class="btn btn-primary paper-shadow relative" data-z="0" data-hover-z="1" data-animated> Go to Results</a>
                            </div>
                        </div>
                    </div>
                    <div class="item col-xs-12 col-lg-6">
                        <h4 class="text-headline margin-none">Forum Activity</h4>
                        <p class="text-subhead text-light">Latest forum topics & comments</p>
                        <ul class="list-group relative paper-shadow" data-hover-z="0.5" data-animated>
                            <li class="list-group-item paper-shadow">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="images/people/110/guy-3.jpg" alt="person" class="img-circle width-40"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="website-forum-thread.html" class="text-subhead link-text-color">Can someone help me with AngularJS?</a>
                                        <div class="text-light">
                                            Topic: <a href="website-forum-category.html">AngularJS</a> &nbsp;
                                            By: <a href="#">Adrian Demian</a>
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <div class="width-60 text-right">
                                            <span class="text-caption text-light">1 hr ago</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item paper-shadow">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="images/people/110/guy-6.jpg" alt="person" class="img-circle width-40"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="website-forum-thread.html" class="text-subhead link-text-color">Can someone help me with AngularJS?</a>
                                        <div class="text-light">
                                            Topic: <a href="website-forum-category.html">AngularJS</a> &nbsp;
                                            By: <a href="#">Adrian Demian</a>
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <div class="width-60 text-right">
                                            <span class="text-caption text-light">2 hrs ago</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item paper-shadow">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="images/people/110/guy-5.jpg" alt="person" class="img-circle width-40"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="website-forum-thread.html" class="text-subhead link-text-color">Can someone help me with AngularJS?</a>
                                        <div class="text-light">
                                            Topic: <a href="website-forum-category.html">AngularJS</a> &nbsp;
                                            By: <a href="#">Adrian Demian</a>
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <div class="width-60 text-right">
                                            <span class="text-caption text-light">3 hr ago</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item paper-shadow">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="images/people/110/guy-4.jpg" alt="person" class="img-circle width-40"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="website-forum-thread.html" class="text-subhead link-text-color">Can someone help me with AngularJS?</a>
                                        <div class="text-light">
                                            Topic: <a href="website-forum-category.html">AngularJS</a> &nbsp;
                                            By: <a href="#">Adrian Demian</a>
                                        </div>
                                    </div>
                                    <div class="media-right">
                                        <div class="width-60 text-right">
                                            <span class="text-caption text-light">4 hr ago</span>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>


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
                            <li class="list-group-item active"><a class="link-text-color" href="website-student-dashboard.html">Dashboard</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-student-courses.html">My Courses</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-student-profile.html">Profile</a></li>
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