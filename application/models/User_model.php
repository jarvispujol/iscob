<?php

/**
 * Description of User_model
 *
 * @author jarvis
 */
class User_model extends CI_Model {
    public function __construct(){
        $this->load->database();
        $this->db->query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
    }
    
    public function check_login($uname,$key) {
        $query = $this->db->get_where('users', array('login' => $uname));
        if($query->num_rows() > 0){
            $user = $query->row();
            $call = $this->db->get_where('callings', array('id'=>$user->calling));
            $scope = $call->row();
            if($user->password === $key){
                return array(
                    'error'     => 0,
                    'msg'       => 'Login Successfull!',
                    'firstname' => $user->firstname,
                    'lastname'  => $user->lastname,
                    'user_id'   => $user->id,
                    'calling'   => $user->calling,
                    'login'     => $user->login,
                    'email'     => $user->email,
                    'groupID'   => $user->groupid,
                    'church_unit'=> $user->church_unit,
                    'scope'     => $scope->scope,
                    'type'      => 'info',
                    'icon'      => 'check_circle',
                    'status'    => 'Success!',
                    'firstlogin'=> $user->firstlogin,
                    'delay'     => 3500
                );
            }else{
                return array(
                    'error'     => 1,
                    'msg'       => 'Login failed! check your username and password, and try again!',
                    'type'      => 'warning',
                    'icon'      => 'error_outline',
                    'status'    => 'Error!',
                    'delay'     => 3500
                );
            }
        } else {
            return array(
                'error'     => 1,
                'msg'       => 'Login Failed!, there is an error in your username or password, please, try again!',
                'type'      => 'warning',
                'icon'      => 'error_outline',
                'status'    => 'Error!',
                'delay'     => 3500
                
            );
        }
        
    }
    
    public function useradd($data) {
        if($this->db->insert('users', $data)){
            $resp = array(
                'err'=>'0',
                'msg'=>"{$data['firstname']} {$data['lastname']} ha sido registrado satisfactoriamente!",
                'delay'=>3500,
                'status'=>'Success!',
                'icon'=>'check_circle',
                'type'=>'success',
                'user_id' => $this->db->insert_id()
            );
        }else{
            $resp = array(
                'err'=>'1',
                'msg'=>"Ha ocurrido un error al registrar a {$data['firstname']} {$data['lastname']}, por favor intente nuevamente",
                'delay'=>3500,
                'status'=>'Error!',
                'icon'=>'warning',
                'type'=>'danger'
            );
        }
        return $resp;
    }
    
    public function get_usr_unitName($unit) {
        $this->db->select('unit_name');
        $church = $this->db->get_where('church_unit', array('id' => $unit));
        return $church->row()->unit_name;
    }
    
    public function pass_update($data, $id) {
        $strd_pass = $this->db->select('password')->get_where('users', array('id' => $id))->row();
        $pass = md5($data['password']);
        if($pass === $strd_pass->password){
            $this->db->where('id', $id);
            if($this->db->update('users', array('password' => md5($data['new_password'])))){
                $this->db->where('id', $id);
                $this->db->update('users', array('firstlogin' => 0));
                $resp = array(
                    'err'=>0,
                    'msg'=>"Su contraseña ha sido actualizado exitosamente! sera redirigido al panel de inicio.",
                    'delay'=>3500,
                    'status'=>'Success!',
                    'icon'=>'check_circle',
                    'type'=>'success',
                );
            }else{
                $resp = array(
                    'err'=>1,
                    'msg'=>"Su contraseña no ha podido ser actualizada, por favor intente de nuevo",
                    'delay'=>3500,
                    'status'=>'Error!',
                    'icon'=>'warning',
                    'type'=>'danger',
                );
            }
        }else{
            $resp = array(
                'err'=>'1',
                'msg'=>"Su contraseñ actual no coincide, intente nuevamente",
                'delay'=>3500,
                'status'=>'Error!',
                'icon'=>'warning',
                'type'=>'danger',
            );
        }
        return $resp;
    }
    
    public function setuserperms($data) {
        if($this->db->insert_batch('user_menu', $data)){
            $resp = array(
                'err'=>0,
                'msg'=>"Permisos de usuario configurados con exito.",
                'delay'=>3500,
                'status'=>'Success!',
                'icon'=>'check_circle',
                'type'=>'success',
            );
        }else{
            $resp = array(
                'err'=>'1',
                'msg'=>"Algo ha salido mal, intenta nuevamente!",
                'delay'=>3500,
                'status'=>'Error!',
                'icon'=>'warning',
                'type'=>'danger',
            );
        }
        return $resp;
    }
    
}
