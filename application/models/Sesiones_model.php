<?php
class Sesiones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_sesiones_consejo($cve_consejo) {
        $sql = "select s.* from sesiones s where s.cve_consejo = ? order by s.fecha desc";
        $query = $this->db->query($sql, array($cve_consejo));
        return $query->result_array();
    }

    public function get_sesion_consejo($cve_sesion, $cve_consejo) {
        $sql = "select s.* from sesiones s where s.cve_sesion = ? and cve_consejo = ?";
        $query = $this->db->query($sql, array($cve_sesion, $cve_consejo));
        return $query->row_array();
    }

    public function guardar($data, $cve_sesion=null)
    {
        if (isset($cve_sesion)) {
            $this->db->where('cve_sesion', $cve_sesion);
            $this->db->where('cve_consejo', $data['cve_consejo']);
            $this->db->update('sesiones', $data);
            $id = $cve_sesion;
        } else {
            $this->db->insert('sesiones', $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }

    public function actualizar_acceso_adjunto($cve_sesion, $cve_consejo, $adjunto, $valor_acceso)
    {
        $data = array(
            $adjunto => $valor_acceso
        );

        print_r($data);

        $this->db->where('cve_sesion', $cve_sesion);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->update('sesiones', $data);
    }

}
