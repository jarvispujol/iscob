<?php

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

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Admin
 * this controller works on every administratives functions of the software!s
 * @author jarvis
 */
class Admin extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('parser');
        $this->load->library('functions');
        $this->load->helper('url');
        $this->load->library('permission');
        $groupID = ($this->session->userdata('groupID')) ? $this->session->userdata('groupID') : 0;
        if (!$this->permissions = $this->permission->get_user_permissions($groupID)){
            show_error('No tiene configurado ningun acceso!',403, 'Oops! <small>Se han encontrado los siguientes errores:</small>');
        }
    }
    
    public function index() {
        header('Location:'.site_url('mnmva'));
    }
    
    public function adduser() {
        if(isset($this->session->user_id)){
            if (!in_array('create_user', $this->permissions)){
                show_error('No tienes Acceso a esta pagina!', 403, 'Oops! <small>Se han encontrado los siguientes errores:</small>');
            }
            if ($this->input->post()) {
                $searchUnit = $this->input->post('filter_unit');
                $scope = ($this->input->post('unit_type') == 1 ) ? 1 : 2;
            } else {
                $searchUnit = $this->session->church_unit;
                $scope = $this->session->scope;
            }
            $data['menu'] = $this->functions->makeMenu($this->session->user_id);
            $this->load->model('callings_model');
            $this->load->model('misc_model');
            $data['callings'] = $this->callings_model->getcallings($this->session->scope, $this->session->church_unit);
            $data['child_units'] = $this->functions->getUnitsSeladm($searchUnit, $this->session->church_unit, $searchUnit, $this->session->church_unit);
            $data['access-menu'] = $this->misc_model->get_menus();
            $data['unit_group'] = $this->functions->getUnitGroups($this->session->groupID, $this->session->scope, $this->session->church_unit);
            $data['js'] =   "$('#frm-add-user').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url: '".site_url('ajax/useradd')."',
                    method:'post',
                    data:$('#frm-add-user').serialize()
                }).done(function(data){
                    notify(data);
                    if(data.err == 0){
                        $('#wapp-lnk').attr('href','whatsapp://send?text='+data.wapp+' http://iscob.ml, estas son tus credenciales USUARIO : '+data.usr+' CLAVE: '+data.pwd); 
                        $('#user_id').val(data.user_id);
                        $('#add-user-md').modal({backdrop:'static'});
                        //setTimeout(function(){ window.location = '".site_url('admin/adduser')."'; },3600);
                    }
                });
            });
            $('#frm-set-user-perms').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    url: '". site_url('ajax/set_user_perms')."',
                    method: 'post',
                    data: $('#frm-set-user-perms').serialize()
                }).done(function(data_perms){
                    if(data_perms.err == 0){
                    $('#add-user-md').modal('hide');
                        notify(data_perms);
                    }
                });;
            });";
            $this->load->view('head');
            $this->parser->parse('sidebar', $data);
            $this->parser->parse('navbar', $data);
            $this->parser->parse('useradd', $data);
            $this->parser->parse('foot', $data);
        }
    }
    
    public function menuConf() {
        
    }
    
    public function edituser($id = null) {
        if(isset($this->session->user_id)){
            if (!in_array('edit_user', $this->permissions)){
                show_error('No tienes Acceso a esta pagina!', 403, 'Oops! <small>Se han encontrado los siguientes errores:</small>');
            }
        }
    }
    
    public function changepwd() {
        if(isset($this->session->user_id)){
            $data['js'] =   "$('#frm-change-pass').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url: '".site_url('ajax/passwdchange')."',
                    method:'post',
                    data:$('#frm-change-pass').serialize()
                }).done(function(data){
                    notify(data);
                    if(data.err === 0){
                        setTimeout(function(){ window.location = '".site_url('mnmva')."'; },3600);
                    }
                });
            });";
            $this->load->view('head');
            $this->load->view('changepass');
            $this->parser->parse('foot', $data);
        }
    }
    
}
