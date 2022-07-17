<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * Description of Login_ajax
 *
 * @author jarvis
 */
class Loginajax extends REST_Controller {
    
//    public function __construct() {
//        $this->load->library('session');
//        $this->load->library('form_validation');
//        $this->load->helper('url');
//        $this->load->model('user_model');
//    }
    
    public function index_post(){
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('user_model');
        if($this->input->post()){
            $this->form_validation->set_rules('login_name', 'Nombre de Usuario', 'required');
            $this->form_validation->set_rules('password', 'Contrasena', 'required');
            if($this->form_validation->run() == TRUE){
                $username = $this->input->post('login_name');
                $password = md5($this->input->post('password'));
                $login = $this->user_model->check_login($username,$password);
                if($login['error'] == 0){
                    $this->session->set_userdata($login);
                }
                $this->response($login);
            }
        }
    }
        
}
