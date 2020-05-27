<?php
class Tipo_actores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tipo_actores() {
        $sql = 'select * from tipo_actores order by cve_tipo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_tipo($cve_tipo) {
        $sql = 'select * from tipo_actores where cve_tipo = ?;';
        $query = $this->db->query($sql, array($cve_tipo));
        return $query->row_array();
    }

    public function guardar($data, $cve_tipo)
    {
        if ($cve_tipo) {
            $this->db->where('cve_tipo', $cve_tipo);
            $result = $this->db->update('tipo_actores', $data);
        } else {
            $result = $this->db->insert('tipo_actores', $data);
        }
        return $result;
    }

    public function eliminar($cve_tipo)
    {
        $this->db->where('cve_tipo', $cve_tipo);
        $result = $this->db->delete('tipo_actores');
        return $result;
    }

}
