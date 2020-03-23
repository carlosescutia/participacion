<?php
class Consejos_actores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_consejos_actor($cve_actor) {
        $sql = "select ca.cve_consejo, cn.nom_consejo, ca.cve_cargo, cg.nom_cargo, ca.fecha_inicio, ca.fecha_fin, ca.status, (case when ca.status=1 then 'activo' else 'inactivo' end) as nom_status from consejos_actores ca left join consejos cn on ca.cve_consejo = cn.cve_consejo left join cargos cg on ca.cve_cargo = cg.cve_cargo where cve_actor = ?";
        $query = $this->db->query($sql, array($cve_actor));
        return $query->result_array();
    }

}
