<?php
class Status_sesiones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('status_sesiones_model');
    }

    public function lista()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['status_sesiones'] = $this->status_sesiones_model->get_status_sesiones();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/status_sesiones/lista', $data);
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
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['status_sesiones'] = $this->status_sesiones_model->get_status($cve_status);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/status_sesiones/detalle', $data);
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
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/status_sesiones/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_status=null)
    {
        if ($this->session->userdata('logueado')) {

            $status_sesiones = $this->input->post();
            if ($status_sesiones) {
                $data = array(
                    'nom_status' => empty($status_sesiones['nom_status']) ? null : $status_sesiones['nom_status']
                );
                $this->status_sesiones_model->guardar($data, $cve_status);
            }
            redirect('status_sesiones/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_status)
    {
        if ($this->session->userdata('logueado')) {

            $this->status_sesiones_model->eliminar($cve_status);
            redirect('status_sesiones/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}



