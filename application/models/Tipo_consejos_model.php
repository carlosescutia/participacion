<?php
class Tipo_consejos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tipo_consejos() {
        $sql = 'select * from tipo_consejos order by cve_tipo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_tipo($cve_tipo) {
        $sql = 'select * from tipo_consejos where cve_tipo = ?;';
        $query = $this->db->query($sql, array($cve_tipo));
        return $query->row_array();
    }

    public function guardar($data, $cve_tipo)
    {
        if ($cve_tipo) {
            $this->db->where('cve_tipo', $cve_tipo);
            $result = $this->db->update('tipo_consejos', $data);
        } else {
            $result = $this->db->insert('tipo_consejos', $data);
        }
        return $result;
    }

    public function eliminar($cve_tipo)
    {
        $this->db->where('cve_tipo', $cve_tipo);
        $result = $this->db->delete('tipo_consejos');
        return $result;
    }

}
