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

    public function get_eje($cve_eje) {
        $sql = 'select * from ejes where cve_eje = ?;';
        $query = $this->db->query($sql, array($cve_eje));
        return $query->row_array();
    }

    public function guardar($data, $cve_eje)
    {
        if ($cve_eje) {
            $this->db->where('cve_eje', $cve_eje);
            $result = $this->db->update('ejes', $data);
        } else {
            $result = $this->db->insert('ejes', $data);
        }
        return $result;
    }

    public function eliminar($cve_eje)
    {
        $this->db->where('cve_eje', $cve_eje);
        $result = $this->db->delete('ejes');
        return $result;
    }

}
