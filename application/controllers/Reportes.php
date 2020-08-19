<?php
class Reportes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuarios_model');
        $this->load->model('actores_model');
        $this->load->model('consejos_model');
        $this->load->model('proyectos_consejo_model');

    }

    public function lista()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $data['usuario_dependencia'] = $this->session->userdata('dependencia');
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function reporte_actores_01()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $data['actores'] = $this->actores_model->get_reporte_actores_01($dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/reporte_actores_01', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }


    public function reporte_actores_01_csv()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');

            if ($cve_rol == 'sup') {
                $area = '%';
            }
            if ($cve_rol == 'adm') {
                $dependencia = '%';
                $area = '%';
            }
            $sql = "select a.nombre, a.apellido_pa, a.apellido_ma, m.nom_mun, a.dependencia, a.area, a.sexo, s.nom_sector, (select string_agg(c.nom_consejo, ',') as consejos from consejos_actores ca left join consejos c on ca.cve_consejo = c.cve_consejo where ca.cve_actor = a.cve_actor), ta.nom_tipo from actores a left join municipios m on a.cve_mun = m.cve_mun left join sectores s on a.cve_sector = s.cve_sector left join tipo_actores ta on a.cve_tipo = ta.cve_tipo where a.dependencia LIKE ? and a.area LIKE ? order by a.nombre";
            $query = $this->db->query($sql, array($dependencia, $area));

            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download("reporte_actores_01.csv", $data);
        }
    }

    public function reporte_consejos_01()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $data['consejos'] = $this->consejos_model->get_reporte_consejos_01($dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/reporte_consejos_01', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }


    public function reporte_consejos_01_csv()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');

            if ($cve_rol == 'sup') {
                $area = '%';
            }
            if ($cve_rol == 'adm') {
                $dependencia = '%';
                $area = '%';
            }
            $sql = "select c.nom_consejo, e.nom_eje, c.dependencia, c.area, c.sesiones_anuales, (select string_agg(concat(a.nombre, ' ', a.apellido_pa, ' ', apellido_ma, ': ', cs.nom_cargo), '; ' order by ca.cve_cargo) as integrantes from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor left join cargos cs on ca.cve_cargo = cs.cve_cargo where ca.status = 1 and ca.cve_consejo = c.cve_consejo), tc.nom_tipo, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status from consejos c left join ejes e on e.cve_eje = c.cve_eje left join tipo_consejos tc on tc.cve_tipo = c.cve_tipo where dependencia LIKE ? and area LIKE ?";
            $query = $this->db->query($sql, array($dependencia, $area));

            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download("reporte_consejos_01.csv", $data);
        }
    }

    public function reporte_proyectos_01()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $data['proyectos'] = $this->proyectos_consejo_model->get_reporte_proyectos_01($dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/reporte_proyectos_01', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function reporte_proyectos_01_csv()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');

            if ($cve_rol == 'sup') {
                $area = '%';
            }
            if ($cve_rol == 'adm') {
                $dependencia = '%';
                $area = '%';
            }
            $sql = "select c.nom_consejo, pc.responsable, op.nom_objetivo, pc.nom_proyecto, pc.valor_grado_preparacion, to_char((pc.valor_grado_preparacion::numeric / 65)*100, '999D99') as calif_grado_preparacion, pl.nom_plazo, pc.valor_atingencia, to_char((pc.valor_atingencia::numeric / 35)*100, '999D99') as calif_atingencia, pc.objetivos, pc.indicadores from proyectos_consejo pc left join consejos c on pc.cve_consejo = c.cve_consejo left join objetivo_plangto op on pc.cve_objetivo = op.cve_objetivo left join plazos pl on pc.cve_plazo = pl.cve_plazo where pc.dependencia LIKE ? and pc.area LIKE ?";
            $query = $this->db->query($sql, array($dependencia, $area));

            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download("reporte_proyectos_01.csv", $data);
        }
    }

    public function reporte_acuerdos($cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $this->load->model('acuerdos_sesion_model');
            $this->load->model('sesiones_model');

            $data['consejo'] = $this->consejos_model->get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol);
            $data['sesion'] = $this->sesiones_model->get_sesion_consejo($cve_sesion, $cve_consejo);
            $data['acuerdos_sesion'] = $this->acuerdos_sesion_model->get_acuerdos_sesion($cve_sesion, $cve_consejo);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/reporte_acuerdos_01', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function reporte_acuerdos_csv($cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            
            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');
            $this->load->model('acuerdos_sesion_model');
            $this->load->model('sesiones_model');

            $sql = "select c.nom_consejo, 'Sesion ' || s.num_sesion || ' ' || (case when s.tipo='o' then 'ordinaria' when s.tipo='e' then 'extraordinaria' else '' end) as sesion, a.codigo_acuerdo, a.nom_acuerdo, a.observaciones, a.porcentaje_avance, acc.nom_acceso, a.fecha_acuerdo, a.fecha_compromiso, a.fecha_cumplimiento, a.causa_cancelado, sac.nom_status from acuerdos_sesion a left join consejos c on a.cve_consejo = c.cve_consejo left join sesiones s on a.cve_sesion = s.cve_sesion left join status_acuerdos_sesion sac on a.cve_status = sac.cve_status left join accesos acc on a.cve_acceso = acc.cve_acceso where a.cve_sesion = ? and a.cve_consejo = ? ;";
            $query = $this->db->query($sql, array($cve_sesion, $cve_consejo));

            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download("reporte_acuerdos.csv", $data);
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function reporte_sesion_01($cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $this->load->model('sesiones_model');
            $this->load->model('acuerdos_sesion_model');
            $this->load->model('asistencia_sesion_model');
            $this->load->model('proyectos_consejo_model');

            $data['consejo'] = $this->consejos_model->get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol);
            $data['sesion'] = $this->sesiones_model->get_sesion_consejo($cve_sesion, $cve_consejo);
            $data['acuerdos_sesion'] = $this->acuerdos_sesion_model->get_acuerdos_sesion($cve_sesion, $cve_consejo);
            $data['asistencia_sesion'] = $this->asistencia_sesion_model->get_asistencia_sesion($cve_sesion, $cve_consejo);
            $data['proyectos_consejo'] = $this->proyectos_consejo_model->get_proyectos_consejo($cve_consejo, $dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/reporte_sesion_01', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function reporte_totales_acuerdos()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $this->load->model('acuerdos_sesion_model');

            $data['acuerdos_status'] = $this->acuerdos_sesion_model->get_acuerdos_status($dependencia, $area, $cve_rol);
            $data['acuerdos_responsable'] = $this->acuerdos_sesion_model->get_acuerdos_responsable($dependencia, $area, $cve_rol);
            $data['total_acuerdos'] = $this->acuerdos_sesion_model->get_total_acuerdos($dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/reporte_totales_acuerdos', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function reporte_totales_proyectos()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $this->load->model('proyectos_consejo_model');

            $data['proyectos_preparacion'] = $this->proyectos_consejo_model->get_proyectos_preparacion($dependencia, $area, $cve_rol);
            $data['proyectos_plazo'] = $this->proyectos_consejo_model->get_proyectos_plazo($dependencia, $area, $cve_rol);
            $data['proyectos_atingencia'] = $this->proyectos_consejo_model->get_proyectos_atingencia($dependencia, $area, $cve_rol);
            $data['proyectos_atingencia_plazo'] = $this->proyectos_consejo_model->get_proyectos_atingencia_plazo($dependencia, $area, $cve_rol);
            $data['total_proyectos'] = $this->proyectos_consejo_model->get_total_proyectos($dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/reporte_totales_proyectos', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}
