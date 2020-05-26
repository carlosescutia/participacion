<?php
class Catalogos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $this->load->model('usuarios_model');
        $this->load->model('actores_model');
        $this->load->model('municipios_model');
        $this->load->model('entidades_model');
        $this->load->model('tipo_actores_model');
        $this->load->model('ambitos_model');
        $this->load->model('sectores_model');
        $this->load->model('consejos_actores_model');
        $this->load->model('perfiles_model');

    }

    public function lista()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $rol = $this->session->userdata('rol');
            $data['usuario_rol'] = $rol;

            if ($rol == 'Administrador') {
                $dependencia = '';
            } else {
                redirect('inicio');
            }

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function ambitos()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $rol = $this->session->userdata('rol');
            $data['usuario_rol'] = $rol;

            if ($rol == 'Administrador') {
                $dependencia = '';
            } else {
                redirect('inicio');
            }

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/ambitos', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}
