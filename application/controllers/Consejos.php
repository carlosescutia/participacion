<?php
class Consejos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $this->load->model('usuarios_model');
        $this->load->model('consejos_model');
        $this->load->model('tipo_consejos_model');
        $this->load->model('ejes_model');
        $this->load->model('consejos_actores_model');
        $this->load->model('actores_model');
        $this->load->model('cargos_model');
        $this->load->model('sesiones_model');
        $this->load->model('calendario_sesiones_model');
        $this->load->model('proyectos_consejo_model');
        $this->load->model('status_sesiones_model');
        $this->load->model('preparaciones_model');
        $this->load->model('plazos_model');
        $this->load->model('atingencias_model');
    }

    public function lista()
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

            $data['consejos'] = $this->consejos_model->get_consejos_dependencia($dependencia, $area, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('consejos/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['error_consejos'] = $this->session->flashdata('error_consejos');
            $data['error_integrantes'] = $this->session->flashdata('error_integrantes');
            $data['error_sesiones'] = $this->session->flashdata('error_sesiones');
            $data['error_calendario_sesion'] = $this->session->flashdata('error_calendario_sesion');
            $data['error_proyectos_consejo'] = $this->session->flashdata('error_proyectos_consejo');
            $data['error_adj_consejos'] = $this->session->flashdata('error_adj_consejos');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $data['consejos'] = $this->consejos_model->get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol);
            $data['tipo_consejos'] = $this->tipo_consejos_model->get_tipo_consejos();
            $data['ejes'] = $this->ejes_model->get_ejes();
            $data['consejos_actores'] = $this->consejos_actores_model->get_actores_consejo($cve_consejo);
            if ($data['consejos']['cve_tipo'] == 6) {
                $cve_tipo = '%';
            } else {
                $cve_tipo = '1';
            }
            $activo = 1;
            $cve_sector = 0;
            $data['actores'] = $this->actores_model->get_actores_dependencia($dependencia, $area, $activo, $cve_tipo, $cve_sector, $cve_rol);
            $data['cargos'] = $this->cargos_model->get_cargos();
            $data['sesiones'] = $this->sesiones_model->get_sesiones_consejo($cve_consejo);
            $data['calendario_sesiones'] = $this->calendario_sesiones_model->get_calendario_sesiones_consejo($cve_consejo, $dependencia, $area, $cve_rol);
            $data['status_sesiones'] = $this->status_sesiones_model->get_status_sesiones();
            $data['proyectos_consejo'] = $this->proyectos_consejo_model->get_proyectos_consejo($cve_consejo, $dependencia, $area, $cve_rol);
            $data['preparaciones'] = $this->preparaciones_model->get_preparaciones();
            $data['plazos'] = $this->plazos_model->get_plazos();
            $data['atingencias'] = $this->atingencias_model->get_atingencias();

            $this->load->view('templates/header', $data);
            $this->load->view('consejos/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_consejo=null)
    {
        if ($this->session->userdata('logueado')) {
            $this->form_validation->set_rules('nom_consejo','nombre','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('siglas','siglas','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('soporte_juridico','soporte juridico','required',array('required' => '* requerido',));

            $consejo = $this->input->post();
            if ($this->form_validation->run()) {
                $data = array(
                    'dependencia' => $consejo['dependencia'],
                    'area' => $consejo['area'],
                    'nom_consejo' => $consejo['nom_consejo'],
                    'siglas' => $consejo['siglas'],
                    'cve_tipo' => empty($consejo['cve_tipo']) ? null : $consejo['cve_tipo'],
                    'cve_eje' => empty($consejo['cve_eje']) ? null : $consejo['cve_eje'],
                    'soporte_juridico' => $consejo['soporte_juridico'],
                    'reglamento_interno' => $consejo['reglamento_interno'],
                    'fecha_reglamento' => empty($consejo['fecha_reglamento']) ? null : $consejo['fecha_reglamento'],
                    'periodo_inicio' => empty($consejo['periodo_inicio']) ? null : $consejo['periodo_inicio'],
                    'periodo_fin' => empty($consejo['periodo_fin']) ? null : $consejo['periodo_fin'],
                    'sesiones_anuales' => empty($consejo['sesiones_anuales']) ? null : $consejo['sesiones_anuales'],
                    'integracion' => $consejo['integracion'],
                    'fecha_instalacion' => empty($consejo['fecha_instalacion']) ? null : $consejo['fecha_instalacion'],
                    'status' => $consejo['status']
               );
                $cve_consejo = isset($consejo['cve_consejo']) ? $consejo['cve_consejo'] : null;
                print_r($data);
                $this->consejos_model->guardar($data, $cve_consejo);
                redirect('consejos/lista');
            }

            $data = array(
                'consejos' => $consejo
            );

            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $data['tipo_consejos'] = $this->tipo_consejos_model->get_tipo_consejos();
            $data['ejes'] = $this->ejes_model->get_ejes();

            if (isset($data['consejos']['cve_consejo']))
            {
                $data['error_integrantes'] = $this->session->flashdata('error_integrantes');
                $data['error_sesiones'] = $this->session->flashdata('error_sesiones');
                $data['error_calendario_sesion'] = $this->session->flashdata('error_calendario_sesion');

                $data['consejos_actores'] = $this->consejos_actores_model->get_actores_consejo($cve_consejo);
                $cve_tipo = 1;
                $activo = 1;
                $cve_sector = 0;
                $data['actores'] = $this->actores_model->get_actores_dependencia($dependencia, $area, $activo, $cve_tipo, $cve_sector, $cve_rol);
                $data['cargos'] = $this->cargos_model->get_cargos();
                $data['sesiones'] = $this->sesiones_model->get_sesiones_consejo($cve_consejo);
                $data['calendario_sesiones'] = $this->calendario_sesiones_model->get_calendario_sesiones_consejo($cve_consejo, $dependencia, $area, $cve_rol);
                $data['status_sesiones'] = $this->status_sesiones_model->get_status_sesiones();

                $this->load->view('templates/header', $data);
                $this->load->view('consejos/detalle', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('consejos/nuevo', $data);
                $this->load->view('templates/footer');
            }

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}
