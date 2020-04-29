<?php
class Tipo_actores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tipo_actores() {
        $sql = 'select * from tipo_actores order by cve_tipo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

