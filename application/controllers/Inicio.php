<?php
class Inicio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuarios_model');

    }

    public function index()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $data['usuario_dependencia'] = $this->session->userdata('dependencia');
            $data['title'] = 'Alineación Estratégica del Programa de Gobierno 2018-2024 y Estructura Presupuestaria 2019';
            $data['error'] = $this->session->flashdata('error');

            //print_r($this->session->userdata);

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
                    'logueado' => TRUE
                );
                $this->session->set_userdata($usuario_data);
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

