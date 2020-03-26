<?php
class Cargos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_cargos() {
        $sql = 'select * from cargos order by cve_cargo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
