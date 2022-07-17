<?php

/**
 * Description of Mnmva_model
 *
 * @author jarvis
 */
class Mnmva_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
        $this->db->query("SET SESSION sql_mode = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
    }
    
    public function getlist($unit,$scope, $filter) {
        switch ($scope){
            case 1:        
                $this->db->select('id');
                $unitArr = self::getunitslist($unit, $unitArr = array());
                $this->db->where_in('unit',$unitArr);
                if($filter != false){ $this->db->where($filter); }
                $this->db->order_by('date_modified', 'DESC');
                $query = $this->db->get('informe_mnmva');
                break;
            case 2;
                $this->db->where(array('unit'         => $unit));
                if($filter != false){ $this->db->where($filter); }
                $this->db->order_by('date_modified', 'DESC');
                $query = $this->db->get('informe_mnmva');
                break;
        }
        
        return $query->result_array();
        
    }
    
    public function addmn($data) {
        $insert = $this->db->insert_string('informe_mnmva', $data);

        if($this->db->query($insert)){
            $resp = array(
                'err'        => '0',
                'msg'        => "{$data['name']} se ha registrado correctamente, sera redirigido a su IMNMVA",
                'delay'      => 3500,
                'status'     => 'Success!',
                'icon'       => 'check_circle',
                'type'       => 'success',
                'mnmvaid'    => $this->db->insert_id()
            );
        }else{
            $resp = array(
                'err'        	=> '1',
                'msg'        	=> "Ha ocurrido un error al registrar a {$data['name']}, por favor intente nuevamente",
                'delay'        	=> 3500,
                'status'        => 'Error!',
                'icon' 			=> 'warning',
                'type' 			=> 'danger'
            );
        }
        return $resp;
    }
    
    public function getmn($id) {
        $query = $this->db->get_where('informe_mnmva', array('id'        => $id));
        return $query->row();
    }
    
    public function updatemn($data, $id) {
        $where = ' id = '.$id;
        $data['date_modified'] = date('Y-m-d h:i:s');
        $update = $this->db->update_string('informe_mnmva',$data, $where);
        if($this->db->query($update)){
            $this->db->select('name');
            $mnName = $this->db->get_where('informe_mnmva', array('id'         => $id));
            $nm = $mnName->row();
            $resp = array(
                'err'        => 'false',
                'msg'        => "la informacion de $nm->name se ha actualizado correctamente",
                'delay'      => 3500,
                'status'     => 'Success!',
                'icon'       => 'check_circle',
                'type'       => 'success'
            );
        }
        return $resp;
    }
    
    public function get_charts($unit, $scope, $filters) {
        $notNull = 'bishop_interview IS NOT NULL AND priesthood NOT LIKE "No Ordenado" AND gospel_principals IS NOT NULL AND lessons_start IS NOT NULL AND lessons_end IS NOT NULL AND calling_date IS NOT NULL AND asistance IS NOT NULL AND genealogy IS NOT NULL AND melchisedeq IS NOT NULL AND vicary_baptism IS NOT NULL AND temple_prep IS NOT NULL AND temple_inv IS NOT NULL AND temple_sel IS NOT NULL';
        
        $isnull = 'bishop_interview IS NULL AND priesthood LIKE "No Ordenado"  AND gospel_principals IS NULL AND lessons_start IS NULL AND lessons_end IS NULL AND calling_date IS NULL AND asistance IS NULL AND genealogy IS NULL AND melchisedeq IS NULL AND vicary_baptism IS NULL AND temple_prep IS NULL AND temple_inv IS NULL AND temple_sel IS NULL';
        switch ($scope){
            case 0:
                break;
            case 1:
                $this->db->select('id');
                $child_units = $this->db->get_where('church_unit', array('unit_parent' => $unit));
                $unitArr = self::getunitslist($unit, $unitArr = array());
                $this->db->select('COUNT(*) AS completed');
                $this->db->from('informe_mnmva');
                $this->db->where($notNull);
                $this->db->where($filters);
                $this->db->where_in('unit', $unitArr);
                $completed = $this->db->get();
                $comp = $completed->result_array();
                $this->db->select('COUNT(*) AS nothing');
                $this->db->from('informe_mnmva');
                $this->db->where($isnull);
                $this->db->where($filters);
                $this->db->where_in('unit', $unitArr);
                $nothing = $this->db->get();
                $nada = $nothing->result_array();
                $this->db->select("COUNT(*) AS todos");
                $this->db->from('informe_mnmva');
                $this->db->where_in('unit', $unitArr);
                $all = $this->db->get();
                $todos = $all->result_array();
                break;
            case 2:
                $this->db->select('COUNT(*) AS completed');
                $this->db->from('informe_mnmva');
                $this->db->where($notNull);
                $this->db->where($filters);
                $this->db->where('unit', $unit);
                $completed = $this->db->get();
                $comp = $completed->result_array();
                $this->db->select('COUNT(*) AS nothing');
                $this->db->from('informe_mnmva');
                $this->db->where($isnull);
                $this->db->where($filters);
                $this->db->where('unit', $unit);
                $nothing = $this->db->get();
                $nada = $nothing->result_array();
                $this->db->select("COUNT(*) AS todos");
                $this->db->from('informe_mnmva');
                $this->db->where('unit', $unit);
                $all = $this->db->get();
                $todos = $all->result_array();
                break;
        }
        
        $pr = self::priesthoodRetention($unit, $scope, $filters);
        $st = self::timestep($unit,$scope, $filters);
//        $ministering = self::getMinistering($unit,$scope, $filters);
//        $recomendation = self::getRecomendation($unit,$scope, $filters);
        
        $result = array(
            'completed'             => isset($comp[0]['completed'])     ? $comp[0]['completed'] : null,
            'nothing'               => isset($nada[0]['nothing'])       ? $nada[0]['nothing'] : null,
            'some'                  => $todos[0]['todos'] - ($comp[0]['completed'] + $nada[0]['nothing']),
            'melchisedec'           => isset($pr['melchisedec'])        ? $pr['melchisedec'] : null,
            'aaronic'			    => isset($pr['aaronic'])            ? $pr['aaronic'] : null,
            'notOrdained'           => isset($pr['notOrdained'])        ? $pr['notOrdained'] : null,
            'bishop_interview'      => isset($st['bishop_interview'])   ? $st['bishop_interview'] : null,
            'aaronic_priesthood'    => isset($st['aaronic_priesthood']) ? $st['aaronic_priesthood'] : null,
            'gospel_principals'     => isset($st['gospel_principals']) ? $st['gospel_principals'] : null,
            'lessons_start'         => isset($st['lessons_start']) ? $st['lessons_start'] : null,
            'lessons_end'           => isset($st['lessons_end']) ? $st['lessons_end'] : null,
            'calling_date'          => isset($st['calling_date']) ? $st['calling_date'] : null,
            'asistance'             => isset($st['asistance']) ? $st['asistance'] : null,
            'genealogy'             => isset($st['genealogy']) ? $st['genealogy'] : null,
            'melchisedeq'           => isset($st['melchisedeq']) ? $st['melchisedeq'] : null,
            'vicary_baptism'        => isset($st['vicary_baptism']) ? $st['vicary_baptism'] : null,
            'temple_prep'           => isset($st['temple_prep']) ? $st['temple_prep'] : null,
            'temple_inv'            => isset($st['temple_inv']) ? $st['temple_inv'] : null,
            'temple_sel'            => isset($st['temple_sel']) ? $st['temple_sel'] : null,
            'minbi'         	    => isset($st['minbi']) ? $st['minbi'] : null,
            'minap'         	    => isset($st['minap']) ? $st['minap'] : null,
            'mingp'         	    => isset($st['mingp']) ? $st['mingp'] : null,
            'minls'         	    => isset($st['minls']) ? $st['minls'] : null,
            'minle'         	    => isset($st['minle']) ? $st['minle'] : null,
            'mincd'         	    => isset($st['mincd']) ? $st['mincd'] : null,
            'minasis'         	    => isset($st['minasis']) ? $st['minasis'] : null,
            'minge'         	    => isset($st['minge']) ? $st['minge'] : null,
            'minmel'         	    => isset($st['minmel']) ? $st['minmel'] : null,
            'minvb'         	    => isset($st['minvb']) ? $st['minvb'] : null,
            'mintp'         	    => isset($st['mintp']) ? $st['mintp'] : null,
            'minti'        		    => isset($st['minti']) ? $st['minti'] : null,
            'mints'         	    => isset($st['mints']) ? $st['mints'] : null,
            'maxbi'         	    => isset($st['maxbi']) ? $st['maxbi'] : null,
            'maxap'         	    => isset($st['maxap']) ? $st['maxap'] : null,
            'maxgp'         	    => isset($st['maxgp']) ? $st['maxgp'] : null,
            'maxls'         	    => isset($st['maxls']) ? $st['maxls'] : null,
            'maxle'         	    => isset($st['maxle']) ? $st['maxle'] : null,
            'maxcd'         	    => isset($st['maxcd']) ? $st['maxcd'] : null,
            'maxasis'         	    => isset($st['maxasis']) ? $st['maxasis'] : null,
            'maxge'         	    => isset($st['maxge']) ? $st['maxge'] : null,
            'maxmel'         	    => isset($st['maxmel']) ? $st['maxmel'] : null,
            'maxvb'         	    => isset($st['maxvb']) ? $st['maxvb'] : null,
            'maxtp'         	    => isset($st['maxtp']) ? $st['maxtp'] : null,
            'maxti'        		    => isset($st['maxti']) ? $st['maxti'] : null,
            'maxts'         	    => isset($st['maxts']) ? $st['maxts'] : null,
//            'ministered'            => isset($ministering['ministered']) ? $ministering['ministered'] : null,
//            'totalMinis'            => isset($ministering['total']) ? $ministering['total'] : null,
//            'notMinistered'         => $ministering['total'] - $ministering['ministered'],
//            'recomendation'         => isset($recomendation['templeRec']) ? $recomendation['templeRec'] : null,
//            'notRec'         	    => $recomendation['total'] - $recomendation['templeRec']
        );
        return $result;
    }
    
    public function priesthoodRetention($unit, $scope, $filters) {
        switch ($scope){
            case 1:
                $unitArr = self::getunitslist($unit, $unitArr = array());
                $this->db->select('COUNT(*) AS melchisedec');
                $this->db->where($filters);
                $this->db->where_in( 'unit', $unitArr);
                $melq = $this->db->get_where('informe_mnmva', array('gender' => 'H', 'edad >=' => '12', 'priesthood' => 'elder'));
                $m = $melq->row();
//                echo $this->db->last_query();
                $this->db->select('COUNT(*) AS aaronic');
                $this->db->where_in( 'unit', $unitArr);
                $this->db->where($filters);
                $this->db->where_in('priesthood', array('Diacono','Maestro','Presbitero'));
                $aaron = $this->db->get_where('informe_mnmva', array('gender' => 'H', 'edad >=' => '12'));
//                echo $this->db->last_query();
                $aa = $aaron->row();
                $this->db->select('COUNT(*) AS notOrdained');
                $this->db->where_in( 'unit', $unitArr);
                $this->db->where($filters);
                $notOr = $this->db->get_where('informe_mnmva', array('gender' => 'H', 'edad >=' => '12', 'priesthood' => 'No Ordenado'));
//                echo $this->db->last_query();
                $nO = $notOr->row();
                break;
            case 2:
                $this->db->select('COUNT(*) AS melchisedec');
                $melq = $this->db->get_where('informe_mnmva', array('gender' => 'H', 'edad >=' => '12', 'priesthood' => 'elder', 'unit' => $unit));
                $m = $melq->row();
//                echo $this->db->last_query();
                $this->db->select('COUNT(*) AS aaronic');
                $this->db->where_in('priesthood', array('Diacono','Maestro','Presbitero'));
                $this->db->where($filters);
                $aaron = $this->db->get_where('informe_mnmva', array('gender' =>'H', 'edad >=' => '12', 'unit' => $unit));
//                echo $this->db->last_query();
                $aa = $aaron->row();
                $this->db->select('COUNT(*) AS notOrdained');
                $this->db->where($filters);
                $notOr = $this->db->get_where('informe_mnmva', array('gender' => 'H', 'edad >=' => '12', 'priesthood' => 'No Ordenado', 'unit' => $unit));
//                echo $this->db->last_query();
                $nO = $notOr->row();
                break;
        }
        $res = array('melchisedec' => $m->melchisedec,'aaronic' => $aa->aaronic, 'notOrdained' => $nO->notOrdained);
        return $res;
        
    }
    
    public function getMinistering($unit,$scope, $filters) {
        switch ($scope){
            case 1:
                $unitArr = self::getunitslist($unit, $unitArr = array());
                $this->db->select('SUM(IF( ISNULL( `informe_mnmva`.`ministeringbrothers`) OR ISNULL(`informe_mnmva`.`ministeringsisters`),0,1)) AS ministered, count(*) AS total');
                $this->db->from('informe_mnmva');
                $this->db->where($filters);
                $this->db->where_in('unit', $unitArr);
                $ministering = $this->db->get();
                $result = $ministering->result_array();
                break;
            case 2:
                $this->db->select('SUM(IF( ISNULL( `informe_mnmva`.`ministeringbrothers`) OR ISNULL(`informe_mnmva`.`ministeringsisters`),0,1)) AS ministered, count(*) AS total');
                $this->db->from('informe_mnmva');
                $this->db->where($filters);
                $this->db->where('unit', $unit);
                $ministering = $this->db->get();
                $result = $ministering->result_array();
                break;
        }   
        return $result[0];
    }
    
    public function getRecomendation($unit,$scope, $filters) {
        switch ($scope){
            case 1:
                $unitArr = self::getunitslist($unit, $unitArr = array());
                $this->db->select('SUM(NOT ISNULL( `informe_mnmva`.`templerecomendation`)) AS templeRec, count(*) AS total');
                $this->db->from('informe_mnmva');
                $this->db->where($filters);
                $this->db->where_in('unit', $unitArr);
                $ministering = $this->db->get();
                $result = $ministering->result_array();
                break;
            case 2:
                $this->db->select('SUM(NOT ISNULL( `informe_mnmva`.`templerecomendation`)) AS templeRec, count(*) AS total');
                $this->db->from('informe_mnmva');
                $this->db->where($filters);
                $this->db->where('unit', $unit);
                $ministering = $this->db->get();
                $result = $ministering->result_array();
                break;
        }   
        return $result[0];
    }
    
    public function timestep($unit,$scope){
        switch($scope){
            case 1:
//                $child_units = $this->db->get_where('church_unit', array('unit_parent'         => $unit));
//                $unitArr = self::getunitslist($unit, $unitArr = array());
//                $this->db->select('AVG(`bishop_interview`) AS `bishop_interview`,
//                MIN(`bishop_interview`) AS minbi,
//                MAX(`bishop_interview`) AS maxbi,
//                AVG(`aaronic_priesthood`) AS `aaronic_priesthood`,
//                MIN(`aaronic_priesthood`) AS minap,
//                MAX(`aaronic_priesthood`) AS maxap,
//                AVG(`gospel_principals`) AS `gospel_principals`,
//                MIN(`gospel_principals`) AS mingp,
//                MAX(`gospel_principals`) AS maxgp,
//                AVG(`lessons_start`) AS `lessons_start`,
//                MIN(`lessons_start`) AS minls,
//                MAX(`lessons_start`) AS maxls,
//                AVG(`lessons_end`) AS `lessons_end`,
//                MIN(`lessons_end`) AS minle,
//                MAX(`lessons_end`) AS maxle,
//                AVG(`calling_date`) AS `calling_date`,
//                MIN(`calling_date`) AS mincd,
//                MAX(`calling_date`) AS maxcd,
//                AVG(`asistance`) AS `asistance`,
//                MIN(`asistance`) AS minasis,
//                MAX(`asistance`) AS maxasis,
//                AVG(`genealogy`) AS `genealogy`,
//                MIN(`genealogy`) AS minge,
//                MAX(`genealogy`) AS maxge,
//                AVG(`melchisedeq`) AS `melchisedeq`,
//                MIN(`melchisedeq`) AS minmel,
//                MAX(`melchisedeq`) AS maxmel,
//                AVG(`vicary_baptism`) AS `vicary_baptism`,
//                MIN(`vicary_baptism`) AS minvb,
//                MAX(`vicary_baptism`) AS maxvb,
//                AVG(`temple_prep`) AS `temple_prep`,
//                MIN(`temple_prep`) AS mintp,
//                MAX(`temple_prep`) AS maxtp,
//                AVG(`temple_inv`) AS `temple_inv`,
//                MIN(`temple_inv`) AS minti,
//                MAX(`temple_inv`) AS maxti,
//                AVG(`temple_sel`) AS `temple_sel`,
//                MIN(`temple_sel`) AS mints,
//                MAX(`temple_sel`) AS maxts');
//                $this->db->from('`steps_periods`');
//                $this->db->where('confirm_date > "'.date("Y-m-d",strtotime('-2 year', $hoy = strtotime('now'))).'"');
//                $this->db->where_in('unit',$unitArr);
//                $stpTime = $this->db->get();

				$res = array();
				for($i = 0; $i < 38; $i++){
					array_push($res, 0);
				}
                break;
            case 2:
//                $stpTime = $this->db->query('SELECT
//                AVG(`bishop_interview`) AS `bishop_interview`,
//                MIN(`bishop_interview`) AS minbi,
//                MAX(`bishop_interview`) AS maxbi,
//                AVG(`aaronic_priesthood`) AS `aaronic_priesthood`,
//                MIN(`aaronic_priesthood`) AS minap,
//                MAX(`aaronic_priesthood`) AS maxap,
//                AVG(`gospel_principals`) AS `gospel_principals`,
//                MIN(`gospel_principals`) AS mingp,
//                MAX(`gospel_principals`) AS maxgp,
//                AVG(`lessons_start`) AS `lessons_start`,
//                MIN(`lessons_start`) AS minls,
//                MAX(`lessons_start`) AS maxls,
//                AVG(`lessons_end`) AS `lessons_end`,
//                MIN(`lessons_end`) AS minle,
//                MAX(`lessons_end`) AS maxle,
//                AVG(`calling_date`) AS `calling_date`,
//                MIN(`calling_date`) AS mincd,
//                MAX(`calling_date`) AS maxcd,
//                AVG(`asistance`) AS `asistance`,
//                MIN(`asistance`) AS minasis,
//                MAX(`asistance`) AS maxasis,
//                AVG(`genealogy`) AS `genealogy`,
//                MIN(`genealogy`) AS minge,
//                MAX(`genealogy`) AS maxge,
//                AVG(`melchisedeq`) AS `melchisedeq`,
//                MIN(`melchisedeq`) AS minmel,
//                MAX(`melchisedeq`) AS maxmel,
//                AVG(`vicary_baptism`) AS `vicary_baptism`,
//                MIN(`vicary_baptism`) AS minvb,
//                MAX(`vicary_baptism`) AS maxvb,
//                AVG(`temple_prep`) AS `temple_prep`,
//                MIN(`temple_prep`) AS mintp,
//                MAX(`temple_prep`) AS maxtp,
//                AVG(`temple_inv`) AS `temple_inv`,
//                MIN(`temple_inv`) AS minti,
//                MAX(`temple_inv`) AS maxti,
//                AVG(`temple_sel`) AS `temple_sel`,
//                MIN(`temple_sel`) AS mints,
//                MAX(`temple_sel`) AS maxts
//            FROM
//                `steps_periods`
//            WHERE
//                `unit` = '.$unit.'
//                AND confirm_date > "'.date("Y-m-d",strtotime('-2 year', $hoy = strtotime('now'))).'"');

				$res = array();
				for($i = 0; $i < 38; $i++){
					array_push($res, 0);
				}
                break;
        }
//        $res = $stpTime->result_array();
//        return $res[0];
		return $res;
    }

    public function getunitslist($unit, $unitArr) {
        if(!isset($GLOBALS['unitArr'])){
            $GLOBALS['unitArr'] = array();
        }
        $this->db->select('id, unit_type');
        $child_units = $this->db->get_where('church_unit', array('unit_parent' => $unit));
        foreach ($child_units->result_array() as $value) {
            if($value['unit_type'] == 'leaf'){
                array_push($GLOBALS['unitArr'], $value['id']);
            }else{
                self::getunitslist($value['id'], $unitArr);
            }
        }
        return $GLOBALS['unitArr'];
    }
    
}
