<?php
class Status_acuerdos_sesion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_status_acuerdos_sesion() {
        $sql = 'select * from status_acuerdos_sesion order by cve_status;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}


