<?php
class Planteamientos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_planteamientos() {
        $sql = 'select * from planteamientos order by cve_planteamiento;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_planteamiento($cve_planteamiento) {
        $sql = 'select * from planteamientos where cve_planteamiento = ?;';
        $query = $this->db->query($sql, array($cve_planteamiento));
        return $query->row_array();
    }

    public function guardar($data, $cve_planteamiento)
    {
        if ($cve_planteamiento) {
            $this->db->where('cve_planteamiento', $cve_planteamiento);
            $result = $this->db->update('planteamientos', $data);
        } else {
            $result = $this->db->insert('planteamientos', $data);
        }
        return $result;
    }

    public function eliminar($cve_planteamiento)
    {
        $this->db->where('cve_planteamiento', $cve_planteamiento);
        $result = $this->db->delete('planteamientos');
        return $result;
    }

}
