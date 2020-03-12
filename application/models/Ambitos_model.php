<?php
class Ambitos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_ambitos() {
        $sql = 'select * from ambitos order by cve_ambito;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

