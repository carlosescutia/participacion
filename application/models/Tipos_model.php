<?php
class Tipos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tipos() {
        $sql = 'select * from tipos order by cve_tipo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

