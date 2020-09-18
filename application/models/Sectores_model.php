<?php
class Sectores_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_sectores() {
        $sql = 'select * from sectores s left join ambitos a on s.cve_ambito = a.cve_ambito order by cve_sector;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_sector($cve_sector) {
        $sql = 'select * from sectores where cve_sector = ?;';
        $query = $this->db->query($sql, array($cve_sector));
        return $query->row_array();
    }

    public function guardar($data, $cve_sector)
    {
        if ($cve_sector) {
            $this->db->where('cve_sector', $cve_sector);
            $result = $this->db->update('sectores', $data);
        } else {
            $result = $this->db->insert('sectores', $data);
        }
        return $result;
    }

    public function eliminar($cve_sector)
    {
        $this->db->where('cve_sector', $cve_sector);
        $result = $this->db->delete('sectores');
        return $result;
    }

    public function get_sectores_ambito($cve_ambito)
    {
        $sql = 'select * from sectores where cve_ambito = ? order by cve_sector;';
        $query = $this->db->query($sql, $cve_ambito);
        return $query->result_array();
    }

}
