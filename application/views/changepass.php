<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="main-panel">
    <div class="sidebar" data-color="azure" data-background-color="white" data-image="<?php echo base_url('/assets/img/sidebar-1.jpg')?>">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            <img src="<?php echo base_url('assets/img/logo.png') ?>" width="150"/>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="material-icons">vpn_key</i>
                    <p>Cambiar Contrasena</p>
                </a>
            </li>
        </ul>
        
    </div>
</div>
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-default navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="#pablo">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('home/logout')?>">
                            <i class="material-icons">exit_to_app</i> Cerrar Sesion
                        </a>
                    </li>
                  <!-- your navbar here -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="content" style="margin-top:100px;">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Cambiar Contraseña</h4>
                            <p class="card-category">Establece tu contraseña para ingresar al sistema</p>
                        </div>
                        <div class="card-body">
                            <!--<form method="post" name="frm-login" action="<?php echo site_url('login/process')?>" id="frm-login">-->
                            <form method="post" name="frm-change-pass" action="" id="frm-change-pass">
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"><i class="material-icons"></i>&nbsp;Contraseña actual</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"><i class="ti-key"></i>&nbsp;Nueva Contraseña</label>
                                            <input type="password" class="form-control" name="new_password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"><i class="ti-key"></i>&nbsp;Confirmar Contraseña</label>
                                            <input type="password" class="form-control" name="conf_new_password" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="button-login" class="btn btn-primary pull-right">Cambiar&nbsp;<i class="material-icons">save</i></button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
