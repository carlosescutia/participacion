<?php
class Status_proyectos_consejo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('status_proyectos_consejo_model');
        $this->load->model('accesos_sistema_model');
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);
            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['status_proyectos_consejo'] = $this->status_proyectos_consejo_model->get_status_proyectos_consejo();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/status_proyectos_consejo/lista', $data);
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);
            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['status_proyectos_consejo'] = $this->status_proyectos_consejo_model->get_status($cve_status);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/status_proyectos_consejo/detalle', $data);
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
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);
            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/status_proyectos_consejo/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_status=null)
    {
        if ($this->session->userdata('logueado')) {

            $status_proyectos_consejo = $this->input->post();
            if ($status_proyectos_consejo) {
                $data = array(
                    'nom_status' => empty($status_proyectos_consejo['nom_status']) ? null : $status_proyectos_consejo['nom_status']
                );
                $this->status_proyectos_consejo_model->guardar($data, $cve_status);
            }
            redirect('status_proyectos_consejo/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_status)
    {
        if ($this->session->userdata('logueado')) {

            $this->status_proyectos_consejo_model->eliminar($cve_status);
            redirect('status_proyectos_consejo/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}
