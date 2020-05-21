<?php
class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function usuario_por_nombre($usuario, $password) {
        $this->db->select('u.clave, u.nombre, u.usuario, u.dependencia, r.nom_rol');
        $this->db->from('usuarios u');
        $this->db->join('usuarios_roles ur', 'u.clave = ur.cve_usuario', 'left');
        $this->db->join('roles r', 'ur.cve_rol = r.cve_rol', 'left');
        $this->db->where('u.usuario', $usuario);
        $this->db->where('u.password', $password);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }
}
