<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Test extends REST_Controller {

    public function index_get()
    {
        $this->load->model('test_model');
        $data = $this->test_model->testing();
        $this->response($data);
    }
}
