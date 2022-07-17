<?php

/**
 * Description of Callings
 *
 * @author jarvis
 */
class Callings_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }
    
    public function getcallings($scope,$unit) {
        if($unit != 1){
            $this->db->select( 'id, calling' );
            $calling = $this->db->get_where('callings', array( 'scope' => $scope ) );
            
        }else{
            $this->db->select( 'id, calling' );
            $calling = $this->db->get('callings');
        }
        return $calling->result_array();
    }
    
}
