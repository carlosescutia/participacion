<?php
class Calendario_sesiones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_calendario_sesiones_consejo($cve_consejo, $dependencia) {
        $sql = "select cs.* from calendario_sesiones cs where cs.cve_consejo = ? and dependencia = ? order by cs.fecha asc";
        $query = $this->db->query($sql, array($cve_consejo, $dependencia));
        return $query->result_array();
    }

    public function get_calendario_sesiones_dependencia($dependencia) {
        $sql = "select c.nom_consejo, cs.nom_sesion, cs.fecha, cs.hora, ss.nom_status from calendario_sesiones cs left join status_sesiones ss on cs.cve_status = ss.cve_status left join consejos c on cs.cve_consejo = c.cve_consejo where cs.dependencia = ? order by cs.fecha asc";
        $query = $this->db->query($sql, array($dependencia));
        return $query->result_array();
    }


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

}

