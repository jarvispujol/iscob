<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * Description of Mnupdate
 *
 * @author jarvis
 */
class Mnupdate extends REST_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('mnmva_model');
    }
    
    public function index_post() {
        $data = $this->input->post();
        $id = $data['id'];
        unset($data['id']);
        $response = $this->mnmva_model->updatemn($data, $id);
        $this->response($response);
    }
    
}
