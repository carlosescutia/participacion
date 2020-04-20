<?php
class Calendario_sesiones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_calendario_sesiones_consejo($cve_consejo) {
        $sql = "select cs.* from calendario_sesiones cs where cs.cve_consejo = ? order by cs.fecha asc";
        $query = $this->db->query($sql, array($cve_consejo));
        return $query->result_array();
    }


    public function guardar($cve_consejo, $nom_sesion, $fecha, $hora, $cve_status)
    {
        $data = array(
            'cve_consejo' => $cve_consejo,
            'nom_sesion' => $nom_sesion,
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

    public function eliminar_registro($cve_sesion, $cve_consejo)
    {
        $this->db->where('cve_sesion', $cve_sesion);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->delete('calendario_sesiones');
    }

}

