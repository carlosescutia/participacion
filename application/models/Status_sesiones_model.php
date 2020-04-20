<?php
class Status_sesiones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_status_sesiones() {
        $sql = 'select * from status_sesiones order by cve_status;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

