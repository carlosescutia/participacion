<?php
class Actores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_actores_dependencia($dependencia, $area, $activo, $cve_tipo, $cve_sector, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select a.*, ta.nom_tipo, s.nom_sector, (select string_agg(c.nom_consejo, ', ') as consejos from consejos_actores ca left join consejos c on ca.cve_consejo = c.cve_consejo where ca.cve_actor = a.cve_actor) from actores a left join tipo_actores ta on a.cve_tipo = ta.cve_tipo left join sectores s on a.cve_sector = s.cve_sector where a.dependencia LIKE ? and a.area LIKE ? and a.activo=? and a.cve_tipo=?";
        if ($cve_sector > 0) {
            $sql .= ' and a.cve_sector = ? order by a.nombre;';
            $query = $this->db->query($sql, array($dependencia, $area, $activo, $cve_tipo, $cve_sector));
        } else {
            $sql .= ' order by a.nombre;';
            $query = $this->db->query($sql, array($dependencia, $area, $activo, $cve_tipo));
        }
        return $query->result_array();
    }

    public function get_actor_dependencia($dependencia, $area, $cve_actor, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = 'select * from actores where dependencia LIKE ? and area LIKE ? and cve_actor = ? ;';
        $query = $this->db->query($sql, array($dependencia, $area, $cve_actor));
        return $query->row_array();
    }

    public function get_reporte_actores_01($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select a.nombre, a.apellido_pa, a.apellido_ma, m.nom_mun, a.dependencia, a.area, a.sexo, s.nom_sector, (select string_agg(c.nom_consejo, ', ') as consejos from consejos_actores ca left join consejos c on ca.cve_consejo = c.cve_consejo where ca.cve_actor = a.cve_actor), ta.nom_tipo from actores a left join municipios m on a.cve_mun = m.cve_mun left join sectores s on a.cve_sector = s.cve_sector left join tipo_actores ta on a.cve_tipo = ta.cve_tipo where a.dependencia LIKE ? and a.area LIKE ? order by a.nombre";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function get_listado_actores_02($dependencia, $area, $cve_rol, $cve_ent, $cve_mun, $cve_ambito, $cve_sector) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select a.nombre, a.apellido_pa, a.apellido_ma, string_agg(concat(c.nom_consejo, ' (',cg.nom_cargo, ')'), '; ') as consejos, a.organizacion, a.correo_laboral, a.correo_personal, a.correo_asistente from actores a left join consejos_actores ca on a.cve_actor = ca.cve_actor left join consejos c on ca.cve_consejo = c.cve_consejo left join cargos cg on ca.cve_cargo = cg.cve_cargo where a.dependencia LIKE ? and a.area LIKE ? ";
        $parametros = array();
        array_push($parametros, "$dependencia");
        array_push($parametros, "$area");
        if ($cve_ent <> "") {
            $sql .= ' and a.cve_ent = ?';
            array_push($parametros, "$cve_ent");
        } 
        if ($cve_mun <> "") {
            $sql .= ' and a.cve_mun = ?';
            array_push($parametros, "$cve_mun");
        } 
        if ($cve_ambito > 0) {
            $sql .= ' and a.cve_ambito = ?';
            array_push($parametros, "$cve_ambito");
        } 
        if ($cve_sector > 0) {
            $sql .= ' and a.cve_sector = ?';
            array_push($parametros, "$cve_sector");
        } 
        $sql .= ' group by a.nombre, a.apellido_pa, a.apellido_ma, a.organizacion, a.correo_laboral, a.correo_personal, a.correo_asistente order by a.nombre';
        $query = $this->db->query($sql, $parametros);
        return $query->result_array();
    }


    public function guardar($data, $cve_actor=null) {
      if ($cve_actor) {
          $this->db->where('cve_actor', $cve_actor);
          $this->db->update('actores', $data);
      } else {
          $this->db->insert('actores', $data);
      }
    }

    public function get_estadisticas_actores($dependencia, $area, $cve_rol)
    {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = 'select count(*) as registrados, count(*) filter (where activo = 1) as activos, count(*) filter (where activo = 0) as inactivos, count(*) filter (where cve_tipo = 1) as consejeros, count(*) filter (where cve_tipo = 2) as colaboradores from actores where dependencia LIKE ? and area LIKE ? ';
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->row_array();
    }

}
