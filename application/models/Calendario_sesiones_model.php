<?php
class Calendario_sesiones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_calendario_sesiones_consejo($cve_consejo, $dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select cs.*, ss.nom_status from calendario_sesiones cs left join status_sesiones ss on cs.cve_status= ss.cve_status where cs.cve_consejo = ? and dependencia LIKE ? and area LIKE ? order by cs.fecha asc";
        $query = $this->db->query($sql, array($cve_consejo, $dependencia, $area));
        return $query->result_array();
    }

    public function get_calendario_sesiones_dependencia($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select c.nom_consejo, cs.nom_sesion, cs.fecha, cs.hora, ss.nom_status from calendario_sesiones cs left join status_sesiones ss on cs.cve_status = ss.cve_status left join consejos c on cs.cve_consejo = c.cve_consejo where cs.dependencia LIKE ? and cs.area LIKE ? and cs.fecha >= now() order by cs.fecha asc";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function guardar($cve_consejo, $nom_sesion, $dependencia, $area, $fecha, $hora, $cve_status)
    {
        $data = array(
            'cve_consejo' => $cve_consejo,
            'nom_sesion' => $nom_sesion,
            'dependencia' => $dependencia,
            'area' => $area,
            'fecha' => $fecha,
            'hora' => $hora,
            'cve_status' => $cve_status
        );

        $this->db->insert('calendario_sesiones', $data);
    }

    public function actualizar_status($cve_evento, $cve_consejo, $cve_status)
    {
        $data = array(
            'cve_status' => $cve_status
        );

        $this->db->where('cve_evento', $cve_evento);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->update('calendario_sesiones', $data);
    }

    public function eliminar_registro($cve_evento, $cve_consejo)
    {
        $this->db->where('cve_evento', $cve_evento);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->delete('calendario_sesiones');
    }

}

