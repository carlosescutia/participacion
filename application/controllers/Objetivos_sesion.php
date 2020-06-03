<?php
class Objetivos_sesion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('objetivos_sesion_model');
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

            $data['objetivos_sesion'] = $this->objetivos_sesion_model->get_objetivos_sesion();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/objetivos_sesion/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_objetivo)
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

            $data['objetivos_sesion'] = $this->objetivos_sesion_model->get_objetivo($cve_objetivo);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/objetivos_sesion/detalle', $data);
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
            $this->load->view('catalogos/objetivos_sesion/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_objetivo=null)
    {
        if ($this->session->userdata('logueado')) {

            $objetivos_sesion = $this->input->post();
            if ($objetivos_sesion) {
                $data = array(
                    'nom_objetivo' => empty($objetivos_sesion['nom_objetivo']) ? null : $objetivos_sesion['nom_objetivo']
                );
                $this->objetivos_sesion_model->guardar($data, $cve_objetivo);
            }
            redirect('objetivos_sesion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_objetivo)
    {
        if ($this->session->userdata('logueado')) {

            $this->objetivos_sesion_model->eliminar($cve_objetivo);
            redirect('objetivos_sesion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}



