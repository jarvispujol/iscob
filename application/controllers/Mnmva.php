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
 *  *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Description of Mnmva
 *
 * @author jarvis
 */
class Mnmva extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->model('mnmva_model');
        $this->load->library('functions');
        //$this->output->enable_profiler(TRUE);
        
    }
    
    public function index() {
        if(isset($this->session->user_id)){
            if($this->input->post()){
                $searchUnit = $this->input->post('filter_unit');
                $scope = ($this->input->post('unit_type') == 1 ) ? 1 : 2 ;
            }else{
                $searchUnit = $this->session->church_unit;
                $scope = $this->session->scope;
            }
            $hoy = strtotime('now');
            $filter = array( "confirm_date >" => date("Y-m-d",strtotime('-2 year', $hoy)));
            $data = $this->mnmva_model->get_charts($searchUnit, $scope, $filter);
            $dt = $this->mnmva_model->priesthoodRetention($searchUnit, $scope, $filter);
            $data['menu'] = $this->functions->makeMenu($this->session->user_id);
            $data['scope'] = $this->session->scope;
            $this->load->model('user_model');
            $data['unit_name'] = $this->user_model->get_usr_unitName($searchUnit);
            $data['church_unit'] = $this->session->church_unit;
            $data['child_units'] = $this->functions->getUnitsSel($searchUnit, $this->session->church_unit, $searchUnit);
            $this->load->view('head');
            $this->parser->parse('sidebar', $data);
            $this->parser->parse('navbar', $data);
            $this->parser->parse('mnmva-panel', $data);
        }
//        $this->load->view('foot');
    }

    public function listAll() {        

        if(isset($this->session->user_id)){ 
            if($this->input->post()){
                $searchUnit = $this->input->post('filter_unit');
                $scope = ($this->input->post('unit_type') == 1 ) ? 1 : 2 ;
            }else{
                $searchUnit = $this->session->church_unit;
                $scope = $this->session->scope;
            }
            $hoy = strtotime('now');
            $filter = array( "confirm_date >" => date("Y-m-d",strtotime('-2 year', $hoy)));
            $mns = $this->mnmva_model->getlist($searchUnit, $scope, $filter);
            $data['menu'] = $this->functions->makeMenu($this->session->user_id);
            $data['td']= array();
            $data['scope'] = $this->session->scope;
            $this->load->model('user_model');
            $data['unit_name'] = $this->user_model->get_usr_unitName($searchUnit);
            $data['church_unit'] = $this->session->church_unit;
            $data['child_units'] = $this->functions->getUnitsSel($searchUnit, $this->session->church_unit, $searchUnit);
			$data['updtd'] = isset($mns[0]['date_modified']) ? $mns[0]['date_modified'] : date('d-m-y h:i:s');
			if(!empty($mns)) {
				foreach ($mns as $value) {
					$value['color'] = ($value['gender'] == 'M') ? '#ff00ff' : '#00008b';
					$value['gender'] = ($value['gender'] == 'M') ? 'fa-female' : 'fa-male';
					if ($value['bishop_interview'] != NULL) {
						$value['bishop_interview'] = '<i class="text-success material-icons"  rel="tooltip" title data-original-title="' . $value['bishop_interview'] . '">check_circle</i>';
					} else {
						$value['bishop_interview'] = '<i class="text-danger  material-icons">warning</i>';
					}
					if ($value['priesthood'] == 'No Aplica') {
						$value['aaronic_priesthood'] = '<i class="text-warning material-icons" rel="tooltip" title data-original-title="No Aplica">remove_circle</i>';
					} else {
						$value['aaronic_priesthood'] = ($value['aaronic_priesthood'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="' . $value['aaronic_priesthood'] . '">check_circle</i>';
					}
					$value['gospel_principals'] = ($value['gospel_principals'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="' . $value['gospel_principals'] . '">check_circle</i>';
					$value['lessons'] = ($value['lessons_start'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="inicio:' . $value['lessons_start'] . ' fin:' . $value['lessons_end'] . '">check_circle</i>';
					$value['calling'] = ($value['calling_date'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="' . $value['calling_date'] . '">check_circle</i>';
					$value['asistance'] = ($value['asistance'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="' . $value['asistance'] . '">check_circle</i>';
					$value['genealogy'] = ($value['genealogy'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="' . $value['genealogy'] . '">check_circle</i>';
					if ($value['priesthood'] == 'No Aplica') {
						$value['melchisedeq'] = '<i class="text-warning material-icons" rel="tooltip" title data-original-title="No Aplica">remove_circle</i>';
					} elseif ($value['edad'] < 18) {
						$value['melchisedeq'] = '<i class="text-warning material-icons" rel="tooltip" title data-original-title="No Aplica">remove_circle</i>';
					} else {
						$value['melchisedeq'] = ($value['melchisedeq'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="' . $value['melchisedeq'] . '">check_circle</i>';
					}
					$value['vicary_baptism'] = ($value['vicary_baptism'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="' . $value['vicary_baptism'] . '">check_circle</i>';
					$value['temple_prep'] = ($value['temple_prep'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="' . $value['temple_prep'] . '">check_circle</i>';
					$value['temple_inv'] = ($value['temple_inv'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="' . $value['temple_inv'] . '">check_circle</i>';
					$value['temple_sel'] = ($value['temple_sel'] == NULL) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip"  title data-original-title="' . $value['temple_sel'] . '">check_circle</i>';
					array_push($data['td'], $value);
				}
			}
            $scripts = array(
                "dt" => "$(document).ready(function() {var tbl = $('#tbl-resumen').DataTable(); } );
                $('.fl-control').on('change', function(){
                    $.ajax({
                        //url:'".site_url('ajax/list_filter/format/html')."',
                        url:'".site_url('ajax/list_filter')."',
                        method:'post',
                        data: $('#filter_form').serialize()
                    }).done(function(data){
                        $('#tbl-resumen').DataTable().destroy();
                        $('#dt_body').children().remove();
                        $('#dt_body').html(data);
                        $('#tbl-resumen').DataTable();
                    });
                });"
            );
            $this->load->view('tables_head');
            $this->parser->parse('sidebar', $data);
            $this->parser->parse('navbar', $data);
            $this->parser->parse('mnmva', $data);
            $this->parser->parse('tables_footer',$scripts);
        }else{
            redirect('/login');
        }
    }
    
    public function addmn() {
        if(isset($this->session->user_id)){
            if ($this->input->post()) {
                $searchUnit = $this->input->post('filter_unit');
                $scope = ($this->input->post('unit_type') == 1 ) ? 1 : 2;
            } else {
                $searchUnit = $this->session->church_unit;
                $scope = $this->session->scope;
            }
            $this->load->model('user_model');
            $data['unit_name'] = $this->user_model->get_usr_unitName($searchUnit);
            $data['church_unit'] = $this->session->church_unit;
            $data['child_units'] = $this->functions->getUnitsSel($searchUnit, $this->session->church_unit, $searchUnit);
            $data['menu'] = $this->functions->makeMenu($this->session->user_id);
            $data['js'] = '';
            $this->load->view('head');
            $this->parser->parse('sidebar', $data);
            $this->parser->parse('navbar', $data);
            $this->load->view('mnmva-new');
        }else{
            redirect('/login');
        }
    }
      
    public function edit() {
        if($this->input->post()){
            $this->form_validation->set_rules('name', 'Nombre', 'trim|required');
            $this->form_validation->set_rules('baptism_date', 'Fecha de Bautismo', 'trim|required');
            $this->form_validation->set_rules('confirm_date', 'Fecha de Bautismo', 'trim|required');
            $this->form_validation->set_rules('edad', 'Edad', 'trim|required');
            $this->form_validation->set_rules('gender', 'Sexo', 'trim|required');
            if($this->form_validation->run() == TRUE){
                
            }
        }
        if(isset($this->session->user_id)){
            $data['menu'] = $this->functions->makeMenu($this->session->user_id);
            $mnid = $this->uri->segment(3);
            $mn_data = (array)$this->mnmva_model->getmn($mnid);
            if($mn_data['gender'] == 'M'){
                $mn_data['gender'] = 'Mujer';
            }else{
                $mn_data['gender'] = 'Hombre';
            }
            $priest_st = $mn_data['priesthood'];
            
            $mn_data['priesthood'] = array(
                array(
                    'attribs' => ($priest_st == 'diacono') ? 'value="diacono" selected="selected"' : 'value="diacono"' ,
                    'opname' => 'Diacono'
                    ),
                array(
                    'attribs' => ($priest_st == 'maestro') ? 'value="maestro" selected="selected"' : 'value="maestro"' ,
                    'opname' => 'Maestro'
                    ),
                array(
                    'attribs' => ($priest_st == 'presbitero') ? 'value="presbitero" selected="selected"' : 'value="presbitero"' ,
                    'opname' => 'Presbitero'
                    ),
                array(
                    'attribs' => ($priest_st == 'elder') ? 'value="elder" selected="selected"' : 'value="elder"' ,
                    'opname' => 'Elder'
                    ),
                array(
                    'attribs' => ($priest_st == 'sumo sacerdote') ? 'value="sumo sacerdote" selected="selected"' : 'value="sumo sacerdote"' ,
                    'opname' => 'Sumo Sacerdote'
                    ),
                array(
                    'attribs' => ($priest_st == 'no ordenado') ? 'value="no ordenadoe" selected="selected"' : 'value="no ordenado"' ,
                    'opname' => 'No Ordenado'
                    ),
                array(
                    'attribs' => ($priest_st == 'no aplica') ? 'value="no aplica" selected="selected"' : 'value="no aplica"' ,
                    'opname' => 'No Aplica'
                    )
            ) ;
            $this->load->view('head');
            $this->parser->parse('sidebar',$data);
            $this->parser->parse('navbar', $data);
            $this->parser->parse('mnmva-edit', $mn_data);
            //$this->load->view('foot');
        }else{
            redirect('/login');
        }
    }
    
}
