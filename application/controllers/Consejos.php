<?php
class Consejos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuarios_model');
        $this->load->model('consejos_model');
        $this->load->model('tipo_consejos_model');
        $this->load->model('ejes_model');
        $this->load->model('consejos_actores_model');
        $this->load->model('actores_model');
        $this->load->model('cargos_model');
        $this->load->model('sesiones_model');

    }

    public function lista()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $data['consejos'] = $this->consejos_model->get_consejos_dependencia($dependencia);

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
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $data['consejos'] = $this->consejos_model->get_consejo_dependencia($dependencia, $cve_consejo);
            $data['tipo_consejos'] = $this->tipo_consejos_model->get_tipo_consejos();
            $data['ejes'] = $this->ejes_model->get_ejes();
            $data['consejos_actores'] = $this->consejos_actores_model->get_actores_consejo($cve_consejo);
            $cve_tipo = 1;
            $activo = 1;
            $cve_sector = 0;
            $data['actores'] = $this->actores_model->get_actores_dependencia($dependencia, $activo, $cve_tipo, $cve_sector);
            $data['cargos'] = $this->cargos_model->get_cargos();
            $data['sesiones'] = $this->sesiones_model->get_sesiones_consejo($cve_consejo);

            $this->load->view('templates/header', $data);
            $this->load->view('consejos/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function nuevo()
    {
        if ($this->session->userdata('logueado')) {
            $data['error_consejos'] = $this->session->flashdata('error_consejos');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $data['tipo_consejos'] = $this->tipo_consejos_model->get_tipo_consejos();
            $data['ejes'] = $this->ejes_model->get_ejes();

            $this->load->view('templates/header', $data);
            $this->load->view('consejos/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_consejo=null)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $consejo = $this->input->post();
            if ($consejo) {
                $nom_consejo = empty($consejo['nom_consejo']) ? null : $consejo['nom_consejo'];
                $siglas = empty($consejo['siglas']) ? null : $consejo['siglas'];
                $cve_tipo = empty($consejo['cve_tipo']) ? null : $consejo['cve_tipo'];
                $cve_eje = empty($consejo['cve_eje']) ? null : $consejo['cve_eje'];
                $soporte_juridico = empty($consejo['soporte_juridico']) ? null : $consejo['soporte_juridico'];
                $reglamento_interno = empty($consejo['reglamento_interno']) ? null : $consejo['reglamento_interno'];
                $fecha_reglamento = empty($consejo['fecha_reglamento']) ? null : $consejo['fecha_reglamento'];
                $periodo_inicio = empty($consejo['periodo_inicio']) ? null : $consejo['periodo_inicio'];
                $periodo_fin = empty($consejo['periodo_fin']) ? null : $consejo['periodo_fin'];
                $sesiones_anuales = empty($consejo['sesiones_anuales']) ? null : $consejo['sesiones_anuales'];
                $integracion = empty($consejo['integracion']) ? null : $consejo['integracion'];
                $fecha_instalacion = empty($consejo['fecha_instalacion']) ? null : $consejo['fecha_instalacion'];
                $status = !isset($consejo['status']) ? null : $consejo['status'];

                if ($nom_consejo && $siglas && $soporte_juridico) {
                    $this->consejos_model->guardar($nom_consejo, $dependencia, $siglas, $cve_tipo, $cve_eje, $soporte_juridico, $reglamento_interno, $fecha_reglamento, $periodo_inicio, $periodo_fin, $sesiones_anuales, $integracion, $fecha_instalacion, $status, $cve_consejo);
                } else {
                    $this->session->set_flashdata('error_consejos', 'Capture todos los datos obligatorios (en azul)');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            redirect('consejos/lista');
        }
    }


}


