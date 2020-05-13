<?php
class Acuerdos_sesion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_acuerdos_sesion($cve_sesion, $cve_consejo) {
        $sql = "select a.* from acuerdos_sesion a where a.cve_sesion = ? and a.cve_consejo = ? ";
        $query = $this->db->query($sql, array($cve_sesion, $cve_consejo));
        return $query->result_array();
    }

    /*
    public function guardar($cve_consejo, $nom_sesion, $dependencia, $fecha, $hora, $cve_status)
    {
        $data = array(
            'cve_consejo' => $cve_consejo,
            'nom_sesion' => $nom_sesion,
            'dependencia' => $dependencia,
            'fecha' => $fecha,
            'hora' => $hora,
            'cve_status' => $cve_status
        );

        $this->db->insert('calendario_sesiones', $data);
    }

    public function actualizar_status($cve_sesion, $cve_consejo, $cve_status)
    {
        $data = array(
            'cve_status' => $cve_status
        );

        $this->db->where('cve_sesion', $cve_sesion);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->update('calendario_sesiones', $data);
    }

    public function eliminar_registro($cve_sesion, $cve_consejo, $dependencia)
    {
        $this->db->where('cve_sesion', $cve_sesion);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->where('dependencia', $dependencia);
        $this->db->delete('calendario_sesiones');
    }
     */

}


