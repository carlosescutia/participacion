<?php
class Actores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_actores($cve_actor = 0) {
        if ($cve_actor == 0) {
            $sql = 'select * from actores ;';
            $query = $this->db->query($sql, array($cve_actor));
            return $query->result_array();
        } else {
            $sql = 'select * from actores where cve_actor = ? ;';
            $query = $this->db->query($sql, array($cve_actor));
            return $query->row_array();
        }
    }

}

