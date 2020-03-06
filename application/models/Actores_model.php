<?php
class Actores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_actores($cve_actor = 0) {
        if ($cve_actor == 0) {
            $sql = 'select * from actores order by nombre;';
            $query = $this->db->query($sql, array($cve_actor));
            return $query->result_array();
        } else {
            $sql = 'select * from actores where cve_actor = ? ;';
            $query = $this->db->query($sql, array($cve_actor));
            return $query->row_array();
        }
    }

    public function guardar($activo, $nombre, $apellido_pa, $apellido_ma, $fecha_nacimiento, $sexo, $calle, $num_exterior, $num_interior, $colonia, $codigo_postal, $ciudad, $estado, $externo_interno, $ine, $ambito, $sector, $organizacion, $telefono_fijo, $telefono_celular, $correo_personal, $correo_laboral, $asistente, $correo_asistente, $telefono_asistente, $otros_espacios, $experiencia_exitosa, $fecha_experiencia_exitosa, $desea_colaborar, $profesion, $perfil, $cve_actor=null) {

      $data = array(
          'activo' => $activo,
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
          'estado' => $estado,
          'externo_interno' => $externo_interno,
          'ine' => $ine,
          'ambito' => $ambito,
          'sector' => $sector,
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
          'perfil' => $perfil
      );

      if ($cve_actor) {
          $this->db->where('cve_actor', $cve_actor);
          $this->db->update('actores', $data);
      } else {
          $this->db->insert('actores', $data);
      }
    }

}

