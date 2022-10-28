<?php
class Areas_tematicas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_areas_tematicas() {
        $sql = 'select * from areas_tematicas order by cve_area_tematica;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_area_tematica($cve_area_tematica) {
        $sql = 'select * from areas_tematicas where cve_area_tematica = ?;';
        $query = $this->db->query($sql, array($cve_area_tematica));
        return $query->row_array();
    }

    public function guardar($data, $cve_area_tematica)
    {
        if ($cve_area_tematica) {
            $this->db->where('cve_area_tematica', $cve_area_tematica);
            $result = $this->db->update('areas_tematicas', $data);
        } else {
            $result = $this->db->insert('areas_tematicas', $data);
        }
        return $result;
    }

    public function eliminar($cve_area_tematica)
    {
        $this->db->where('cve_area_tematica', $cve_area_tematica);
        $result = $this->db->delete('areas_tematicas');
        return $result;
    }

}
