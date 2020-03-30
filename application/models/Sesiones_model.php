<?php
class Sesiones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_sesiones_consejo($cve_consejo) {
        $sql = "select s.* from sesiones s where s.cve_consejo = ? order by s.fecha desc";
        $query = $this->db->query($sql, array($cve_consejo));
        return $query->result_array();
    }

    public function get_sesion($cve_sesion) {
        $sql = "select s.* from sesiones s where s.cve_sesion = ?";
        $query = $this->db->query($sql, array($cve_sesion));
        return $query->row_array();
    }

    public function guardar($cve_consejo, $nom_sesion, $tipo, $lugar, $fecha, $hora, $objetivo, $orden_dia, $cve_sesion)
    {
        $data = array(
            'cve_consejo' => $cve_consejo,
            'nom_sesion' => $nom_sesion,
            'tipo' => $tipo,
            'lugar' => $lugar,
            'fecha' => $fecha,
            'hora' => $hora,
            'objetivo' => $objetivo,
            'orden_dia' => $orden_dia
        );

        if ($cve_sesion) {
            $this->db->where('cve_sesion', $cve_sesion);
            $this->db->update('sesiones', $data);
        } else {
            $this->db->insert('sesiones', $data);
        }
    }

}
