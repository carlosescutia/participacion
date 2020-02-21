<?php
class Usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function iniciar_sesion() {
        $data = array();
        $data['error'] = $this->session->flashdata('error');
        $this->load->view('usuarios/iniciar_sesion', $data);
    }

    public function iniciar_sesion_post() {
        if ($this->input->post()) {
            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password');
            $this->load->model('usuario_model');
            $usuario_db = $this->usuario_model->usuario_por_nombre_password($usuario, $password);
            if ($usuario_db) {
                $usuario_data = array(
                    'id' => $usuario_db->id,
                    'nombre' => $usuario_db->nombre,
                    'usuario' => $usuario_db->usuario,
                    'correo' => $usuario_db->correo,
                    'dependencia' => $usuario_db->dependencia,
                    'logueado' => TRUE
                );
                $this->session->set_userdata($usuario_data);
                redirect('usuarios/logueado');
            } else {
                $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
                redirect('usuarios/iniciar_sesion');
            }
        } else {
            $this->iniciar_sesion();
        }
    }

    public function logueado() {
        if ($this->session->userdata('logueado')) {
            $data = array();
            $data['nombre'] = $this->session->userdata('nombre');
            $data['usuario'] = $this->session->userdata('usuario');
            $data['correo'] = $this->session->userdata('correo');
            $data['dependencia'] = $this->session->userdata('dependencia');
            $this->load->view('usuarios/logueado', $data);
        } else {
            redirect('usuarios/iniciar_sesion');
        }
    }

    public function cerrar_sesion() {
        $usuario_data = array(
            'logueado' => FALSE
        );
        $this->session->set_userdata($usuario_data);
        redirect('usuarios/iniciar_sesion');
    }
}
