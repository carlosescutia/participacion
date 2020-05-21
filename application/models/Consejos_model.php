<?php
class Consejos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_consejos_dependencia($dependencia) {
        if ($dependencia == '') {
            $sql = "select c.*, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status from consejos c order by c.status, c.nom_consejo";
            $query = $this->db->query($sql);
        } else {
            $sql = "select c.*, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status from consejos c where c.dependencia=? order by c.status, c.nom_consejo";
            $query = $this->db->query($sql, array($dependencia));
        }
        return $query->result_array();
    }

    public function get_consejo_dependencia($dependencia, $cve_consejo) {
        if ($dependencia == '') {
            $sql = 'select c.* from consejos c where c.cve_consejo=? order by c.nom_consejo';
            $query = $this->db->query($sql, array($cve_consejo));
        } else {
            $sql = 'select c.* from consejos c where c.dependencia=? and c.cve_consejo=? order by c.nom_consejo';
            $query = $this->db->query($sql, array($dependencia, $cve_consejo));
        }
        return $query->row_array();
    }
    
    public function get_reporte_consejos_01($dependencia) {
        if ($dependencia == '') {
            $sql = "select c.nom_consejo, e.nom_eje, c.dependencia, c.sesiones_anuales, (select string_agg(concat(a.nombre, ' ', a.apellido_pa, ' ', apellido_ma, ': ', cs.nom_cargo), '; ' order by ca.cve_cargo) as integrantes from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join cargos cs on ca.cve_cargo = cs.cve_cargo where ca.status = 1 and ca.cve_consejo = c.cve_consejo), tc.nom_tipo, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status from consejos c left join ejes e on e.cve_eje = c.cve_eje left join tipo_consejos tc on tc.cve_tipo = c.cve_tipo ";
            $query = $this->db->query($sql);
        } else {
            $sql = "select c.nom_consejo, e.nom_eje, c.dependencia, c.sesiones_anuales, (select string_agg(concat(a.nombre, ' ', a.apellido_pa, ' ', apellido_ma, ': ', cs.nom_cargo), '; ' order by ca.cve_cargo) as integrantes from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join cargos cs on ca.cve_cargo = cs.cve_cargo where ca.status = 1 and ca.cve_consejo = c.cve_consejo), tc.nom_tipo, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status from consejos c left join ejes e on e.cve_eje = c.cve_eje left join tipo_consejos tc on tc.cve_tipo = c.cve_tipo where dependencia = ?";
            $query = $this->db->query($sql, array($dependencia));
        }
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

    public function get_estadisticas_consejos($dependencia)
    {
        if ($dependencia == '') {
            $sql = 'select count(*) as registrados, count(*) filter (where status = 1) as activos, count(*) filter (where status = 0) as inactivos from consejos ';
            $query = $this->db->query($sql);
        } else {
            $sql = 'select count(*) as registrados, count(*) filter (where status = 1) as activos, count(*) filter (where status = 0) as inactivos from consejos where dependencia = ?';
            $query = $this->db->query($sql, array($dependencia));
        }
        return $query->row_array();
    }

}
