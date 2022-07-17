<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * Description of MnmvaRest
 *
 * @author jarvis
 */
class MnmvaRest extends REST_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('mnmva_model');
    }
    
    public function newmn_post() {
        if($this->input->post()){
            $this->form_validation->set_rules('type', 'Tipo', 'required');
            $this->form_validation->set_rules('gender', 'Sexo', 'required');
            if($this->form_validation->run() == TRUE){
                $data = $this->input->post();
                $data['unit'] = $this->session->church_unit;
                $data['date_added'] = date('Y-m-d h:i:s');
                $data['date_modified'] = date('Y-m-d h:i:s');
                $resp = $this->mnmva_model->addmn($data);
                $this->response($resp);
            }
        }
    }
    
}
