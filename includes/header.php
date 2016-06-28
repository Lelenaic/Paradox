<!DOCTYPE html>
<html class="transition-navbar-scroll top-navbar-xlarge bottom-footer js flexbox flexboxlegacy 
      canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb 
      hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize 
      borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns 
      cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent 
      video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?= _NOM_ ?></title>

        <!-- Vendor CSS BUNDLE
        Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
        TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
        <!-- <link href="css/vendor/all.css" rel="stylesheet"> -->



        <!-- Vendor CSS Standalone Libraries
            NOTE: Some of these may have been customized (for example, Bootstrap).
            See: src/less/themes/{theme_name}/vendor/ directory -->
        <link href="css/vendor/bootstrap.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/vendor/picto.css" rel="stylesheet">
        <link href="css/vendor/material-design-iconic-font.css" rel="stylesheet">
        <link href="css/vendor/datepicker3.css" rel="stylesheet">
        <link href="css/vendor/jquery.minicolors.css" rel="stylesheet">
        <link href="css/vendor/railscasts.css" rel="stylesheet">
        <link href="css/vendor/owl.carousel.css" rel="stylesheet">
        <link href="css/vendor/slick.css" rel="stylesheet">
        <link href="css/vendor/daterangepicker-bs3.css" rel="stylesheet">
        <link href="css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet">
        <link href="css/vendor/select2.css" rel="stylesheet">
        <link href="css/vendor/jquery.countdown.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <!-- APP CSS BUNDLE [css/app/app.css]
        INCLUDES:
            - The APP CSS CORE styling required by the "html" module, also available with main.css - see below;
            - The APP CSS STANDALONE modules required by the "html" module;
        NOTE:
            - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
              It was optimised to load only what is actually used by the "html" module;
              Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
              See src/less/themes/html/app.less
        TIP:
            - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
        <!-- <link href="css/app/app.css" rel="stylesheet"> -->


        <!-- App CSS CORE
        This variant is to be used when loading the separate styling modules -->
        <link href="css/app/main.css" rel="stylesheet">


        <!-- App CSS Standalone Modules
            As a convenience, we provide the entire UI framework broke down in separate modules
            Some of the standalone modules may have not been used with the current theme/module
            but ALL modules are 100% compatible -->

        <link href="css/app/essentials.css" rel="stylesheet" />
        <link href="css/app/material.css" rel="stylesheet" />
        <link href="css/app/layout.css" rel="stylesheet" />
        <link href="css/app/sidebar.css" rel="stylesheet" />
        <link href="css/app/sidebar-skins.css" rel="stylesheet" />
        <link href="css/app/navbar.css" rel="stylesheet" />
        <link href="css/app/messages.css" rel="stylesheet" />
        <link href="css/app/media.css" rel="stylesheet" />
        <link href="css/app/charts.css" rel="stylesheet" />
        <link href="css/app/maps.css" rel="stylesheet" />
        <link href="css/app/colors-alerts.css" rel="stylesheet" />
        <link href="css/app/colors-background.css" rel="stylesheet" />
        <link href="css/app/colors-buttons.css" rel="stylesheet" />
        <link href="css/app/colors-text.css" rel="stylesheet" />
        
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea', language_url: 'js/fr_FR.js', height: 300, plugins: 'autolink link image lists charmap print preview autosave table code'});</script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
        WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand navbar-brand-logo">
                        <a class="svg" href="index"><img src="images/logo.png" width="100%" height="100%"></a>
                    </div>
                </div>

                <!-- Menu -->
                <?= $user->menu(); ?>

            </div><!-- /.navbar-collapse -->

        </div>
    </div>