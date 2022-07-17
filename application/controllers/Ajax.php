<?php



use Restserver\Libraries\REST_Controller;



defined('BASEPATH') OR exit('No direct script access allowed');



require APPPATH . 'libraries/REST_Controller.php';

require APPPATH . 'libraries/Format.php';



/**

 * Description of Ajax

 *

 * @author jarvis

 */

class Ajax extends REST_Controller {

    

    public function __construct() {

        parent::__construct();

        $this->load->library('session');

        $this->load->library('form_validation');

        $this->load->helper('url');
        //$this->output->enable_profiler(TRUE);

    }

    

    public function useradd_post() {

        $this->load->model('user_model');

        $rules = array(

            array(

                'field' =>  'firstname',

                'label' =>  'Nombre',

                'rules' =>  'trim|required',

                array('required' => 'Debe Ingresar un Nombre Valido' )

            ),

            array(

                'field' =>  'lastname',

                'label' =>  'Apellido',

                'rules' =>  'trim|required',

                array('required' => 'Debe Ingresar un Apellido Valido' )

            ),

            array(

                'field' =>  'email',

                'label' =>  'Correo Electronico',

                'rules' =>  'trim|required|valid_email|is_unique[users.email]'

            ),

            array(

                'field' =>  'login',

                'label' =>  'Nombre de Usuario',

                'rules' =>  'trim|required|alpha_numeric|min_length[5]|is_unique[users.login]'

            )

        );

        $this->form_validation->set_message('is_unique', '{field} ya registrado.');

        $this->form_validation->set_message('min_length', '{field} debe tener minimo {param} caracteres.');

        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() == TRUE){

            $data = $this->input->post();

            $data['password'] = md5($data['login']);

            //$data['church_unit'] = $this->session->church_unit;

            $data['date_added'] = date('Y-m-d');

            $data['date_modified'] = date('Y-m-d');

            $resp = $this->user_model->useradd($data);

            $resp['wapp'] = "{$this->session->firstname} {$this->session->lastname} te ha creado una cuenta de usuario en ";

            $resp['usr'] = $data['login'];

            $resp['pwd'] = $data['login'];

            $this->response($resp);

        } else {

            return $this->response(array(

                'err'=>'1',

                'msg'=>validation_errors(),

                'delay'=>2500,

                'status'=>'Error!',

                'icon'=>'warning',

                'type'=>'danger'

            ));

        }

    }

    

    public function passwdchange_post() {

        $this->load->model('user_model');

        $rules = array(

            array(

                'field' =>  'password',

                'label' =>  'Contraseña actual',

                'rules' =>  'trim|required'

            ),

            array(

                'field' =>  'new_password',

                'label' =>  'Nueva Contraseña',

                'rules' =>  'trim|required|min_length[5]'

            ),

            array(

                'field' =>  'conf_new_password',

                'label' =>  'Confirmar Contraseña',

                'rules' =>  'trim|required|min_length[5]|matches[new_password]'

            ),

        );

        $this->form_validation->set_message('matches', '{field} No coincide con <b>Nueva Contraseña</b>.');

        $this->form_validation->set_message('min_length', '{field} debe tener minimo {param} caracteres.');

        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() == TRUE){

            $resp = $this->user_model->pass_update($this->input->post(), $this->session->user_id);

        }else{

            $resp = array(

                'err'=>1,

                'msg'=>validation_errors(),

                'delay'=>3500,

                'status'=>'Error!',

                'icon'=>'warning',

                'type'=>'danger',

            );

        }

        return $this->response($resp);

    }

    

    public function newmn_post() {

        $this->load->model('mnmva_model');

        if($this->input->post()){

            $this->form_validation->set_rules('type', 'Tipo', 'required');

            $this->form_validation->set_rules('gender', 'Sexo', 'required');

            if($this->form_validation->run() == TRUE){

                $data = $this->input->post();

                $data['unit'] = $this->session->church_unit;

                $data['date_added'] = date('Y-m-d h:i:s');

                $data['date_modified'] = date('Y-m-d h:i:s');

                $resp = $this->mnmva_model->addmn($data);

                $this->response($resp);

            }

        }

    }

    

    public function set_user_perms_post() {

        $this->load->model('user_model');

        if($this->input->post()){

            $form = $this->input->post();

            $data = array();

            foreach ($form['menu_id'] as $value) {

                array_push($data, array(

                    'user_id' => $form['user_id'],

                    'menu_id' => $value,

                    'date_added' => date('Y-m-d'),

                    'date_modified' => date('Y-m-d')

                    )

                );

            }

//            echo '<pre>';echo var_export($data);echo '<pre>';die();

            $resp = $this->user_model->setuserperms($data);

            $this->response($resp);

        }

    }

    public function list_filter_post(){
        $this->load->library('parser');
        $this->load->model('mnmva_model');
        if($this->input->post('filter_unit')){
            $searchUnit = $this->input->post('filter_unit');
            $scope = ($this->input->post('unit_type') == 1 ) ? 1 : 2 ;
        }else{
            $searchUnit = $this->session->church_unit;
            $scope = $this->session->scope;
        }
        $filters = array();
        if($this->input->post('fl_sexo') != '-'){$filters['gender'] = $this->input->post('fl_sexo');}
        if($this->input->post('fl_priesthood') != '-'){$filters['priesthood'] = $this->input->post('fl_priesthood');}
        $conf_date = $this->input->post('fl_conf_date');
        $hoy = strtotime('now');
        switch ($conf_date){
            case '1':
                $filters['confirm_date >'] = date("Y-m-d",strtotime('-1 month', $hoy));
                break;
            case '12':
                $filters['confirm_date >'] = date("Y-m-d",strtotime('-12 month', $hoy));
                break;
            case '24':
                $filters['confirm_date >'] = date("Y-m-d",strtotime('-2 year', $hoy));
                break;
        }
        $edad = $this->input->post('fl_edad');
        switch ($edad){
            case '18':
                $filters['edad >='] = 18;
                break;
            case '1230':
                $filters['edad >='] = '12';
                $filters['edad <='] = '30';
                break;
        }
        
        $mns = $this->mnmva_model->getlist($searchUnit, $scope, $filters);
        $data['td']= array();
    /*
        $data['scope'] = $this->session->scope;
        $this->load->model('user_model');
        $data['unit_name'] = $this->user_model->get_usr_unitName($searchUnit);
        $data['church_unit'] = $this->session->church_unit;
        $data['child_units'] = $this->functions->getUnitsSel($searchUnit, $this->session->church_unit, $searchUnit); 
    */
        foreach ($mns as $value) {
            $value['color'] = ($value['gender'] == 'M') ? '#ff00ff' : '#00008b' ;
            $value['gender'] = ($value['gender'] == 'M') ? 'fa-female' : 'fa-male' ;
            if($value['bishop_interview'] != NULL){
                $value['bishop_interview'] = '<i class="text-success material-icons"  rel="tooltip" title data-original-title="'.$value['bishop_interview'].'">check_circle</i>';
            }else{
                $value['bishop_interview'] = '<i class="text-danger  material-icons">warning</i>' ;
            }
            if($value['priesthood'] == 'No Aplica'){
                $value['aaronic_priesthood'] = '<i class="text-warning material-icons" rel="tooltip" title data-original-title="No Aplica">remove_circle</i>';
            } else {
                $value['aaronic_priesthood'] = ($value['aaronic_priesthood'] == NULL ) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="'.$value['aaronic_priesthood'].'">check_circle</i>' ;
            }
            $value['gospel_principals'] = ( $value['gospel_principals'] == NULL ) ? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="'.$value['gospel_principals'].'">check_circle</i>' ;
            $value['lessons'] = ( $value['lessons_start'] == NULL )? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="inicio:'.$value['lessons_start'].' fin:'.$value['lessons_end'].'">check_circle</i>' ;
            $value['calling'] = ( $value['calling_date'] == NULL )? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="'.$value['calling_date'].'">check_circle</i>' ; 
            $value['asistance'] = ( $value['asistance'] == NULL )? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="'.$value['asistance'].'">check_circle</i>' ;
            $value['genealogy'] = ( $value['genealogy'] == NULL )? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="'.$value['genealogy'].'">check_circle</i>' ;
            if($value['priesthood'] == 'No Aplica'){
                $value['melchisedeq'] = '<i class="text-warning material-icons" rel="tooltip" title data-original-title="No Aplica">remove_circle</i>';
            }elseif(    $value['edad'] < 18 ){
                $value['melchisedeq'] = '<i class="text-warning material-icons" rel="tooltip" title data-original-title="No Aplica">remove_circle</i>';
            }else{
                $value['melchisedeq'] = ( $value['melchisedeq'] == NULL )? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="'.$value['melchisedeq'].'">check_circle</i>' ;
            }
            $value['vicary_baptism'] = ( $value['vicary_baptism'] == NULL )? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="'.$value['vicary_baptism'].'">check_circle</i>' ;
            $value['temple_prep'] = ( $value['temple_prep'] == NULL )? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="'.$value['temple_prep'].'">check_circle</i>' ;
            $value['temple_inv'] = ( $value['temple_inv'] == NULL )? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip" title data-original-title="'.$value['temple_inv'].'">check_circle</i>' ;
            $value['temple_sel'] = ( $value['temple_sel'] == NULL )? '<i class="text-danger  material-icons">warning</i>' : '<i class="text-success material-icons" rel="tooltip"  title data-original-title="'.$value['temple_sel'].'">check_circle</i>' ;
            array_push($data['td'], $value);
        }
        $rended = $this->parser->parse('listtbody', $data);
        $this->response($rended);
    }

    

}

