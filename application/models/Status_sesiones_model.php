<?php
class Status_sesiones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_status_sesiones() {
        $sql = 'select * from status_sesiones order by cve_status;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_status($cve_status) {
        $sql = 'select * from status_sesiones where cve_status = ?;';
        $query = $this->db->query($sql, array($cve_status));
        return $query->row_array();
    }

    public function guardar($data, $cve_status)
    {
        if ($cve_status) {
            $this->db->where('cve_status', $cve_status);
            $result = $this->db->update('status_sesiones', $data);
        } else {
            $result = $this->db->insert('status_sesiones', $data);
        }
        return $result;
    }

    public function eliminar($cve_status)
    {
        $this->db->where('cve_status', $cve_status);
        $result = $this->db->delete('status_sesiones');
        return $result;
    }

}
