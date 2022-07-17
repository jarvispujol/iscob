<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png');?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
        Material Dashboard by Creative Tim
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/material-icons/material-icons.css')?>"
        <!-- CSS Files -->
        <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.0');?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/themify-icons.css');?>" rel="stylesheet" />
        <style type="text/css">
            
        </style>
    </head>

    <body class="">
        <div class="wrapper ">
            <!---->
            <div class="main-panel" style="position: absolute;width: 100%;">
            <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-absolute fixed-top " >
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <img src="<?php echo base_url('assets/img/logo.png')?>" width="250"/>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="collapse navbar-collapse justify-content-end">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="material-icons">help</i> Ayuda
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            <!--style="margin-top:100px;"-->
                <div class="content" style=";background-image:url(<?php echo base_url('assets/img/Background.jpg')?>);background-repeat: round;background-size: cover;" >
                    <div class="container-fluid" >
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card" >
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">error_outline</i>
                                        </div>
                                        <p class="card-category"></p>
                                        <h3 class="card-title"><?php echo $heading; ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="float-left">
                            <ul>
                                <li>
                                    <a href="#">JP-DEV</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright float-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>, made by
                            <a href="#" target="_blank">JP-DEV</a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="<?php echo base_url('assets/js/jquery.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/popper.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-material-design.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/perfect-scrollbar.jquery.min.js')?>"></script>
        <!-- Chartist JS -->
        <script src="<?php echo base_url('assets/js/chartist.min.js')?>"></script>
        <!--  Notifications Plugin    -->
        <script src="<?php echo base_url('assets/js/bootstrap-notify.js')?>"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="<?php echo base_url('assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript')?>"></script>
    </body>
</html>