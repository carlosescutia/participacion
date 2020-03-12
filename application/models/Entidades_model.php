<?php
class Entidades_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_entidades() {
        $sql = 'select * from entidades order by cve_ent;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
