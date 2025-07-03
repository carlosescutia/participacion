<?php
class Consejos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_consejos_dependencia($dependencia, $area, $cve_rol, $status) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select c.*, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status from consejos c where c.dependencia LIKE ? and c.area LIKE ? ";

        $parametros = array();
        array_push($parametros, "$dependencia");
        array_push($parametros, "$area");
        if ($status == '0' or $status == '1') {
            $sql .= 'and c.status = ? ' ;
            array_push($parametros, "$status");
        }
        $sql .= ""
            ."order by c.status, c.nom_consejo"
            ."";
        $query = $this->db->query($sql, $parametros);
        return $query->result_array() ;
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

    public function get_listado_consejos_02($dependencia, $area, $cve_rol, $cve_eje, $cve_tipo, $cve_status, $participacion_ciudadana) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select e.nom_eje, c.nom_consejo, tc.nom_tipo,  (select count(*) from consejos_actores ca where ca.status = 1 and ca.cve_consejo = c.cve_consejo) as num_integrantes, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector = 4) as num_ciudadanos, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector = 6) as num_funcionarios_estatales, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector <> 4 and a.cve_sector <> 6) as num_otros_sectores, c.participacion_ciudadana from consejos c left join ejes e on e.cve_eje = c.cve_eje left join tipo_consejos tc on tc.cve_tipo = c.cve_tipo where dependencia LIKE ? and area LIKE ?";
        $parametros = array();
        array_push($parametros, "$dependencia");
        array_push($parametros, "$area");
        if ($cve_eje > 0) {
            $sql .= ' and c.cve_eje = ?';
            array_push($parametros, "$cve_eje");
        } 
        if ($cve_tipo > 0) {
            $sql .= ' and c.cve_tipo = ?';
            array_push($parametros, "$cve_tipo");
        } 
        if ($cve_status >= 0) {
            $sql .= ' and c.status = ?';
            array_push($parametros, "$cve_status");
        } 
        if ($participacion_ciudadana <> '') {
            $sql .= ' and c.participacion_ciudadana = ?';
            array_push($parametros, "$participacion_ciudadana");
        } 
        $query = $this->db->query($sql, $parametros);
        return $query->result_array();
    }

    public function get_listado_consejos_03($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select c.nom_consejo as nom_consejo, c.fecha_instalacion, (select max(fecha) from sesiones s where s.cve_consejo = c.cve_consejo) as ultima_sesion, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status_consejo, (select count(*) from sesiones s where s.cve_consejo = c.cve_consejo) as num_sesiones, (select count(*) from consejos_actores ca where ca.status = 1 and ca.cve_consejo = c.cve_consejo) as num_integrantes, (select string_agg(u.nombre, '; ') from usuarios u where u.dependencia = c.dependencia and u.area = c.area) as responsable_iplaneg, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo) as tot_proyectos, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo and pc.cve_status = 3) as proyectos_cumplidos, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo and pc.cve_status in (1,2)) as proyectos_noiniciados_enproceso, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo and pc.cve_status = 4) as proyectos_cancelados, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo and pc.cve_status is null) as proyectos_sinstatus from consejos c where dependencia LIKE ? and area LIKE ?";
        $parametros = array();
        array_push($parametros, "$dependencia");
        array_push($parametros, "$area");
        $query = $this->db->query($sql, $parametros);
        return $query->result_array();
    }

    public function get_totales_listado_consejos_02($dependencia, $area, $cve_rol, $cve_eje, $cve_tipo, $cve_status, $participacion_ciudadana) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select count(*) as num_consejos from consejos c where dependencia LIKE ? and area LIKE ?";
        $parametros = array();
        array_push($parametros, "$dependencia");
        array_push($parametros, "$area");
        if ($cve_eje > 0) {
            $sql .= ' and c.cve_eje = ?';
            array_push($parametros, "$cve_eje");
        } 
        if ($cve_tipo > 0) {
            $sql .= ' and c.cve_tipo = ?';
            array_push($parametros, "$cve_tipo");
        } 
        if ($cve_status >= 0) {
            $sql .= ' and c.status = ?';
            array_push($parametros, "$cve_status");
        } 
        if ($participacion_ciudadana <> '') {
            $sql .= ' and c.participacion_ciudadana = ?';
            array_push($parametros, "$participacion_ciudadana");
        } 
        $query = $this->db->query($sql, $parametros);
        return $query->row_array();
    }


    public function guardar($data, $cve_consejo) 
    {
        if ($cve_consejo) {
            $this->db->where('cve_consejo', $cve_consejo);
            $this->db->update('consejos', $data);
            $id = $cve_consejo;
        } else {
            $this->db->insert('consejos', $data);
            $id = $this->db->insert_id();
        }
        return $id;
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

    public function get_estadistico_consejos_01($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select e.nom_eje, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join consejos c on ca.cve_consejo = c.cve_consejo where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector IN (1,2,3,4) and c.cve_eje = e.cve_eje and c.dependencia LIKE ? and c.area LIKE ?) as num_ciudadanos, (select count(*) from consejos c where c.cve_eje = e.cve_eje and cve_calidad = 1 and c.dependencia LIKE ? and c.area LIKE ?) as num_estrategicos, (select count(*) from consejos c where c.cve_eje = e.cve_eje and cve_calidad = 2 and c.dependencia LIKE ? and c.area LIKE ?) as num_tacticos, (select count(*) from consejos c where c.cve_eje = e.cve_eje and cve_calidad = 3 and c.dependencia LIKE ? and c.area LIKE ?) as num_operativos from ejes e order by e.cve_eje";
        $query = $this->db->query($sql, array($dependencia, $area, $dependencia, $area, $dependencia, $area, $dependencia, $area));
        return $query->result_array();
    }

}
