<?php
class Plazos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_plazos() {
        $sql = 'select * from plazos order by cve_plazo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_plazo($cve_plazo) {
        $sql = 'select * from plazos where cve_plazo = ?;';
        $query = $this->db->query($sql, array($cve_plazo));
        return $query->row_array();
    }

    public function guardar($data, $cve_plazo)
    {
        if ($cve_plazo) {
            $this->db->where('cve_plazo', $cve_plazo);
            $result = $this->db->update('plazos', $data);
        } else {
            $result = $this->db->insert('plazos', $data);
        }
        return $result;
    }

    public function eliminar($cve_plazo)
    {
        $this->db->where('cve_plazo', $cve_plazo);
        $result = $this->db->delete('plazos');
        return $result;
    }

}

