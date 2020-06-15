<?php
class Consejos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_consejos_dependencia($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select c.*, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status from consejos c where c.dependencia LIKE ? and c.area LIKE ? order by c.status, c.nom_consejo";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = 'select c.* from consejos c where c.dependencia LIKE ? and c.area LIKE ? and c.cve_consejo=? order by c.nom_consejo';
        $query = $this->db->query($sql, array($dependencia, $area, $cve_consejo));
        return $query->row_array();
    }
    
    public function get_reporte_consejos_01($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select c.nom_consejo, e.nom_eje, c.dependencia, c.area, c.sesiones_anuales, (select string_agg(concat(a.nombre, ' ', a.apellido_pa, ' ', apellido_ma, ': ', cs.nom_cargo), '; ' order by ca.cve_cargo) as integrantes from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join cargos cs on ca.cve_cargo = cs.cve_cargo where ca.status = 1 and ca.cve_consejo = c.cve_consejo), tc.nom_tipo, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status from consejos c left join ejes e on e.cve_eje = c.cve_eje left join tipo_consejos tc on tc.cve_tipo = c.cve_tipo where dependencia LIKE ? and area LIKE ?";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }


    public function guardar($data, $cve_consejo) 
    {
        if ($cve_consejo) {
            $this->db->where('cve_consejo', $cve_consejo);
            $this->db->update('consejos', $data);
        } else {
            $this->db->insert('consejos', $data);
        }
    }

    public function get_estadisticas_consejos($dependencia, $area, $cve_rol)
    {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = 'select count(*) as registrados, count(*) filter (where status = 1) as activos, count(*) filter (where status = 0) as inactivos from consejos where dependencia LIKE ? and area LIKE ? ';
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->row_array();
    }

}
