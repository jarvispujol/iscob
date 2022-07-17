<?php

/**
 * Description of Misc_model
 *
 * @author jarvis
 */
class Misc_model extends CI_Model {
    
    public function __construct(){
        $this->load->database();
        $this->db->query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'"); 
    }
    
    public function menu_set() {
        
    }
    
    public function get_perms($id) {
        $this->db->select('menu, can_view, can_create, can_edit, can_delete');
        $this->db->from('calling_permissions');
        $this->db->join('callings','calling_permissions.calling_id = callings.id', 'inner');
        $this->db->join('user_callings', 'callings.id = user_callings.id_calling', 'inner');
        $this->db->where(array('user_callings.id_user' => $id));
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_menus() {
        $this->db->select('id AS menu_id, menu_item');
        $this->db->from('menu');
        $menus = $this->db->get();
        return $menus->result_array();
    }
    
}
