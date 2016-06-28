<?php
$security->mustBeStudent();
?>
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

                    <!-- Panes -->
                    <div class="tab-content">


                        <div id="course" class="tab-pane active">
                            <?= $ajoutStage->afficherFormulaire() ?>
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
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-dashboard.html">Dashboard</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-courses.html">My Courses</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-messages.html">Messages</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-earnings.html">Earnings</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-statement.html">Statement</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="website-instructor-profile.html">Profile</a></li>
                            <li class="list-group-item"><a class="link-text-color" href="login.html"><span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>