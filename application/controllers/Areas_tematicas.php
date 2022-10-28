<?php
class Areas_tematicas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('areas_tematicas_model');
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

            $data['areas_tematicas'] = $this->areas_tematicas_model->get_areas_tematicas();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/areas_tematicas/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_area_tematica)
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

            $data['areas_tematicas'] = $this->areas_tematicas_model->get_area_tematica($cve_area_tematica);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/areas_tematicas/detalle', $data);
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
            $this->load->view('catalogos/areas_tematicas/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_area_tematica=null)
    {
        if ($this->session->userdata('logueado')) {

            $areas_tematicas = $this->input->post();
            if ($areas_tematicas) {
                $data = array(
                    'nom_area_tematica' => empty($areas_tematicas['nom_area_tematica']) ? null : $areas_tematicas['nom_area_tematica']
                );
                $this->areas_tematicas_model->guardar($data, $cve_area_tematica);
            }
            redirect('areas_tematicas/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_area_tematica)
    {
        if ($this->session->userdata('logueado')) {

            $this->areas_tematicas_model->eliminar($cve_area_tematica);
            redirect('areas_tematicas/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}

