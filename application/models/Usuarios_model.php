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

    public function get_usuarios() {
        $sql = 'select * from usuarios order by clave;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_usuario($cve_usuario) {
        $sql = 'select * from usuarios where clave = ?;';
        $query = $this->db->query($sql, array($cve_usuario));
        return $query->row_array();
    }

    public function guardar($data, $cve_usuario)
    {
        if ($cve_usuario) {
            $this->db->where('clave', $cve_usuario);
            $result = $this->db->update('usuarios', $data);
        } else {
            $result = $this->db->insert('usuarios', $data);
        }
        return $result;
    }

    public function eliminar($cve_usuario)
    {
        $this->db->where('clave', $cve_usuario);
        $result = $this->db->delete('usuarios');
        return $result;
    }

}
