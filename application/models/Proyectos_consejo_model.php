<?php
class Proyectos_consejo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_proyectos_consejo($cve_consejo, $dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select pc.*, pr.nom_preparacion, pl.nom_plazo, at.nom_atingencia from proyectos_consejo pc left join preparaciones pr on pc.cve_preparacion = pr.cve_preparacion left join plazos pl on pc.cve_plazo = pl.cve_plazo left join atingencias at on pc.cve_atingencia = at.cve_atingencia where pc.cve_consejo = ? and dependencia LIKE ? and area LIKE ? ";
        $query = $this->db->query($sql, array($cve_consejo, $dependencia, $area));
        return $query->result_array();
    }

    public function guardar($data)
    {
        $this->db->insert('proyectos_consejo', $data);
    }

    public function actualizar_preparacion($cve_proyecto, $cve_consejo, $cve_preparacion)
    {
        $data = array(
            'cve_preparacion' => $cve_preparacion
        );

        $this->db->where('cve_proyecto', $cve_proyecto);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->update('proyectos_consejo', $data);
    }

    public function actualizar_plazo($cve_proyecto, $cve_consejo, $cve_plazo)
    {
        $data = array(
            'cve_plazo' => $cve_plazo
        );

        $this->db->where('cve_proyecto', $cve_proyecto);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->update('proyectos_consejo', $data);
    }

    public function actualizar_objetivo($cve_proyecto, $cve_consejo, $objetivo)
    {
        $data = array(
            'objetivo_definido' => $objetivo
        );

        $this->db->where('cve_proyecto', $cve_proyecto);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->update('proyectos_consejo', $data);
    }

    public function actualizar_atingencia($cve_proyecto, $cve_consejo, $cve_atingencia)
    {
        $data = array(
            'cve_atingencia' => $cve_atingencia
        );

        $this->db->where('cve_proyecto', $cve_proyecto);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->update('proyectos_consejo', $data);
    }

    public function eliminar_registro($cve_proyecto, $cve_consejo)
    {
        $this->db->where('cve_proyecto', $cve_proyecto);
        $this->db->where('cve_consejo', $cve_consejo);
        $this->db->delete('proyectos_consejo');
    }

}


