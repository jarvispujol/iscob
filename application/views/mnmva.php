<?php
?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-info">
                <h4 class="card-title">Informe Miembro nuevo Ultimos 24 Meses  en {unit_name} <span style="float:right;"><small><small>Actualizado al <strong>{updtd}</strong></small></small></span></h4>
            </div>
            <div class="card-body">
            <form name="filter_form" id="filter_form">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sexo:</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select class="form-control fl-control" name="fl_sexo" id="fl_sexo">
                                            <option> - </option>
                                            <option value="H">Hombre</option>
                                            <option value="M">Mujer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sacerdocio:</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select class="form-control fl-control" name="fl_priesthood" id="fl_priesthood">
                                            <option> - </option>
                                            <option value="Diacono">Diacono</option>
                                            <option value="Maestro">Maestro</option>
                                            <option value="Presbitero">Presbitero</option>
                                            <option value="Elder">Elder</option>
                                            <option value="No Ordenado">No Ordenado</option>
                                            <option value="No Aplica">No Aplica</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fecha:</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select class="form-control fl-control" name="fl_conf_date" id="fl_conf_date">
                                            <option> - </option>
                                            <option value="1">Ultimo Mes</option>
                                            <option value="12">Ultimos 12 Meses</option>
                                            <option value="24">Ultimos 24 Meses</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Edad:</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control fl-control" name="fl_edad" id="fl_edad">
                                            <option> - </option>
                                            <option value="t">Todos</option>
                                            <option value="18">+ 18</option>
                                            <option value="1230">12 - 30</option>
                                            <!--
                                            <option value="1218">12 - 18</option>
                                            <option value="1830">JAS</option>
                                            <option value="11">- 12</option>
                                            -->
                                        </select>
                                    </div>
                                </div>
                                <!--
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-white btn-fab btn-round" ><i class="material-icons">save</i></button>
                                </div>
                                -->
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive" id="tablediv">
                    <style type="text/css">
                        .th-small, .th-dt{
                            font-size: 0.9em !important;
                            font-weight: 450 !important;
                        }
                        tr>td>i{
                            font-size: 1.3em;
                        }
                    </style>
                    <table class="table table-hover table-bordered dt-responsive" id="tbl-resumen" style="width: 100%">
                        <thead >
                            <tr>
                                <th rowspan="2" style="width: 20% !important;" class="th-dt">Nombre</th>
                                <th rowspan="2" class="th-dt">Edad</th>
                                <th rowspan="2" class="th-dt"><i rel="tooltip" title data-original-title="Fecha de Confirmacion" class="fa fa-calendar"</th>
                                <th rowspan="2" class="th-dt"><i rel="tooltip" title data-original-title="Sexo" class="fa fa-male"</th>
                                <th rowspan="2" class="th-dt">Sacerdocio</th>
                                <th colspan="4" class="th-small">Dentro del mes de haberse bautizado o vuelto a activar</th>
                                <th colspan="3" class="th-small">dentro de los seis meses de haberse bautizado o vuelto a activar</th>
                                <th colspan="3" class="th-small">tan pronto como sea adecuado durante el primer año </th>
                                <th colspan="3" class="th-small">una vez preparado pero no antes de que haya pasado un año desde la fecha del bautismo</th>
                            </tr>
                            <tr>
                                <td><i rel="tooltip" title class="icon-iscob-diezmo" data-original-title="el obispo ha entrevistado al miembro y ha repasado el principio del diezmo y otros asuntos relacionados con la dignidad para ayudarlo a prepararse para asistir al templo"></i></td>
                                <td><i rel="tooltip" title class="icon-iscob-aaronico" data-original-title="a los varones que reunan los requisitos necesarios se les ha entrevistado y confereido el sacerdocio aaronico"></i></td>
                                <td><i rel="tooltip" title data-original-title="el miembro esta inscrito en el curso de principios del evangelio" class="icon-iscob-principios-ev"></i></td>
                                <td><i rel="tooltip" title data-original-title="los misioneros de barrio y de tiempo completo estan enseñando las lecciones misionales nuevamente" class="icon-iscob-lecciones-nc"></i></td>
                                <td><i rel="tooltip" title data-original-title="se ha entrevistado al miembro y ha recibido una responsabilidad o un llamamiento" class="icon-iscob-llamamiento"></i></td>
                                <td><i rel="tooltip" title data-original-title="el miembro asiste con regularidad a la reunion sacramental" class="icon-iscob-sacramental"></i></td>
                                <td><i rel="tooltip" title data-original-title="el miembro ha empezado a llenar una hoja de registro familiar" class="icon-iscob-genealogia"></i></td>
                                <td><i rel="tooltip" title data-original-title="a los varones que hayn reunido los requisitos necesarios y hayan permanecido dignos, se les ha preparado y conferido el sacerdocio de melquisedec" class="icon-iscob-melquisedec"</td>
                                <td><i rel="tooltip" title data-original-title="los miemrbos de 12 años en adelante han participado en bautismos por los muertos en el templo" class="icon-iscob-bautismo-muertos"></i></td>
                                <td><i rel="tooltip" title data-original-title="los miembros que reunieron los requisitos necesarios han terminado la clase preparacion para entrar al templo" class="icon-iscob-curso-investidos"></i></td>
                                <td><i rel="tooltip" title data-original-title="las personas adultas que reunan los requisitos necesarios y sean dignas han recibido sus investiduras" class="icon-iscob_investidura"></i></td>
                                <td><i rel="tooltip" title data-original-title="la familia se ha sellado en el templo" class="icon-iscob-sellamiento"</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="dt_body">
                        {td}
                        <tr>
                            <td>{name} <span class="badge badge-secondary">{}</span></td>
                            <td>{edad}</td>
                            <td>{confirm_date}</td>
                            <td><i class="fa {gender}" style="color:{color}; font-size:1.3em"></i></td>
                            <td>{priesthood}</td>
                            <td style="font-size:1.3em">{bishop_interview}</td>
                            <td style="font-size:1.3em">{aaronic_priesthood}</td>
                            <td style="font-size:1.3em">{gospel_principals}</td>
                            <td style="font-size:1.3em">{lessons}</td>
                            <td style="font-size:1.3em">{calling}</td>
                            <td style="font-size:1.3em">{asistance}</td>
                            <td style="font-size:1.3em">{genealogy}</td>
                            <td style="font-size:1.3em">{melchisedeq}</td>
                            <td style="font-size:1.3em">{vicary_baptism}</td>
                            <td style="font-size:1.3em">{temple_prep}</td>
                            <td style="font-size:1.3em">{temple_inv}</td>
                            <td style="font-size:1.3em">{temple_sel}</td>
                            <td style="font-size:1.3em"><a href="<?php echo site_url('mnmva/edit/')?>{id}"><i class="material-icons">edit</i></a></td>
                        </tr>
                        {/td}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
