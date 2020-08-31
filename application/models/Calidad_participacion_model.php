<?php
class Calidad_participacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_calidad_participacion() {
        $sql = 'select * from calidad_participacion order by cve_calidad;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_calidad($cve_calidad) {
        $sql = 'select * from calidad_participacion where cve_calidad = ?;';
        $query = $this->db->query($sql, array($cve_calidad));
        return $query->row_array();
    }

    public function guardar($data, $cve_calidad)
    {
        if ($cve_calidad) {
            $this->db->where('cve_calidad', $cve_calidad);
            $result = $this->db->update('calidad_participacion', $data);
        } else {
            $result = $this->db->insert('calidad_participacion', $data);
        }
        return $result;
    }

    public function eliminar($cve_calidad)
    {
        $this->db->where('cve_calidad', $cve_calidad);
        $result = $this->db->delete('calidad_participacion');
        return $result;
    }

}
