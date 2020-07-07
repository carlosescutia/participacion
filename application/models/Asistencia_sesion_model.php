<?php
class Asistencia_sesion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_asistencia_sesion($cve_sesion, $cve_consejo) {
        $sql = "select ase.* from asistencia_sesion ase where ase.cve_sesion = ? and ase.cve_consejo = ? order by cve_asistencia";
        $query = $this->db->query($sql, array($cve_sesion, $cve_consejo));
        return $query->result_array();
    }

    public function actualizar_asistencia($cve_asistencia, $cve_sesion, $cve_consejo, $asistencia)
    {
        $data = array(
            'asistencia' => $asistencia
        );

        $this->db->where('cve_asistencia', $cve_asistencia);
        $this->db->where('cve_sesion', $cve_sesion);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->update('asistencia_sesion', $data);
    }

    public function actualizar_grado_participacion($cve_asistencia, $cve_sesion, $cve_consejo, $cve_grado_participacion)
    {
        $data = array(
            'cve_grado_participacion' => $cve_grado_participacion
        );

        $this->db->where('cve_asistencia', $cve_asistencia);
        $this->db->where('cve_sesion', $cve_sesion);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->update('asistencia_sesion', $data);
    }

    public function generar_lista($cve_sesion, $cve_consejo)
    {
        $sql = "insert into asistencia_sesion (cve_sesion, cve_consejo, nom_actor, dependencia, nom_sector, asistencia, cve_grado_participacion) select ? as cve_sesion, ca.cve_consejo, a.nombre || ' ' || a.apellido_pa || ' ' || a.apellido_ma as nom_actor, a.dependencia, s.nom_sector, 'n' as asistencia, 4 as cve_grado_participacion from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join sectores s on a.cve_sector = s.cve_sector where ca.cve_consejo = ? order by ca.status desc, ca.cve_cargo ";
        $query = $this->db->query($sql, array($cve_sesion, $cve_consejo));
    }

    public function eliminar_lista($cve_sesion, $cve_consejo)
    {
        $this->db->where('cve_sesion', $cve_sesion);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->delete('asistencia_sesion');
    }

}
