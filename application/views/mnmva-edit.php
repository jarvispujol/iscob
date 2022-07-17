<?php
?>
<div class="content">
    <div class="container-fluid">
        <div class="card"> 
            <form name="frm-edit-mn" method="post">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Editar:
                        
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombre</label>
                                <input type="text" class="form-control" name="name" required value="{name}">
                                <input type="hidden" name="mn_id" value="{id}" id="mn_id">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="bmd-label-floating">Edad</label>
                                <input type="text" class="form-control" name="edad" required value="{edad}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="bmd-label-floating">Sexo&nbsp;&nbsp;</label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="H" <?php echo ($gender == 'Hombre') ? 'checked' : ''?>  name="gender" required>
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                    Hombre
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="M" <?php echo ($gender == 'Mujer') ? 'checked' : ''?>  name="gender" required>
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                    Mujer
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="bmd-label-floating">Fecha de Bautismo</label>
                                <input type="text" class="form-control datepicker" name="baptism_date" required value="{baptism_date}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="bmd-label-floating">Fecha Confirmaci&oacute;n</label>
                                <input type="text" class="form-control datepicker" name="confirm_date" required value="{confirm_date}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="bmd-label-floating">Hermanos Ministrantes</label>
                                <input type="text" class="form-control" name="ministeringbrothers" value="{ministeringbrothers}"/>
                            </div>
                        </div>
                        <div class="col-sm-5    ">
                            <div class="form-group">
                                <label class="bmd-label-floating">Hermanas Ministrantes</label>
                                <input type="text" class="form-control" name="ministeringsisters" value="{ministeringsisters}"/>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="bmd-label-floating">Fecha Recomendaci&oacute;n</label>
                                <input type="text" class="form-control datepicker" name="templerecomendation" id="templerecomendation" value="{templerecomendation}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                            Dentro del mes de haberse bautizado o vuelto a activar
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-8">
                                    el obispo ha entrevistado al miembro y ha repasado el principio del diezmo y otros asuntos relacionados con la dignidad para ayudarlo a prepararse para asistir al templo
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control datepicker" name="bishop_interview" id="bishop_interview" value="{bishop_interview}" >
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        a los varones que reunan los requisitos necesarios se les ha entrevistado y confereido el sacerdocio aaronico
                                    
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control datepicker" name="aaronic_priesthood" id="aaronic_priesthood" value="{aaronic_priesthood}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control" name="priesthood">
                                            <option>Seleccione</option>
                                            {priesthood}
                                            <option {attribs}>{opname}</option>
                                            {/priesthood}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        el miembro esta inscrito en el curso de principios del evangelio
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control datepicker" name="gospel_principals" id="gospel_principals" value="{gospel_principals}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        los misioneros de barrio y de tiempo completo estan enseñando las lecciones misionales nuevamente
                                    
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha Inicio</label>
                                        <input type="text" class="form-control datepicker" name="lessons_start" id="lessons_start" value="{lessons_start}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha Fin</label>
                                        <input type="text" class="form-control datepicker" name="lessons_end" id="lessons_end" value="{lessons_end}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                            dentro de los seis meses de haberse bautizado o vuelto a activar
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        se ha entrevistado al miembro y ha recibido una responsabilidad o un llamamiento
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control datepicker" name="calling_date" id="calling_date" value="{calling_date}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        el miembro asiste con regularidad a la reunion sacramental
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control datepicker" name="asistance" id="asistance" value="{asistance}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        el miembro ha empezado a llenar una hoja de registro familiar
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control input-sm" name="genealogy" id="genealogy" value="{genealogy}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                            tan pronto como sea adecuado durante el primer año
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        a los varones que hayan reunido los requisitos necesarios y hayan permanecido dignos, se les ha preparado y conferido el sacerdocio de melquisedec
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control datepicker" name="melchisedeq" id="melchisedeq" value="{melchisedeq}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        los miemrbos de 12 años en adelante han participado en bautismos por los muertos en el templo
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control datepicker" name="vicary_baptism" id="vicary_baptism" value="{vicary_baptism}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        los miembros que reunieron los requisitos necesarios han terminado la clase preparacion para entrar al templo
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-group-sm">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control input-sm" name="temple_prep" id="temple_prep" value="{temple_prep}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                            una vez preparado pero no antes de que haya pasado un año desde la fecha del bautismo
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        las personas adultas que reunan los requisitos necesarios y sean dignas han recibido sus investiduras
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control datepicker" name="temple_inv" id="temple_inv" value="{temple_inv}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    
                                        la familia se ha sellado en el templo
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Fecha</label>
                                        <input type="text" class="form-control datepicker" name="temple_sel" id="temple_sel" value="{temple_sel}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary pull-right" >Guardar <i class="material-icons">save</i></button>
                    </div>
                </div>
            </form>
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
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chartist JS -->
        <script src="<?php echo base_url('assets/js/chartist.min.js')?>"></script>
        <!--  Notifications Plugin    -->
        <script src="<?php echo base_url('assets/js/bootstrap-notify.js')?>"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="<?php echo base_url('assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript')?>"></script>
        <script src="<?php echo base_url('assets/js/gijgo.min.js" type="text/javascript')?>"></script>
        <script src="<?php echo base_url('assets/js/my_notifications.js')?>" type="text/javascript"></script>
        <script>
            $('#bishop_interview').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $('#aaronic_priesthood').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            })
            $('#gospel_principals').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $('#lessons_start').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $('#lessons_end').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $('#calling_date').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $('#asistance').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $('#genealogy').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $('#melchisedeq').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $('#melchisedeq').datepicker({ 
                format: 'yyyy-mm-dd', header: true
            });
            $("#vicary_baptism").datepicker({
                format: 'yyyy-mm-dd', header: true
            });
            $("#temple_prep").datepicker({
                format: 'yyyy-mm-dd', header: true
            });
            $("#temple_inv").datepicker({
                format: 'yyyy-mm-dd', header: true
            });
            $("#temple_sel").datepicker({
                format: 'yyyy-mm-dd', header: true
            });
            $('#templerecomendation').datepicker({
                format: 'yyyy-mm-dd', header: true
            });
            var field;
            $('.form-control').on('focusin', function(){
                field = $(this).val();
            });
            $('.form-control').on('change',function(){
                console.log('fine');
                if($(this).val() != '' && $(this).val() != field ){
                    var data ={};
                    data[$(this).attr('name')] = $(this).val();
                    data['id']  = $('#mn_id').val();
                    $.ajax({
                        url: '<?php echo site_url('mnupdate/index_post')?>',
                        method: 'post',
                        data:data
                    }).done(function(data){
                        notify(data);
                    });
                }
            });
            $('.form-check-input').on('change', function(){
                var data ={};
                data[$(this).attr('name')] = $(this).val();
                data['id']  = $('#mn_id').val();
                $.ajax({
                    url: '<?php echo site_url('mnupdate/index_post')?>',
                    method: 'post',
                    data:data
                }).done(function(data){
                    notify(data);
                });
            });
        </script>
    </body>
</html>

