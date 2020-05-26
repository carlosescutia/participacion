<?php
class Cargos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_cargos() {
        $sql = 'select * from cargos order by cve_cargo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_cargo($cve_cargo) {
        $sql = 'select * from cargos where cve_cargo = ?;';
        $query = $this->db->query($sql, array($cve_cargo));
        return $query->row_array();
    }

    public function guardar($data, $cve_cargo)
    {
        if ($cve_cargo) {
            $this->db->where('cve_cargo', $cve_cargo);
            $result = $this->db->update('cargos', $data);
        } else {
            $result = $this->db->insert('cargos', $data);
        }
        return $result;
    }

    public function eliminar($cve_cargo)
    {
        $this->db->where('cve_cargo', $cve_cargo);
        $result = $this->db->delete('cargos');
        return $result;
    }

}

