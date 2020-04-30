<?php
class Actores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_actores_dependencia($dependencia, $activo, $cve_tipo, $cve_sector) {
        $sql = "select a.*, ta.nom_tipo, s.nom_sector, (select string_agg(c.nom_consejo, ', ') as consejos from consejos_actores ca left join consejos c on ca.cve_consejo = c.cve_consejo where ca.cve_actor = a.cve_actor) from actores a left join tipo_actores ta on a.cve_tipo = ta.cve_tipo left join sectores s on a.cve_sector = s.cve_sector where a.dependencia=? and a.activo=? and a.cve_tipo=?";
        if ($cve_sector > 0) {
            $sql .= ' and a.cve_sector = ? order by a.nombre;';
            $query = $this->db->query($sql, array($dependencia, $activo, $cve_tipo, $cve_sector));
        } else {
            $sql .= ' order by a.nombre;';
            $query = $this->db->query($sql, array($dependencia, $activo, $cve_tipo));
        }
        return $query->result_array();
    }

    public function get_actor_dependencia($dependencia, $cve_actor) {
        $sql = 'select * from actores where dependencia = ? and cve_actor = ? ;';
        $query = $this->db->query($sql, array($dependencia, $cve_actor));
        return $query->row_array();
    }

    public function get_reporte_actores_01($dependencia) {
        $sql = "select a.nombre, a.apellido_pa, a.apellido_ma, m.nom_mun, a.sexo, s.nom_sector, (select string_agg(c.nom_consejo, ', ') as consejos from consejos_actores ca left join consejos c on ca.cve_consejo = c.cve_consejo where ca.cve_actor = a.cve_actor), ta.nom_tipo from actores a left join municipios m on a.cve_mun = m.cve_mun left join sectores s on a.cve_sector = s.cve_sector left join tipo_actores ta on a.cve_tipo = ta.cve_tipo where a.dependencia=? order by a.nombre";
        $query = $this->db->query($sql, array($dependencia));
        return $query->result_array();
    }


    public function guardar($activo, $dependencia, $nombre, $apellido_pa, $apellido_ma, $fecha_nacimiento, $sexo, $calle, $num_exterior, $num_interior, $colonia, $codigo_postal, $ciudad, $cve_mun, $cve_ent, $cve_tipo, $ine, $expediente_archivistico, $cve_ambito, $cve_sector, $organizacion, $telefono_fijo, $telefono_celular, $correo_personal, $correo_laboral, $asistente, $correo_asistente, $telefono_asistente, $otros_espacios, $experiencia_exitosa, $fecha_experiencia_exitosa, $desea_colaborar, $profesion, $cve_perfil, $cve_actor=null) {

      $data = array(
          'activo' => $activo,
          'dependencia' => $dependencia,
          'nombre' => $nombre,
          'apellido_pa' => $apellido_pa,
          'apellido_ma' => $apellido_ma,
          'fecha_nacimiento' => $fecha_nacimiento,
          'sexo' => $sexo,
          'calle' => $calle,
          'num_exterior' => $num_exterior,
          'num_interior' => $num_interior,
          'colonia' => $colonia,
          'codigo_postal' => $codigo_postal,
          'ciudad' => $ciudad,
          'cve_mun' => $cve_mun,
          'cve_ent' => $cve_ent,
          'cve_tipo' => $cve_tipo,
          'ine' => $ine,
          'expediente_archivistico' => $expediente_archivistico,
          'cve_ambito' => $cve_ambito,
          'cve_sector' => $cve_sector,
          'organizacion' => $organizacion,
          'telefono_fijo' => $telefono_fijo,
          'telefono_celular' => $telefono_celular,
          'correo_personal' => $correo_personal,
          'correo_laboral' => $correo_laboral,
          'asistente' => $asistente,
          'correo_asistente' => $correo_asistente,
          'telefono_asistente' => $telefono_asistente,
          'otros_espacios' => $otros_espacios,
          'experiencia_exitosa' => $experiencia_exitosa,
          'fecha_experiencia_exitosa' => $fecha_experiencia_exitosa,
          'desea_colaborar' => $desea_colaborar,
          'profesion' => $profesion,
          'cve_perfil' => $cve_perfil
      );

      if ($cve_actor) {
          $this->db->where('cve_actor', $cve_actor);
          $this->db->update('actores', $data);
      } else {
          $this->db->insert('actores', $data);
      }
    }

    public function get_estadisticas_actores($dependencia)
    {
        $sql = 'select count(*) as registrados, count(*) filter (where activo = 1) as activos, count(*) filter (where activo = 0) as inactivos, count(*) filter (where cve_tipo = 1) as consejeros, count(*) filter (where cve_tipo = 2) as colaboradores from actores where dependencia = ?';
        $query = $this->db->query($sql, array($dependencia));
        return $query->row_array();
    }

}
