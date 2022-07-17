<?php
class Test_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
                $this->db->query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
        }
        
        public function testing() {
            $query = $this->db->get('users');
            return $query->result_array();
        }
}
