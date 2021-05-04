<?php
class Inicio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuarios_model');
        $this->load->model('actores_model');
        $this->load->model('consejos_model');
        $this->load->model('calendario_sesiones_model');
        $this->load->model('status_sesiones_model');
        $this->load->model('accesos_sistema_model');
        $this->load->model('bitacora_model');

    }

    public function index()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $area = $this->session->userdata('area');
            $data['usuario_dependencia'] = $dependencia;
            $data['usuario_area'] = $area;
            $data['error'] = $this->session->flashdata('error');
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $data['estadisticas_actores'] = $this->actores_model->get_estadisticas_actores($dependencia, $area, $cve_rol);
            $data['estadisticas_consejos'] = $this->consejos_model->get_estadisticas_consejos($dependencia, $area, $cve_rol);
            $data['calendario_sesiones'] = $this->calendario_sesiones_model->get_calendario_sesiones_dependencia($dependencia, $area, $cve_rol);
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $this->load->view('templates/header', $data);
            $this->load->view('inicio/inicio', $data);
            $this->load->view('templates/footer');
        } else {
            $this->iniciar_sesion();
        }
    }

    public function iniciar_sesion() {
        $data = array();
        $data['error'] = $this->session->flashdata('error');
        $this->load->view('inicio/iniciar_sesion', $data);
    }

    public function cerrar_sesion() {
        $usuario_data = array(
            'logueado' => FALSE
        );
        $usuario = $this->session->userdata('usuario');
        $dependencia = $this->session->userdata('dependencia');
        $area = $this->session->userdata('area');
        $data = array(
            'fecha' => date("Y-m-d"),
            'hora' => date("H:i"),
            'origen' => $_SERVER['REMOTE_ADDR'],
            'usuario' => $usuario,
            'dependencia' => $dependencia,
            'area' => $area,
            'accion' => 'logout',
            'entidad' => '',
            'valor' => ''
        );
        $this->bitacora_model->guardar($data);
        $this->session->set_userdata($usuario_data);
        redirect('inicio/iniciar_sesion');
    }

    public function iniciar_sesion_post() {
        if ($this->input->post()) {
            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password');
            $usuario_db = $this->usuarios_model->usuario_por_nombre($usuario, $password);
            if ($usuario_db) {
                $usuario_data = array(
                    'clave' => $usuario_db->clave,
                    'nombre' => $usuario_db->nombre,
                    'usuario' => $usuario_db->usuario,
                    'dependencia' => $usuario_db->dependencia,
                    'area' => $usuario_db->area,
                    'cve_rol' => $usuario_db->cve_rol,
                    'logueado' => TRUE
                );
                $this->session->set_userdata($usuario_data);
                $data = array(
                    'fecha' => date("Y-m-d"),
                    'hora' => date("H:i"),
                    'origen' => $_SERVER['REMOTE_ADDR'],
                    'usuario' => $usuario_db->usuario,
                    'dependencia' => $usuario_db->dependencia,
                    'area' => $usuario_db->area,
                    'accion' => 'login',
                    'entidad' => '',
                    'valor' => ''
                );
                $this->bitacora_model->guardar($data);
                redirect('inicio');
            } else {
                $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
                redirect('inicio/iniciar_sesion');
            }
        } else {
            $this->iniciar_sesion();
        }
    }
}
