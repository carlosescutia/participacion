<?php
class Tipo_actores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tipo_actores_model');
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

            $data['tipo_actores'] = $this->tipo_actores_model->get_tipo_actores();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/tipo_actores/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_tipo)
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

            $data['tipo_actores'] = $this->tipo_actores_model->get_tipo($cve_tipo);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/tipo_actores/detalle', $data);
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
            $this->load->view('catalogos/tipo_actores/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_tipo=null)
    {
        if ($this->session->userdata('logueado')) {

            $tipo_actores = $this->input->post();
            if ($tipo_actores) {
                $data = array(
                    'nom_tipo' => empty($tipo_actores['nom_tipo']) ? null : $tipo_actores['nom_tipo']
                );
                $this->tipo_actores_model->guardar($data, $cve_tipo);
            }
            redirect('tipo_actores/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_tipo)
    {
        if ($this->session->userdata('logueado')) {

            $this->tipo_actores_model->eliminar($cve_tipo);
            redirect('tipo_actores/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}



