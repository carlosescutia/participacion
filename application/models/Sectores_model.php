<?php
class Sectores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_sectores() {
        $sql = 'select * from sectores order by cve_sector;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

