<?php
class Objetivo_plangto_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_objetivo_plangto() {
        $sql = 'select * from objetivo_plangto order by cve_objetivo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_objetivo($cve_objetivo) {
        $sql = 'select * from objetivo_plangto where cve_objetivo = ?;';
        $query = $this->db->query($sql, array($cve_objetivo));
        return $query->row_array();
    }

    public function guardar($data, $cve_objetivo)
    {
        if ($cve_objetivo) {
            $this->db->where('cve_objetivo', $cve_objetivo);
            $result = $this->db->update('objetivo_plangto', $data);
        } else {
            $result = $this->db->insert('objetivo_plangto', $data);
        }
        return $result;
    }

    public function eliminar($cve_objetivo)
    {
        $this->db->where('cve_objetivo', $cve_objetivo);
        $result = $this->db->delete('objetivo_plangto');
        return $result;
    }

}
