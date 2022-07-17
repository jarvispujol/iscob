<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main-panel">
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-default navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="#"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <form class="navbar-form" id="nav-form" method="post">
                    <div class="input-group no-border">
                        <select name="filter_unit" class="form-control" id="filter_unit" required>
                            <option value="" data-utype="">Seleccione Unidad</option>
                            {child_units}
                            <option value="{ch_unit_id}" data-utype="{ch_unit_type}" >{ch_unit_name}</option>
                            {/child_units}
                        </select>
                        <input type="hidden" name="unit_type" id="unit_type" value=""/>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
<!--                    <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                            <i class="material-icons">notifications</i> Notifications
                        </a>
                    </li>-->
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
<!-- End Navbar -->

