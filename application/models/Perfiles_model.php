<?php
class Perfiles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_perfiles() {
        $sql = 'select * from perfiles order by cve_perfil;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_perfil($cve_perfil) {
        $sql = 'select * from perfiles where cve_perfil = ?;';
        $query = $this->db->query($sql, array($cve_perfil));
        return $query->row_array();
    }

    public function guardar($data, $cve_perfil)
    {
        if ($cve_perfil) {
            $this->db->where('cve_perfil', $cve_perfil);
            $result = $this->db->update('perfiles', $data);
        } else {
            $result = $this->db->insert('perfiles', $data);
        }
        return $result;
    }

    public function eliminar($cve_perfil)
    {
        $this->db->where('cve_perfil', $cve_perfil);
        $result = $this->db->delete('perfiles');
        return $result;
    }

}
