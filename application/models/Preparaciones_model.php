<?php
class Preparaciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_preparaciones() {
        $sql = 'select * from preparaciones order by cve_preparacion;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_preparacion($cve_preparacion) {
        $sql = 'select * from preparaciones where cve_preparacion = ?;';
        $query = $this->db->query($sql, array($cve_preparacion));
        return $query->row_array();
    }

    public function guardar($data, $cve_preparacion)
    {
        if ($cve_preparacion) {
            $this->db->where('cve_preparacion', $cve_preparacion);
            $result = $this->db->update('preparaciones', $data);
        } else {
            $result = $this->db->insert('preparaciones', $data);
        }
        return $result;
    }

    public function eliminar($cve_preparacion)
    {
        $this->db->where('cve_preparacion', $cve_preparacion);
        $result = $this->db->delete('preparaciones');
        return $result;
    }

}

