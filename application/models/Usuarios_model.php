<?php
class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function usuario_por_nombre($usuario, $password) {
        $this->db->select('clave, nombre, usuario, dependencia');
        $this->db->from('usuarios');
        $this->db->where('usuario', $usuario);
        $this->db->where('password', $password);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }
}
