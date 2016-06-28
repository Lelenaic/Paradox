<div class="parallax overflow-hidden bg-blue-400 page-section third">
    <div class="container parallax-layer" data-opacity="true">
        <div class="media v-middle">
            <div class="media-left text-center">
                <a href="#"><img src="images/people/110/guy-1.jpg" alt="people" class="img-circle width-80"/></a>
            </div>
            <div class="media-body">
                <h1 class="text-white text-display-1 margin-v-0">John Doe</h1>
                <p class="text-subhead"><a class="link-white text-underline" href="website-instructor-public-profile.html">View public profile</a></p>
            </div>
            <div class="media-right">
                <span class="label bg-blue-500">Instructor</span>
            </div>
        </div>
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
                        <li><a href="website-instructor-profile.html"><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs">Manage Account</span></a></li>
                        <li class="active"><a href="website-instructor-billing.html"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Billing Details</span></a></li>
                    </ul>
                    <!-- // END Tabs -->

                    <!-- Panes -->
                    <div class="tab-content">




                        <div id="billing" class="tab-pane active">
                            <form action="#" class="form-horizontal">
                                <div class="form-group">
                                    <label for="name" class="col-md-2 control-label">Name on Invoice</label>
                                    <div class="col-md-6">
                                        <div class="form-control-material">
                                            <input type="text" class="form-control used" id="name" value="Adrian Demian">
                                            <label for="name">Name on Invoice</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-md-2 control-label">Address</label>
                                    <div class="col-md-6">
                                        <div class="form-control-material">
                                            <textarea class="form-control used" id="address">Sunny Street 21, MI</textarea>
                                            <label for="address">Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country" class="col-md-2 control-label">Country</label>
                                    <div class="col-md-6">
                                        <select id="country" data-toggle="select2" class="width-100">
                                            <option value="1" selected>USA</option>
                                            <option value="2">Country</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group margin-bottom-none">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn btn-success paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated>Update Billing</button>
                                    </div>
                                </div>
                            </form>
                            <hr/>

                            <div class="media v-middle s-container">
                                <div class="media-body">
                                    <h5 class="text-subhead">Payment details</h5>
                                </div>
                                <div class="media-right">
                                    <a href="#modal-update-credit-card" data-toggle="modal" class="btn btn-white paper-shadow relative" data-animated data-z="0.5" data-hover-z="1">Add Credit Card</a>
                                </div>
                            </div>
                            <div class="list-group margin-none">
                                <div class="list-group-item media v-middle">
                                    <div class="media-left">
                                        <div class="icon-block half img-circle bg-primary">
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="text-title media-heading">
                                            <a href="#modal-update-credit-card" data-toggle="modal" class="link-text-color">**** **** **** 2422</a>
                                        </h4>
                                        <div class="text-caption">updated 1 month ago</div>
                                    </div>
                                    <div class="media-right">
                                        <a href="#modal-update-credit-card" data-toggle="modal" class="btn btn-white btn-flat"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                                    </div>
                                </div>
                                <div class="list-group-item media v-middle">
                                    <div class="media-left">
                                        <div class="icon-block half img-circle bg-grey-100 text-light">
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="text-title media-heading">
                                            <a href="#modal-update-credit-card" data-toggle="modal" class="link-text-color">**** **** **** 3365</a>
                                        </h4>
                                        <div class="text-caption">updated 1 year ago</div>
                                    </div>
                                    <div class="media-right">
                                        <a href="#modal-update-credit-card" data-toggle="modal" class="btn btn-white btn-flat"><i class="fa fa-pencil fa-fw"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- // END Panes -->

                </div>
                <!-- // END Tabbable Widget -->


                <div class="modal grow modal-backdrop-white fade" id="modal-update-credit-card">
                    <div class="modal-dialog modal-sm">
                        <div class="v-cell">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Update Credit Card</h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group form-control-material">
                                            <input type="text" class="form-control" id="credit-card" placeholder="**** **** **** 2422">
                                            <label for="credit-card">Credit Card</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exp">Expiration Date:</label><br/>
                                            <select id="exp" data-toggle="select2">
                                                <option value="1" selected>January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            <select data-toggle="select2">
                                                <option value="2015" selected>2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-control-material">
                                            <input type="text" class="form-control" id="cvv" placeholder="123">
                                            <label for="cvv">CVV</label>
                                        </div>
                                        <button type="submit" class="btn btn-success paper-shadow relative" data-z="0.5" data-hover-z="1" data-animated data-dismiss="modal">Update Credit Card</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-dashboard.html">Dashboard</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-courses.html">My Courses</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-messages.html">Messages</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-earnings.html">Earnings</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-statement.html">Statement</a></li>
                            <li class="list-group-item active"><a class="link-text-color" href="website-instructor-profile.html">Profile</a></li>
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