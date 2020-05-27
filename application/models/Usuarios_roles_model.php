<?php
class Usuarios_roles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_usuarios_roles() {
        $sql = "select ur.cve_usuario, u.nombre as nom_usuario, ur.cve_rol, r.nom_rol from usuarios_roles ur left join usuarios u on ur.cve_usuario = u.clave left join roles r on ur.cve_rol = r.cve_rol order by ur.cve_usuario, ur.cve_rol ;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function eliminar($cve_usuario, $cve_rol)
    {
        $this->db->where('cve_usuario', $cve_usuario);
        $this->db->where('cve_rol', $cve_rol);
        $this->db->delete('usuarios_roles');
    }

    public function guardar($cve_usuario, $cve_rol)
    {
      $data = array(
          'cve_usuario' => $cve_usuario,
          'cve_rol' => $cve_rol
      );
      try {
          $result = $this->db->insert('usuarios_roles', $data);
          if (!$result)
          {
              throw new Exception('El usuario ya tiene asignado un rol');
              return false;
          }
          return $result;
      } catch(Exception $e) {
          $this->session->set_flashdata('error_usuarios_roles', 'El usuario ya tiene asignado un rol');
          redirect('usuarios_roles/lista');
      }
    }


}

