<?php
class Perfiles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_perfiles() {
        $sql = 'select * from perfiles order by cve_perfil;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

