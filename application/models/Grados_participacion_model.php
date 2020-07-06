<?php
class Grados_participacion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_grados_participacion() {
        $sql = 'select * from grados_participacion order by cve_grado_participacion;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_grado_participacion($cve_grado_participacion) {
        $sql = 'select * from grados_participacion where cve_grado_participacion = ?;';
        $query = $this->db->query($sql, array($cve_grado_participacion));
        return $query->row_array();
    }

    public function guardar($data, $cve_grado_participacion)
    {
        if ($cve_grado_participacion) {
            $this->db->where('cve_grado_participacion', $cve_grado_participacion);
            $result = $this->db->update('grados_participacion', $data);
        } else {
            $result = $this->db->insert('grados_participacion', $data);
        }
        return $result;
    }

    public function eliminar($cve_grado_participacion)
    {
        $this->db->where('cve_grado_participacion', $cve_grado_participacion);
        $result = $this->db->delete('grados_participacion');
        return $result;
    }

}

