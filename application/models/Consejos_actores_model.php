<?php
class Consejos_actores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_consejos_actor($cve_actor) {
        $sql = "select ca.cve_consejo, cn.nom_consejo, ca.cve_cargo, cg.nom_cargo, ca.fecha_inicio, ca.fecha_fin, ca.status, (case when ca.status=1 then 'activo' else 'inactivo' end) as nom_status from consejos_actores ca left join consejos cn on ca.cve_consejo = cn.cve_consejo left join cargos cg on ca.cve_cargo = cg.cve_cargo where cve_actor = ? order by ca.status desc, ca.fecha_inicio desc";
        $query = $this->db->query($sql, array($cve_actor));
        return $query->result_array();
    }

    public function get_actores_consejo($cve_consejo) {
        $sql = "select ca.cve_consejo, ca.cve_actor, a.nombre || ' ' || a.apellido_pa || ' ' || a.apellido_ma as nom_actor, ca.cve_cargo, cg.nom_cargo, ca.fecha_inicio, ca.fecha_fin, ca.status, (case when ca.status=1 then 'activo' else 'inactivo' end) as nom_status, (case when ca.status=1 then 'activo' else 'inactivo' end) as nom_status from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join cargos cg on ca.cve_cargo = cg.cve_cargo where ca.cve_consejo = ? order by ca.status desc, ca.cve_cargo, ca.fecha_inicio";
        $query = $this->db->query($sql, array($cve_consejo));
        return $query->result_array();
    }

    public function eliminar_registro($cve_consejo, $cve_actor, $cve_cargo, $fecha_inicio, $fecha_fin, $status)
    {
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->where('cve_actor', $cve_actor);
        $this->db->where('cve_cargo', $cve_cargo);
        $this->db->where('fecha_inicio', $fecha_inicio);
        $this->db->where('fecha_fin', $fecha_fin);
        $this->db->where('status', $status);
        $this->db->delete('consejos_actores');
    }

    public function guardar($cve_consejo, $cve_actor, $cve_cargo, $fecha_inicio, $fecha_fin, $status)
    {
      $data = array(
          'cve_consejo' => $cve_consejo,
          'cve_actor' => $cve_actor,
          'cve_cargo' => $cve_cargo,
          'fecha_inicio' => $fecha_inicio,
          'fecha_fin' => $fecha_fin,
          'status' => $status
      );
      $this->db->insert('consejos_actores', $data);
    }


}
