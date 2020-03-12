<?php
class Municipios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_municipios() {
        $sql = 'select * from municipios order by cve_mun;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}


