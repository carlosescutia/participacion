<?php
class Acuerdos_sesion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_acuerdos_sesion($cve_sesion, $cve_consejo) {
        $sql = "select a.*, sac.nom_status from acuerdos_sesion a left join status_acuerdos_sesion sac on a.cve_status = sac.cve_status where a.cve_sesion = ? and a.cve_consejo = ? ";
        $query = $this->db->query($sql, array($cve_sesion, $cve_consejo));
        return $query->result_array();
    }

    public function get_acuerdo($cve_acuerdo, $cve_sesion, $cve_consejo) {
        $sql = "select a.*, sac.nom_status from acuerdos_sesion a left join status_acuerdos_sesion sac on a.cve_status = sac.cve_status where a.cve_acuerdo = ? and a.cve_sesion = ? and a.cve_consejo = ? ";
        $query = $this->db->query($sql, array($cve_acuerdo, $cve_sesion, $cve_consejo));
        return $query->row_array();
    }

    public function guardar($data, $cve_acuerdo=null)
    {
        if (isset($cve_acuerdo)) {
            $this->db->where('cve_acuerdo', $cve_acuerdo);
            $this->db->update('acuerdos_sesion', $data);
        } else {
            $this->db->insert('acuerdos_sesion', $data);
        }
    }

    public function eliminar_registro($cve_acuerdo, $cve_sesion, $cve_consejo)
    {
        $this->db->where('cve_acuerdo', $cve_acuerdo);
        $this->db->where('cve_sesion', $cve_sesion);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->delete('acuerdos_sesion');
    }

}
