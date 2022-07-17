<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * Description of Login
 *
 * @author jarvis
 */
class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('user_model');
    }
    
    public function index() {
        
        $this->load->view('login',array('error'=>0,'msg'=>' ','type'=>'info'));
    }
    
    public function process() {
        if($this->input->post()){
            $this->form_validation->set_rules('login_name', 'Nombre de Usuario', 'required');
            $this->form_validation->set_rules('password', 'Contrasena', 'required');
            if($this->form_validation->run() == TRUE){
                $username = $this->input->post('login_name');
                $password = md5($this->input->post('password'));
                $login = $this->user_model->check_login($username,$password);
                echo json_encode($login);
            }
        }
    }
}
