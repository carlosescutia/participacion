<?php
class Tipo_consejos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tipo_consejos() {
        $sql = 'select * from tipo_consejos order by cve_tipo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}


