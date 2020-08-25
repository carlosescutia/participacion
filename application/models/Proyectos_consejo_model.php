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
        $sql = "select pc.*, pt.nom_planteamiento, pr.nom_preparacion, pl.nom_plazo, at.nom_atingencia from proyectos_consejo pc left join preparaciones pr on pc.cve_preparacion = pr.cve_preparacion left join plazos pl on pc.cve_plazo = pl.cve_plazo left join atingencias at on pc.cve_atingencia = at.cve_atingencia left join planteamientos pt on pc.cve_planteamiento = pt.cve_planteamiento where pc.cve_consejo = ? and dependencia LIKE ? and area LIKE ? ";
        $query = $this->db->query($sql, array($cve_consejo, $dependencia, $area));
        return $query->result_array();
    }

    public function get_proyecto_consejo($cve_proyecto) {
        $sql = "select pc.*, to_char((pc.valor_grado_preparacion::numeric / 65)*100, '999.99') as calif_grado_preparacion, to_char((pc.valor_atingencia::numeric / 35)*100, '999.99') as calif_atingencia, pr.nom_preparacion, pl.nom_plazo, at.nom_atingencia, pt.nom_planteamiento from proyectos_consejo pc left join preparaciones pr on pc.cve_preparacion = pr.cve_preparacion left join plazos pl on pc.cve_plazo = pl.cve_plazo left join atingencias at on pc.cve_atingencia = at.cve_atingencia left join planteamientos pt on pc.cve_planteamiento = pt.cve_planteamiento where pc.cve_proyecto = ? ";
        $query = $this->db->query($sql, array($cve_proyecto));
        return $query->row_array();
    }

    public function guardar($data, $cve_proyecto)
    {
        if ($cve_proyecto) {
            $this->db->where('cve_proyecto', $cve_proyecto);
            $this->db->update('proyectos_consejo', $data);
        } else {
            $this->db->insert('proyectos_consejo', $data);
        }
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

    public function get_proyectos_preparacion($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select pr.nom_preparacion, count(*) as num_proyectos from proyectos_consejo pc left join preparaciones pr on pc.cve_preparacion = pr.cve_preparacion where pc.dependencia LIKE ? and pc.area LIKE ? group by pc.cve_preparacion, pr.nom_preparacion order by pc.cve_preparacion";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function get_proyectos_plazo($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select pl.nom_plazo, count(*) as num_proyectos from proyectos_consejo pc left join plazos pl on pc.cve_plazo = pl.cve_plazo where pc.dependencia LIKE ? and pc.area LIKE ? group by pc.cve_plazo, pl.nom_plazo order by pc.cve_plazo";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function get_proyectos_atingencia($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select a.nom_atingencia, count(*) as num_proyectos from proyectos_consejo pc left join atingencias a on pc.cve_atingencia = a.cve_atingencia where pc.dependencia LIKE ? and pc.area LIKE ? group by pc.cve_atingencia, a.nom_atingencia order by pc.cve_atingencia";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function get_proyectos_atingencia_plazo($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select a.nom_atingencia, pl.nom_plazo, count(*) as num_proyectos from proyectos_consejo pc left join atingencias a on pc.cve_atingencia = a.cve_atingencia left join plazos pl on pc.cve_plazo = pl.cve_plazo where pc.dependencia LIKE ? and pc.area LIKE ? group by pc.cve_atingencia, a.nom_atingencia, pc.cve_plazo, pl.nom_plazo order by pc.cve_atingencia, pc.cve_plazo ;";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function get_total_proyectos($dependencia, $area, $cve_rol) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select count(*) as num_proyectos from proyectos_consejo pc where pc.dependencia LIKE ? and pc.area LIKE ?";
        $query = $this->db->query($sql, array($dependencia, $area));
        return $query->result_array();
    }

    public function get_reporte_proyectos_01($dependencia, $area, $cve_rol, $cve_planteamiento, $cve_preparacion, $cve_plazo, $cve_consejo) {
        if ($cve_rol == 'sup') {
            $area = '%';
        }
        if ($cve_rol == 'adm') {
            $dependencia = '%';
            $area = '%';
        }
        $sql = "select c.nom_consejo, pc.responsable, op.nom_objetivo, pc.nom_proyecto, pt.nom_planteamiento, pr.nom_preparacion, pc.valor_grado_preparacion, to_char((pc.valor_grado_preparacion::numeric / 65)*100, '999.99') as calif_grado_preparacion, pl.nom_plazo, at.nom_atingencia, pc.valor_atingencia, to_char((pc.valor_atingencia::numeric / 35)*100, '999.99') as calif_atingencia, pc.objetivos, pc.indicadores from proyectos_consejo pc left join consejos c on pc.cve_consejo = c.cve_consejo left join objetivo_plangto op on pc.cve_objetivo = op.cve_objetivo left join preparaciones pr on pc.cve_preparacion = pr.cve_preparacion left join plazos pl on pc.cve_plazo = pl.cve_plazo left join atingencias at on pc.cve_atingencia = at.cve_atingencia left join planteamientos pt on pc.cve_planteamiento = pt.cve_planteamiento where pc.dependencia LIKE ? and pc.area LIKE ?";
        $parametros = array();
        array_push($parametros, "$dependencia");
        array_push($parametros, "$area");
        if ($cve_planteamiento > 0) {
            $sql .= ' and pc.cve_planteamiento = ?';
            array_push($parametros, "$cve_planteamiento");
        } 
        if ($cve_preparacion > 0) {
            $sql .= ' and pc.cve_preparacion = ?';
            array_push($parametros, "$cve_preparacion");
        } 
        if ($cve_plazo > 0) {
            $sql .= ' and pc.cve_plazo = ?';
            array_push($parametros, "$cve_plazo");
        } 
        if ($cve_consejo > 0) {
            $sql .= ' and pc.cve_consejo = ?';
            array_push($parametros, "$cve_consejo");
        } 
        $query = $this->db->query($sql, $parametros);
        return $query->result_array();
    }


}


