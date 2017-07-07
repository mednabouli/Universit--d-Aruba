<?php
include_once 'scripts/pi-hole/php/common.php';



    // Override layout setting if layout is changed via Settings page
    if(isset($_POST["field"]))
    {
        if($_POST["field"] === "webUI" && isset($_POST["boxedlayout"]))
        {
            $boxedlayout = true;
        }
        elseif($_POST["field"] === "webUI" && !isset($_POST["boxedlayout"]))
        {
            $boxedlayout = false;
        }
    }



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Université d'Aruba Admin</title>
    <!-- Usually browsers proactively perform domain name resolution on links that the user may choose to follow. We disable DNS prefetching here -->
    <meta http-equiv="x-dns-prefetch-control" content="off">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />
    <meta name="theme-color" content="#367fa9">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="img/logo.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo.png">
    <meta name="msapplication-TileColor" content="#367fa9">
    <meta name="msapplication-TileImage" content="img/logo.png">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="style/vendor/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="style/vendor/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="style/vendor/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="style/vendor/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="style/vendor/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link href="style/pi-hole.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" sizes="160x160" href="img/logo.png" />
    <style type="text/css">
        .glow { text-shadow: 0px 0px 5px #fff; }
        h3 { transition-duration: 500ms }
    </style>

    <!--[if lt IE 9]>
    <script src="scripts/vendor/html5shiv.min.js"></script>
    <script src="scripts/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini ">
<!-- JS Warning -->
<div>
    <link rel="stylesheet" type="text/css" href="style/vendor/js-warn.css">
    <input type="checkbox" id="js-hide" />
    <div class="js-warn" id="js-warn-exit"><h1>Javascript Is Disabled</h1><p>Javascript seems to be disabled. This will break some site features.</p>
        <p>To enable Javascript click <a href="http://www.enable-javascript.com/" target="_blank">here</a></p><label for="js-hide">Close</label></div>
</div>
<!-- /JS Warning -->

<script src="scripts/pi-hole/js/header.js"></script>
<!-- Send token to JS -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">Aruba</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Université d'Aruba</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">2</span>
            </a>
            <ul class="dropdown-menu" style="width: 33%;">
              <li>
                <!-- inner menu: contains the actual data -->
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;" id="languages">
                <ul class="menu" style="overflow: hidden; width: 33%; height: auto;">
                  <li><!-- lang item -->
                    <a href="index.php?lang=fr"><img src="img/fr.png" /></a>
                  </li>
                  <!-- end lang item -->
                    <li><!-- lang item -->
                    <a href="index.php?lang=es"><img src="img/es.png" /></a>
                  </li>
                  <!-- end lang item -->


                </ul>
                </div>
              </li>
            </ul>
          </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li id="dropdown-menu" class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle">
                            <img src="img/logo.png" class="user-image" style="border-radius: initial" sizes="160x160" alt="logo" />
                            <span class="hidden-xs">Université d'Aruba</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="img/logo.png" sizes="160x160" alt="User Image" />
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Details</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Updates</a>
                                </div>
                            </li>
                            <!-- Menu Footer -->
                            <li class="user-footer">
                                <!-- Update alerts -->
                                <div id="alPiholeUpdate" class="alert alert-info alert-dismissible fade in" role="alert" hidden>
                                    <a class="alert-link" href="#">There's an update available!</a>
                                </div>
                                <div id="alWebUpdate" class="alert alert-info alert-dismissible fade in" role="alert" hidden>
                                    <a class="alert-link" href="#">There's an update available for this Web!</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="img/logo.png" class="img-responsive" alt="logo" style="display: table; table-layout: fixed; height: 67px;" />
                </div>
                <div class="pull-left info">
                    <p>Université d'Aruba</p>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php
            $scriptname = basename($_SERVER['SCRIPT_FILENAME']);
            ?>
            <ul class="sidebar-menu">
                <li class="header"><?php echo $lang['MAIN_NAVIGATION']; ?></li>
                <!-- Home Page -->
                <li<?php if($scriptname === "index.php"){ ?> class="active"<?php } ?>>
                    <a href="index.php">
                        <i class="fa fa-home"></i> <span><?php echo $lang['Dashboard']; ?></span>
                    </a>
                </li>
                <!-- canoe -->
                <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span><?php echo $lang['canoe']; ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
                <li<?php if($scriptname === "canoe.php"){ ?> class="active"<?php } ?>>
                    <a href="canoe.php">
                        <i class="fa fa-file-text-o"></i> <span><?php echo $lang['canoe']; ?></span>
                    </a>
                </li>
                <li<?php if($scriptname === "boat_has_book.php"){ ?> class="active"<?php } ?>>
                    <a href="boat_has_book.php">
                        <i class="fa fa-file-text-o"></i> <span><?php echo $lang['boat_has_book']; ?></span>
                    </a>
                </li>
                <li<?php if($scriptname === "boat_has_skipair.php"){ ?> class="active"<?php } ?>>
                    <a href="boat_has_skipair.php">
                        <i class="fa fa-file-text-o"></i> <span><?php echo $lang['boat_has_skipair']; ?></span>
                    </a>
                </li>
                <li<?php if($scriptname === "boat_has_student.php"){ ?> class="active"<?php } ?>>
                    <a href="boat_has_student.php">
                        <i class="fa fa-file-text-o"></i> <span><?php echo $lang['boat_has_student']; ?></span>
                    </a>
                </li>
          </ul>
        </li>

                 <!-- eleves -->
                <li<?php if($scriptname === "eleves.php"){ ?> class="active"<?php } ?>>
                    <a href="eleves.php">
                        <i class="fa fa-file-text-o"></i> <span><?php echo $lang['Eleve']; ?></span>
                    </a>
                </li>

                <!-- eleves -->
                <li<?php if($scriptname === "book.php"){ ?> class="active"<?php } ?>>
                    <a href="book.php">
                        <i class="fa fa-file-text-o"></i> <span><?php echo $lang['book']; ?></span>
                    </a>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

