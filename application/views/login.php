<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
 /* 
 * The MIT License
 *
 * Copyright 2018 jarvis.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png');?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
        ISCOB | Informe de Seguimiento Para el Consejo de Barrio
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <!--<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/material-icons/material-icons.css')?>"
        <!-- CSS Files -->
        <link href="<?php echo base_url('assets/css/material-dashboard.css?v=2.1.0');?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/themify-icons.css');?>" rel="stylesheet" />
        <style type="text/css">
            
        </style>
    </head>

    <body class="">
        <div class="wrapper ">

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
                              <!-- your navbar here -->
                            </ul>
                        </div>
                    </div>
                </nav>
            <!-- End Navbar -->
                <div class="content" style="margin-top:100px;">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Iniciar sesion</h4>
                                        <p class="card-category">Autenticate para usar la App</p>
                                    </div>
                                    <div class="card-body">
                                        <!--<form method="post" name="frm-login" action="<?php echo site_url('login/process')?>" id="frm-login">-->
                                        <form method="post" name="frm-login" action="" id="frm-login">
                                            <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating"><i class="ti-user"></i>&nbsp;Nombre de usuario</label>
                                                        <input type="text" class="form-control" name="login_name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating"><i class="ti-key"></i>&nbsp;Contraseña</label>
                                                        <input type="password" class="form-control" name="password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <span class="text-primary"><a href="#">He olvidado mi contraseña</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" id="button-login" class="btn btn-primary pull-right">Login&nbsp;<i class="ti-hand-point-right"></i></button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
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
                    <!-- your footer here -->
                    </div>
                </footer>
            </div>
        </div>
        <!--   Core JS Files   -->
        <script src="<?php echo base_url('assets/js/jquery.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/popper.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-material-design.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/perfect-scrollbar.jquery.min.js')?>"></script>
        <!--  Google Maps Plugin    -->
        <!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
        <!-- Chartist JS -->
        <script src="<?php echo base_url('assets/js/chartist.min.js')?>"></script>
        <!--  Notifications Plugin    -->
        <script src="<?php echo base_url('assets/js/bootstrap-notify.js')?>"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="<?php echo base_url('assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript')?>"></script>
        <script src="<?php echo base_url('assets/js/my_notifications.js')?>" type="text/javascript"></script>
        <script>
            $('#button-login').on('click',function(){
                $.ajax({
                    url: '<?php echo site_url('loginajax/index_post')?>',
                    method:'post',
                    data:$('#frm-login').serialize()
                }).done(function(data){
                    notify(data);
                    if(data.error === 0){
                        if(data.firstlogin == 1){
                            setTimeout(function(){ window.location = "<?php echo site_url('admin/changepwd')?>"; },3600);
                        }else{
                            setTimeout(function(){ window.location = "<?php echo site_url('mnmva')?>"; },3600);
                        }
                    }
                });
            });
        </script>
    </body>

</html>

