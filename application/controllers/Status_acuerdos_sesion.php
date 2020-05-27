<?php
class Status_acuerdos_sesion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('status_acuerdos_sesion_model');
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

            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/status_acuerdos_sesion/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_status)
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

            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status($cve_status);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/status_acuerdos_sesion/detalle', $data);
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
            $this->load->view('catalogos/status_acuerdos_sesion/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_status=null)
    {
        if ($this->session->userdata('logueado')) {

            $status_acuerdos_sesion = $this->input->post();
            if ($status_acuerdos_sesion) {
                $data = array(
                    'nom_status' => empty($status_acuerdos_sesion['nom_status']) ? null : $status_acuerdos_sesion['nom_status']
                );
                $this->status_acuerdos_sesion_model->guardar($data, $cve_status);
            }
            redirect('status_acuerdos_sesion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_status)
    {
        if ($this->session->userdata('logueado')) {

            $this->status_acuerdos_sesion_model->eliminar($cve_status);
            redirect('status_acuerdos_sesion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}



