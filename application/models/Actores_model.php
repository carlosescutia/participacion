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
        $sql = "select a.*, ta.nom_tipo, s.nom_sector, (select string_agg(c.nom_consejo, ', ') as consejos from consejos_actores ca left join consejos c on ca.cve_consejo = c.cve_consejo where ca.cve_actor = a.cve_actor) from actores a left join tipo_actores ta on a.cve_tipo = ta.cve_tipo left join sectores s on a.cve_sector = s.cve_sector where a.dependencia LIKE ? and a.area LIKE ?";
        $parametros = array();
        array_push($parametros, "$dependencia");
        array_push($parametros, "$area");
        if ($activo >= 0) {
            $sql .= ' and a.activo = ?';
            array_push($parametros, "$activo");
        }
        if ($cve_tipo > 0) {
            $sql .= ' and a.cve_tipo = ?';
            array_push($parametros, "$cve_tipo");
        }
        if ($cve_sector > 0) {
            $sql .= ' and a.cve_sector = ?';
            array_push($parametros, "$cve_sector");
        }
        $sql .= ' order by a.nombre;';
        $query = $this->db->query($sql, $parametros);
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

    public function get_listado_actores_02($dependencia, $area, $cve_rol, $cve_ent, $cve_mun, $cve_ambito, $cve_sector, $nombre) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm' or $cve_rol == 'cns') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select string_agg(concat(c.nom_consejo, ' (',cg.nom_cargo, ')'), '; ') as consejos, a.nombre, a.apellido_pa, a.apellido_ma, a.organizacion, a.correo_laboral from actores a left join consejos_actores ca on a.cve_actor = ca.cve_actor left join consejos c on ca.cve_consejo = c.cve_consejo left join cargos cg on ca.cve_cargo = cg.cve_cargo where a.dependencia LIKE ? and a.area LIKE ? ";
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
        if ($cve_sector <> "") {
            $sql .= " and a.cve_sector = any(string_to_array(?, ',')::int[])";
            array_push($parametros, "$cve_sector");
        } 
        if ($nombre <> "") {
            $nombre = '%' . $nombre . '%';
            $sql .= " and nombre || ' ' || apellido_pa || ' ' || apellido_ma ilike ? ";
            array_push($parametros, "$nombre");
        } 
        $sql .= ' group by a.nombre, a.apellido_pa, a.apellido_ma, a.organizacion, a.correo_laboral, a.correo_personal, a.correo_asistente order by a.nombre';
        $query = $this->db->query($sql, $parametros);
        return $query->result_array();
    }

    public function get_totales_listado_actores_02($dependencia, $area, $cve_rol, $cve_ent, $cve_mun, $cve_ambito, $cve_sector, $nombre) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm' or $cve_rol == 'cns') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select count(*) as num_actores from actores a where dependencia LIKE ? and area LIKE ?";
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
        if ($cve_sector <> "") {
            $sql .= " and a.cve_sector = any(string_to_array(?, ',')::int[])";
            array_push($parametros, "$cve_sector");
        } 
        if ($nombre <> "") {
            $nombre = '%' . $nombre . '%';
            $sql .= " and nombre || ' ' || apellido_pa || ' ' || apellido_ma ilike ? ";
            array_push($parametros, "$nombre");
        } 
        $query = $this->db->query($sql, $parametros);
        return $query->row_array();
    }


    public function guardar($data, $cve_actor=null) {
      if ($cve_actor) {
          $this->db->where('cve_actor', $cve_actor);
          $this->db->update('actores', $data);
          $id = $cve_actor;
      } else {
          $this->db->insert('actores', $data);
          $id = $this->db->insert_id();
      }
      return $id;
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

    public function get_estadistico_actores_01($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm' or $cve_rol == 'cns') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select e.nom_eje, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join consejos c on ca.cve_consejo = c.cve_consejo where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector = 1 and c.cve_eje = e.cve_eje and c.dependencia LIKE ? and c.area LIKE ?) as num_academico, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join consejos c on ca.cve_consejo = c.cve_consejo where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector = 2 and c.cve_eje = e.cve_eje and c.dependencia LIKE ? and c.area LIKE ?) as num_empresarial, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join consejos c on ca.cve_consejo = c.cve_consejo where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector = 3 and c.cve_eje = e.cve_eje and c.dependencia LIKE ? and c.area LIKE ?) as num_organismo_social, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join consejos c on ca.cve_consejo = c.cve_consejo where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector = 4 and c.cve_eje = e.cve_eje and c.dependencia LIKE ? and c.area LIKE ?) as num_ciudadano_independiente from ejes e order by e.cve_eje";
        $query = $this->db->query($sql, array($dependencia, $area, $dependencia, $area, $dependencia, $area, $dependencia, $area));
        return $query->result_array();
    }

}
