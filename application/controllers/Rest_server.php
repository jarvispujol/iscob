<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_server extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');
        echo APPPATH;

        $this->load->view('rest_server');
    }
}
