<?php
class Atingencias_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_atingencias() {
        $sql = 'select * from atingencias order by cve_atingencia;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_atingencia($cve_atingencia) {
        $sql = 'select * from atingencias where cve_atingencia = ?;';
        $query = $this->db->query($sql, array($cve_atingencia));
        return $query->row_array();
    }

    public function guardar($data, $cve_atingencia)
    {
        if ($cve_atingencia) {
            $this->db->where('cve_atingencia', $cve_atingencia);
            $result = $this->db->update('atingencias', $data);
        } else {
            $result = $this->db->insert('atingencias', $data);
        }
        return $result;
    }

    public function eliminar($cve_atingencia)
    {
        $this->db->where('cve_atingencia', $cve_atingencia);
        $result = $this->db->delete('atingencias');
        return $result;
    }

}

