<?php
class Consejos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_consejos_dependencia($dependencia) {
        $sql = 'select c.* from consejos c where c.dependencia=? order by c.nom_consejo';
        $query = $this->db->query($sql, array($dependencia));
        return $query->result_array();
    }

    public function get_consejo_dependencia($dependencia, $cve_consejo) {
        $sql = 'select c.* from consejos c where c.dependencia=? and c.cve_consejo=? order by c.nom_consejo';
        $query = $this->db->query($sql, array($dependencia, $cve_consejo));
        return $query->row_array();
    }

    public function guardar($nom_consejo, $dependencia, $siglas, $cve_tipo, $cve_eje, $soporte_juridico, $reglamento_interno, $fecha_reglamento, $periodo_inicio, $periodo_fin, $sesiones_anuales, $integracion, $fecha_instalacion, $status, $cve_consejo) {

      $data = array(
          'nom_consejo' => $nom_consejo,
          'dependencia' => $dependencia,
          'siglas' => $siglas,
          'cve_tipo' => $cve_tipo,
          'cve_eje' => $cve_eje,
          'soporte_juridico' => $soporte_juridico,
          'reglamento_interno' => $reglamento_interno,
          'fecha_reglamento' => $fecha_reglamento,
          'periodo_inicio' => $periodo_inicio,
          'periodo_fin' => $periodo_fin,
          'sesiones_anuales' => $sesiones_anuales,
          'integracion' => $integracion,
          'fecha_instalacion' => $fecha_instalacion,
          'status' => $status,
      );

      if ($cve_consejo) {
          $this->db->where('cve_consejo', $cve_consejo);
          $this->db->update('consejos', $data);
      } else {
          $this->db->insert('consejos', $data);
      }
    }

}
