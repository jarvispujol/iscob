<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Registrar nueva persona</h4>
            </div>
            <div class="card-body">
                <form name="frm-mnmva-new" method="post" action="" id="frm-mnmva-new">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="bmd-label-floating"><i class="ti-user"></i>&nbsp;Nombre</label>
                                <input type="text" class="form-control datepicker" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="bmd-label-floating">Tipo&nbsp;</label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="new member" checked="" name="type" required>
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                    Nuevo Converso
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="aa member" checked="" name="type" required>
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                    Menos Activo
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Edad</label>
                                <input type="number" class="form-control" name="edad" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Fecha Bautismo</label>
                                <input type="text" class="form-control" name="baptism_date" id="baptism_date" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Fecha Confirmaci&oacute;n</label>
                                <input type="text" class="form-control" name="confirm_date" id="confirm_date" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="bmd-label-floating">Sexo&nbsp;&nbsp;</label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="H" checked="" name="gender" required>
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                    Hombre
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="M" checked="" name="gender" required>
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                    Mujer
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary pull-right" >Guardar <i class="material-icons">save</i></button>
                        </div>
                    </div>
                </form>
            </div>
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
    <!--   Core JS Files   -->
        <script src="<?php echo base_url('assets/js/jquery.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/popper.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-material-design.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/js/perfect-scrollbar.jquery.min.js')?>"></script>
        <!--  Google Maps Plugin    -->
        <!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
        <!-- Chartist JS -->
        <script src="<?php echo base_url('assets/js/chartist.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/Chart.bundle.js')?>"></script>
        <!--  Notifications Plugin    -->
        <script src="<?php echo base_url('assets/js/bootstrap-notify.js')?>"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="<?php echo base_url('assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript')?>"></script>
        <script src="<?php echo base_url('assets/js/gijgo.min.js" type="text/javascript')?>"></script>
        <script src="<?php echo base_url('assets/js/my_notifications.js')?>" type="text/javascript"></script>
        <script>
            $('#baptism_date').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $('#confirm_date').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            
            $('#frm-mnmva-new').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url: '<?php echo site_url('ajax/newmn')?>',
                    method:'post',
                    data:$('#frm-mnmva-new').serialize()
                }).done(function(data){
                    notify(data);
                    if(data.err == 0){
                        setTimeout(function(){ window.location = "<?php echo site_url('mnmva/edit/')?>"+data.mnmvaid; },3600);
                    }
                });
            });
        </script>
    </body>
</html>


