<?php
class Modalidades_sesion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_modalidades_sesion() {
        $sql = 'select * from modalidades_sesion order by cve_modalidad;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_modalidad($cve_modalidad) {
        $sql = 'select * from modalidades_sesion where cve_modalidad = ?;';
        $query = $this->db->query($sql, array($cve_modalidad));
        return $query->row_array();
    }

    public function guardar($data, $cve_modalidad)
    {
        if ($cve_modalidad) {
            $this->db->where('cve_modalidad', $cve_modalidad);
            $result = $this->db->update('modalidades_sesion', $data);
        } else {
            $result = $this->db->insert('modalidades_sesion', $data);
        }
        return $result;
    }

    public function eliminar($cve_modalidad)
    {
        $this->db->where('cve_modalidad', $cve_modalidad);
        $result = $this->db->delete('modalidades_sesion');
        return $result;
    }

}

