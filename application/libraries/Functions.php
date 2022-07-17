<?php

/*
 * The MIT License
 *
 * Copyright 2018 jarvis.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Description of Functions
 *
 * @author jarvis
 */
class Functions {
    
    private $obj;
    
    public function __construct() {
        $this->obj = &get_instance();
        $this->obj->load->library('permission');
        $this->obj->load->database();
        $this->obj->db->query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
    }
    
    public function makeMenu($id) {
        $this->obj->db->select('menu_id');
        $menuids = $this->obj->db->get_where('user_menu', array('user_id' => $id));
        $menus = array();
        foreach ($menuids->result_array() as $key => $value){
            array_push($menus, $value['menu_id']);
        }   
        $this->obj->db->select('menu_item,icon,url,class');
        $this->obj->db->where_in('id', $menus);
        $userMenus = $this->obj->db->get('menu');
        return $userMenus->result_array();
    }
    
    public function getUnitsSel($unit, $rootUnit, $actualUnit) {
        
        $units = $this->obj->db->query("SELECT `id` AS `ch_unit_id`, `unit_name` AS `ch_unit_name`, CASE unit_type WHEN 'leaf' THEN 2 WHEN 'branch' THEN 1 WHEN 'root' THEN 1 END AS ch_unit_type FROM `church_unit` WHERE `unit_parent` = $unit OR id = $rootUnit OR id = $actualUnit" );
        return $units->result_array();
    }
    
    public function getUnitGroups($groupID, $scope, $churchU) {
        if($churchU != 1){
            $groups = $this->obj->db->query("SELECT groupID, groupName FROM permission_groups WHERE (parent = $groupID OR groupID = $groupID) AND groupScope = $scope");
        }else{
            $groups = $this->obj->db->query("SELECT groupID, groupName FROM permission_groups");
        }
        return $groups->result_array();
    }
    
    public function getUnitsSeladm($unit, $rootUnit, $actualUnit, $userUnits) {
        if($userUnits != 1 ){
            $units = $this->obj->db->query("SELECT `id` AS `ch_unit_id`, `unit_name` AS `ch_unit_name`, CASE unit_type WHEN 'leaf' THEN 2 WHEN 'branch' THEN 1 WHEN 'root' THEN 1 END AS ch_unit_type FROM `church_unit` WHERE `unit_parent` = $unit OR id = $rootUnit OR id = $actualUnit" );
        }else{
            $units = $this->obj->db->query("SELECT `id` AS `ch_unit_id`, `unit_name` AS `ch_unit_name`, CASE unit_type WHEN 'leaf' THEN 2 WHEN 'branch' THEN 1 WHEN 'root' THEN 1 END AS ch_unit_type FROM `church_unit`");
        }
        return $units->result_array();
    }
}
