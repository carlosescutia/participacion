<?php
class Objetivos_sesion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_objetivos_sesion() {
        $sql = 'select * from objetivos_sesion order by cve_objetivo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_objetivo($cve_objetivo) {
        $sql = 'select * from objetivos_sesion where cve_objetivo = ?;';
        $query = $this->db->query($sql, array($cve_objetivo));
        return $query->row_array();
    }

    public function guardar($data, $cve_objetivo)
    {
        if ($cve_objetivo) {
            $this->db->where('cve_objetivo', $cve_objetivo);
            $result = $this->db->update('objetivos_sesion', $data);
        } else {
            $result = $this->db->insert('objetivos_sesion', $data);
        }
        return $result;
    }

    public function eliminar($cve_objetivo)
    {
        $this->db->where('cve_objetivo', $cve_objetivo);
        $result = $this->db->delete('objetivos_sesion');
        return $result;
    }

}

