<?php
class Acuerdos_sesion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_acuerdos_sesion($cve_sesion, $cve_consejo) {
        $sql = "select a.*, acc.nom_acceso, sac.nom_status from acuerdos_sesion a left join status_acuerdos_sesion sac on a.cve_status = sac.cve_status left join accesos acc on a.cve_acceso = acc.cve_acceso where a.cve_sesion = ? and a.cve_consejo = ? order by codigo_acuerdo ";
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

    public function get_acuerdos_responsable($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select upper(trim(responsable)) as responsable, count(*) as num_acuerdos from acuerdos_sesion acs left join consejos c on acs.cve_consejo = c.cve_consejo where c.dependencia LIKE ? and c.area LIKE ? group by upper(trim(responsable)) order by upper(trim(responsable)) ";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function get_acuerdos_status($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select sas.nom_status as status, count(acs.*) as num_acuerdos from acuerdos_sesion acs left join status_acuerdos_sesion sas on acs.cve_status = sas.cve_status left join consejos c on acs.cve_consejo = c.cve_consejo where c.dependencia LIKE ? and c.area LIKE ? group by acs.cve_status, sas.nom_status order by acs.cve_status ";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function get_total_acuerdos($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select count(*) as num_acuerdos from acuerdos_sesion acs left join consejos c on acs.cve_consejo = c.cve_consejo where c.dependencia LIKE ? and c.area LIKE ? ";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

}
