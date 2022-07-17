<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    .md-table > thead > tr > th, .md-table > tbody > tr > td {
        font-size: 0.8em !important;
        padding: 4px 8px !important;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Registrar nuevo usuario</h4>
            </div>
            <form name="frm-add-user" method="post" action="" id="frm-add-user">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <!--<label class="bmd-label-floating"><i class="material-icons">person</i>&nbsp;Nombre</label>-->
                                <label class="bmd-label-floating "><i class="material-icons">person</i>&nbsp;Nombre</label>
                                <input type="text" class="form-control" name="firstname" required>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><i class="material-icons">person</i>&nbsp;Apellido</label>
                                <input type="text" name="lastname" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><i class="material-icons">email</i>&nbsp;Email</label>
                                <input class="form-control" name="email" type="email"/>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><i class="material-icons">phone_android</i>&nbsp;Telefono</label>
                                <input class="form-control" name="phone" type="number"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="bmd-label-floating"><i class="material-icons">lock</i>&nbsp;Nombre de Usuario</label>
                                <input class="form-control" name="login" type="text"/>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="form-control" name="calling">
                                    <option>Llamamiento </option>
                                    {callings}
                                    <option value="{id}">{calling}</option>
                                    {/callings}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="form-control" name="church_unit" required>
                                    <option>Unidad </option>
                                    {child_units}
                                    <option value="{ch_unit_id}" >{ch_unit_name}</option>
                                    {/child_units}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="form-control" name="groupID" required>
                                    <option>Grupo </option>
                                    {unit_group}
                                    <option value="{groupID}" >{groupName}</option>
                                    {/unit_group}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row pull-right">
                        <button type="submit" id="button-login" class="btn btn-primary pull-right">Registrar&nbsp;<i class="material-icons">save</i></button>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="add-user-md" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm card">
        <div class="modal-content">
            <div class="card-header card-header-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Asignar Permisos de Usuario</h4>
            </div>
            <form id="frm-set-user-perms" method="post" action="">
                <div class="card-body">
                    <input type="hidden" name="user_id" id="user_id"/>
                    <table class="table table-bordered table-condensed md-table">
                        <thead>
                            <tr>
                                <th>Opcion</th>
                                <th>Acceso</th>
                            </tr>
                        </thead>
                        <tbody>
                            {access-menu}
                            <tr>
                                <td>{menu_item}</td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" value="{menu_id}" name="menu_id[]" {access}>
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            {/access-menu}
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Guardar
                        <i class="material-icons">save</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>