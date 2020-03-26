<?php
class Ejes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_ejes() {
        $sql = 'select * from ejes order by cve_eje;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
