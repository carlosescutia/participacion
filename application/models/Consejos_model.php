<?php
class Consejos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_consejos_dependencia($dependencia) {
        $sql = 'select c.* from consejos c where c.dependencia=? order by c.nom_consejo';
        $query = $this->db->query($sql, array($dependencia));
        return $query->result_array();
    }

    public function get_consejo_dependencia($dependencia, $cve_consejo) {
        $sql = 'select c.* from consejos c where c.dependencia=? and c.cve_consejo=? order by c.nom_consejo';
        $query = $this->db->query($sql, array($dependencia, $cve_consejo));
        return $query->row_array();
    }

}
