<?php
class Accesos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_accesos() {
        $sql = 'select * from accesos order by cve_acceso;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_acceso($cve_acceso) {
        $sql = 'select * from accesos where cve_acceso = ?;';
        $query = $this->db->query($sql, array($cve_acceso));
        return $query->row_array();
    }

    public function guardar($data, $cve_acceso)
    {
        if ($cve_acceso) {
            $this->db->where('cve_acceso', $cve_acceso);
            $result = $this->db->update('accesos', $data);
        } else {
            $result = $this->db->insert('accesos', $data);
        }
        return $result;
    }

    public function eliminar($cve_acceso)
    {
        $this->db->where('cve_acceso', $cve_acceso);
        $result = $this->db->delete('accesos');
        return $result;
    }

}
