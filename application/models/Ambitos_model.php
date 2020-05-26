<?php
class Ambitos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_ambitos() {
        $sql = 'select * from ambitos order by cve_ambito;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_ambito($cve_ambito) {
        $sql = 'select * from ambitos where cve_ambito = ?;';
        $query = $this->db->query($sql, array($cve_ambito));
        return $query->row_array();
    }

    public function guardar($data, $cve_ambito)
    {
        if ($cve_ambito) {
            $this->db->where('cve_ambito', $cve_ambito);
            $result = $this->db->update('ambitos', $data);
        } else {
            $result = $this->db->insert('ambitos', $data);
        }
        return $result;
    }

    public function eliminar($cve_ambito)
    {
        $this->db->where('cve_ambito', $cve_ambito);
        $result = $this->db->delete('ambitos');
        return $result;
    }

}
