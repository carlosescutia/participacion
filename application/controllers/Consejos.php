<?php
class Consejos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuarios_model');
        $this->load->model('consejos_model');

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
            $data['error'] = $this->session->flashdata('error');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $data['consejos'] = $this->consejos_model->get_consejo_dependencia($dependencia, $cve_consejo);

            $this->load->view('templates/header', $data);
            $this->load->view('consejos/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }



}


