<?php
class Usuarios_roles extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuarios_roles_model');
        $this->load->model('usuarios_model');
        $this->load->model('roles_model');
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
            }

            $data['usuarios_roles'] = $this->usuarios_roles_model->get_usuarios_roles();
            $data['usuarios'] = $this->usuarios_model->get_usuarios();
            $data['roles'] = $this->roles_model->get_roles();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/usuarios_roles/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }


    public function guardar()
    {
        if ($this->session->userdata('logueado')) {
            $usuarios_roles = $this->input->post();
            if ($usuarios_roles) {
                $cve_usuario = $usuarios_roles['cve_usuario'];
                $cve_rol = $usuarios_roles['cve_rol'];

                if ($cve_usuario && $cve_rol) {
                    $this->usuarios_roles_model->guardar($cve_usuario, $cve_rol);
                    redirect('usuarios_roles/lista');
                }
            }
        }
        redirect('usuarios_roles/lista');
    }

    public function eliminar($cve_usuario, $cve_rol)
    {
        $this->usuarios_roles_model->eliminar($cve_usuario, $cve_rol);
        redirect('usuarios_roles/lista');
    }

}

