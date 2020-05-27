<?php
class Usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuarios_model');
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

            $data['usuarios'] = $this->usuarios_model->get_usuarios();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/usuarios/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_usuario)
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

            $data['usuarios'] = $this->usuarios_model->get_usuario($cve_usuario);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/usuarios/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function nuevo()
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
            $this->load->view('catalogos/usuarios/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_usuario=null)
    {
        if ($this->session->userdata('logueado')) {

            $usuarios = $this->input->post();
            if ($usuarios) {
                $data = array(
                    'nombre' => empty($usuarios['nombre']) ? null : $usuarios['nombre'],
                    'usuario' => empty($usuarios['usuario']) ? null : $usuarios['usuario'],
                    'password' => empty($usuarios['password']) ? null : $usuarios['password'],
                    'dependencia' => empty($usuarios['dependencia']) ? null : $usuarios['dependencia'],
                    'activo' => empty($usuarios['activo']) ? '0' : $usuarios['activo']
                );
                $this->usuarios_model->guardar($data, $cve_usuario);
            }
            redirect('usuarios/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_usuario)
    {
        if ($this->session->userdata('logueado')) {

            $this->usuarios_model->eliminar($cve_usuario);
            redirect('usuarios/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }
}
