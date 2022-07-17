<?php


defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Description of Home
 *
 * @author jarvis
 */
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('parser');
        $this->load->helper('url');
    }
    
    public function index() {
        
        
        if(isset($this->session->user_id)){
            redirect('/mnmva');
        }else{
            redirect('/login');
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }
    
    public function resthelp() {
        $this->load->view('welcome_message');
    }
}
