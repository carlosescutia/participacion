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
        $this->load->model('planteamientos_model');
        $this->load->model('preparaciones_model');
        $this->load->model('plazos_model');
        $this->load->model('ejes_model');
        $this->load->model('entidades_model');
        $this->load->model('municipios_model');
        $this->load->model('ambitos_model');
        $this->load->model('sectores_model');
        $this->load->model('acuerdos_sesion_model');
        $this->load->model('status_acuerdos_sesion_model');
        $this->load->model('tipo_consejos_model');
        $this->load->model('accesos_sistema_model');
        $this->load->model('bitacora_model');
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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

    public function listado_actores_02()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $filtros = $this->input->post();
            if ($filtros) {
                $cve_ent = $filtros['cve_ent'];
                $cve_mun = $filtros['cve_mun'];
                $cve_ambito = $filtros['cve_ambito'];
                $cve_sector = empty($filtros['cve_sector']) ? '' : implode(',', $filtros['cve_sector']);
                $nombre = $filtros['nombre'];
            } else {
                $cve_ent = '';
                $cve_mun = '';
                $cve_ambito = '0';
                $cve_sector = '';
                $nombre = '';
			}

            $data['cve_ent'] = $cve_ent;
            $data['cve_mun'] = $cve_mun;
            $data['cve_ambito'] = $cve_ambito;
            $data['cve_sector'] = $cve_sector;
            $data['nombre'] = $nombre;

            $data['entidades'] = $this->entidades_model->get_entidades();
            $data['municipios'] = $this->municipios_model->get_municipios();
            $data['ambitos'] = $this->ambitos_model->get_ambitos();
            $data['sectores'] = $this->sectores_model->get_sectores();

            $data['actores'] = $this->actores_model->get_listado_actores_02($dependencia, $area, $cve_rol, $cve_ent, $cve_mun, $cve_ambito, $cve_sector, $nombre);
            $data['totales_actores'] = $this->actores_model->get_totales_listado_actores_02($dependencia, $area, $cve_rol, $cve_ent, $cve_mun, $cve_ambito, $cve_sector, $nombre);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/listado_actores_02', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function listado_actores_02_csv()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $filtros = $this->input->post();
            if ($filtros) {
                $cve_ent = $filtros['cve_ent'];
                $cve_mun = $filtros['cve_mun'];
                $cve_ambito = $filtros['cve_ambito'];
                $cve_sector = implode(',', $filtros['cve_sector']);
                $nombre = $filtros['nombre'];
            } else {
                $cve_ent = '';
                $cve_mun = '';
                $cve_ambito = '0';
                $cve_sector = '';
                $nombre = '';
			}

            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');

            if ($cve_rol == 'sup') {
                $area = '%';
            }
            if ($cve_rol == 'adm' or $cve_rol == 'cns') {
                $dependencia = '%';
                $area = '%';
            }
            $sql = "select string_agg(concat(c.nom_consejo, ' (',cg.nom_cargo, ')'), '; ') as consejos, a.nombre, a.apellido_pa, a.apellido_ma, a.organizacion, a.correo_laboral from actores a left join consejos_actores ca on a.cve_actor = ca.cve_actor left join consejos c on ca.cve_consejo = c.cve_consejo left join cargos cg on ca.cve_cargo = cg.cve_cargo where a.dependencia LIKE ? and a.area LIKE ? ";
            $parametros = array();
            array_push($parametros, "$dependencia");
            array_push($parametros, "$area");
            if ($cve_ent <> "") {
                $sql .= ' and a.cve_ent = ?';
                array_push($parametros, "$cve_ent");
            } 
            if ($cve_mun <> "") {
                $sql .= ' and a.cve_mun = ?';
                array_push($parametros, "$cve_mun");
            } 
            if ($cve_ambito > 0) {
                $sql .= ' and a.cve_ambito = ?';
                array_push($parametros, "$cve_ambito");
            } 
            if ($cve_sector <> "") {
                $sql .= " and a.cve_sector = any(string_to_array(?, ',')::int[])";
                array_push($parametros, "$cve_sector");
            } 
            if ($nombre <> "") {
                $nombre = '%' . $nombre . '%';
                $sql .= " and nombre || ' ' || apellido_pa || ' ' || apellido_ma ilike ? ";
                array_push($parametros, "$nombre");
            } 
            $sql .= ' group by a.nombre, a.apellido_pa, a.apellido_ma, a.organizacion, a.correo_laboral, a.correo_personal, a.correo_asistente order by a.nombre';
            $query = $this->db->query($sql, $parametros);

            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download("listado_actores_02.csv", $data);
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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

    public function listado_consejos_02()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $filtros = $this->input->post();
            if ($filtros) {
                $cve_eje = $filtros['cve_eje'];
                $cve_tipo = $filtros['cve_tipo'];
                $cve_status = $filtros['cve_status'];
                $participacion_ciudadana = $filtros['participacion_ciudadana'];
            } else {
                $cve_eje = '0';
                $cve_tipo = '0';
                $cve_status = '-1';
                $participacion_ciudadana = '';
			}

            $data['cve_eje'] = $cve_eje;
            $data['cve_tipo'] = $cve_tipo;
            $data['cve_status'] = $cve_status;
            $data['participacion_ciudadana'] = $participacion_ciudadana;

            $data['ejes'] = $this->ejes_model->get_ejes();
            $data['tipo_consejos'] = $this->tipo_consejos_model->get_tipo_consejos();
            $data['consejos'] = $this->consejos_model->get_listado_consejos_02($dependencia, $area, $cve_rol, $cve_eje, $cve_tipo, $cve_status, $participacion_ciudadana);
            $data['totales_consejos'] = $this->consejos_model->get_totales_listado_consejos_02($dependencia, $area, $cve_rol, $cve_eje, $cve_tipo, $cve_status, $participacion_ciudadana);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/listado_consejos_02', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function listado_consejos_02_csv()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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
            $sql = "select e.nom_eje, c.nom_consejo, tc.nom_tipo,  (select count(*) from consejos_actores ca where ca.status = 1 and ca.cve_consejo = c.cve_consejo) as num_integrantes, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector = 4) as num_ciudadanos, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector = 6) as num_funcionarios_estatales, (select count(*) from consejos_actores ca left join actores a on ca.cve_actor = a.cve_actor where ca.status = 1 and ca.cve_consejo = c.cve_consejo and a.cve_sector <> 4 and a.cve_sector <> 6) as num_otros_sectores, c.participacion_ciudadana from consejos c left join ejes e on e.cve_eje = c.cve_eje left join tipo_consejos tc on tc.cve_tipo = c.cve_tipo where dependencia LIKE ? and area LIKE ?";
            $query = $this->db->query($sql, array($dependencia, $area));

            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download("listado_consejos_02.csv", $data);
        }
    }

    public function listado_consejos_03()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $data['consejos'] = $this->consejos_model->get_listado_consejos_03($dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/listado_consejos_03', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function listado_consejos_03_csv()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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
            $sql = "select c.nom_consejo as nom_consejo, c.fecha_instalacion, (select max(fecha) from sesiones s where s.cve_consejo = c.cve_consejo) as ultima_sesion, (case when c.status=1 then 'activo' when c.status=0 then 'inactivo' else '' end) as nom_status_consejo, (select count(*) from sesiones s where s.cve_consejo = c.cve_consejo) as num_sesiones, (select count(*) from consejos_actores ca where ca.status = 1 and ca.cve_consejo = c.cve_consejo) as num_integrantes, (select string_agg(u.nombre, '; ') from usuarios u where u.dependencia = c.dependencia and u.area = c.area) as responsable_iplaneg, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo) as tot_proyectos, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo and pc.cve_status = 3) as proyectos_cumplidos, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo and pc.cve_status in (1,2)) as proyectos_noiniciados_enproceso, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo and pc.cve_status = 4) as proyectos_cancelados, (select count(*) from proyectos_consejo pc where pc.cve_consejo = c.cve_consejo and pc.cve_status is null) as proyectos_sinstatus from consejos c where dependencia LIKE ? and area LIKE ?";
            $parametros = array();
            array_push($parametros, "$dependencia");
            array_push($parametros, "$area");
            $query = $this->db->query($sql, $parametros);

            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download("listado_consejos_03.csv", $data);
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $filtros = $this->input->post();
            if ($filtros) {
                $cve_planteamiento = $filtros['cve_planteamiento'];
                $cve_preparacion = $filtros['cve_preparacion'];
                $cve_plazo = $filtros['cve_plazo'];
                $cve_consejo = $filtros['cve_consejo'];
            } else {
                $cve_planteamiento = '0';
                $cve_preparacion = '0';
                $cve_plazo = '0';
                $cve_consejo = '0';
			}

            $data['cve_planteamiento'] = $cve_planteamiento;
            $data['cve_preparacion'] = $cve_preparacion;
            $data['cve_plazo'] = $cve_plazo;
            $data['cve_consejo'] = $cve_consejo;

            $data['consejos'] = $this->consejos_model->get_consejos_dependencia($dependencia, $area, $cve_rol);
            $data['planteamientos'] = $this->planteamientos_model->get_planteamientos();
            $data['preparaciones'] = $this->preparaciones_model->get_preparaciones();
            $data['plazos'] = $this->plazos_model->get_plazos();
            $data['proyectos'] = $this->proyectos_consejo_model->get_reporte_proyectos_01($dependencia, $area, $cve_rol, $cve_planteamiento, $cve_preparacion, $cve_plazo, $cve_consejo);

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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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
            $sql = "select c.nom_consejo, pt.nom_planteamiento, pc.nom_proyecto, pc.responsable, pc.objetivos, pc.indicadores, op.nom_objetivo, at.nom_atingencia, pc.valor_atingencia, to_char((pc.valor_atingencia::numeric / 35)*100, '999.99') as calif_atingencia, pr.nom_preparacion, pc.valor_grado_preparacion, to_char((pc.valor_grado_preparacion::numeric / 65)*100, '999.99') as calif_grado_preparacion, pl.nom_plazo, spc.nom_status from proyectos_consejo pc left join consejos c on pc.cve_consejo = c.cve_consejo left join objetivo_plangto op on pc.cve_objetivo = op.cve_objetivo left join preparaciones pr on pc.cve_preparacion = pr.cve_preparacion left join plazos pl on pc.cve_plazo = pl.cve_plazo left join atingencias at on pc.cve_atingencia = at.cve_atingencia left join planteamientos pt on pc.cve_planteamiento = pt.cve_planteamiento left join status_proyectos_consejo spc on pc.cve_status = spc.cve_status where pc.dependencia LIKE ? and pc.area LIKE ?";
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);
            
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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

    public function estadistico_acuerdos_02()
    {
        // Estadistico de acuerdos con filtros
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $filtros = $this->input->post();
            if ($filtros) {
                $fecha_ini = $filtros['fecha_ini'];
                $fecha_fin = $filtros['fecha_fin'];
            } else {
                $fecha_ini = date('Y-m-01', time());
                $fecha_fin = date('Y-m-t', time());
			}
            $data['fecha_ini'] = $fecha_ini;
            $data['fecha_fin'] = $fecha_fin;

            $this->load->model('acuerdos_sesion_model');

            $data['acuerdos_periodo'] = $this->acuerdos_sesion_model->get_acuerdos_periodo($dependencia, $area, $cve_rol, $fecha_ini, $fecha_fin);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/estadistico_acuerdos_02', $data);
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

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

    public function estadistico_consejos_01()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $this->load->model('consejos_model');

            $data['estadistico_consejos'] = $this->consejos_model->get_estadistico_consejos_01($dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/estadistico_consejos_01', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function estadistico_actores_01()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $this->load->model('actores_model');

            $data['estadistico_actores'] = $this->actores_model->get_estadistico_actores_01($dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/estadistico_actores_01', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function listado_acuerdos_01()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $filtros = $this->input->post();
            if ($filtros) {
                $cve_consejo = $filtros['cve_consejo'];
                $cve_status = $filtros['cve_status'];
            } else {
                $cve_consejo = '0';
                $cve_status = '0';
			}

            $data['cve_consejo'] = $cve_consejo;
            $data['cve_status'] = $cve_status;

            $data['consejos'] = $this->consejos_model->get_consejos_dependencia($dependencia, $area, $cve_rol);
            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();
            $data['acuerdos_consejo'] = $this->acuerdos_sesion_model->get_acuerdos_consejo($dependencia, $area, $cve_rol, $cve_consejo, $cve_status);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/listado_acuerdos_01', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function listado_acuerdos_01_csv()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $filtros = $this->input->post();
            if ($filtros) {
                $cve_consejo = $filtros['cve_consejo'];
                $cve_status = $filtros['cve_status'];
            } else {
                $cve_consejo = '0';
                $cve_status = '0';
			}

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

            $sql = "select c.nom_consejo, acs.codigo_acuerdo, acs.nom_acuerdo, acs.responsable, acs.fecha_cumplimiento, sas.nom_status, acs.observaciones from acuerdos_sesion acs left join consejos c on acs.cve_consejo = c.cve_consejo left join status_acuerdos_sesion sas on acs.cve_status = sas.cve_status where dependencia LIKE ? and area LIKE ?";

            $parametros = array();
            array_push($parametros, "$dependencia");
            array_push($parametros, "$area");
            if ($cve_consejo > 0) {
                $sql .= ' and acs.cve_consejo = ?';
                array_push($parametros, "$cve_consejo");
            } 
            if ($cve_status > 0) {
                $sql .= ' and acs.cve_status = ?';
                array_push($parametros, "$cve_status");
            } 

            $query = $this->db->query($sql, $parametros);

            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download("listado_acuerdos_01.csv", $data);
        }
    }

    public function listado_bitacora_01()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $filtros = $this->input->post();
            if ($filtros) {
                $accion = $filtros['accion'];
                $entidad = $filtros['entidad'];
            } else {
                $accion = '';
                $entidad = '';
			}

            $data['accion'] = $accion;
            $data['entidad'] = $entidad;

            $data['bitacora'] = $this->bitacora_model->get_bitacora($dependencia, $area, $cve_rol, $accion, $entidad);

            $this->load->view('templates/header', $data);
            $this->load->view('reportes/listado_bitacora_01', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function listado_bitacora_01_csv()
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $this->load->dbutil();
            $this->load->helper('file');
            $this->load->helper('download');

            $filtros = $this->input->post();
            if ($filtros) {
                $accion = $filtros['accion'];
                $entidad = $filtros['entidad'];
            } else {
                $accion = '';
                $entidad = '';
			}

            if ($cve_rol == 'sup') {
                $area = '%';
            }
            if ($cve_rol == 'adm') {
                $dependencia = '%';
                $area = '%';
            }

            $sql = "select b.* from bitacora b where b.dependencia LIKE ? and b.area LIKE ?";
            $parametros = array();
            array_push($parametros, "$dependencia");
            array_push($parametros, "$area");
            if ($accion <> "") {
                $sql .= ' and b.accion = ?';
                array_push($parametros, "$accion");
            } 
            if ($entidad <> "") {
                $sql .= ' and b.entidad = ?';
                array_push($parametros, "$entidad");
            } 
            $sql .= ' order by b.cve_evento desc;';
            $query = $this->db->query($sql, $parametros);

            $delimiter = ",";
            $newline = "\r\n";
            $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
            force_download("listado_bitacora_01.csv", $data);
        }
    }

}
