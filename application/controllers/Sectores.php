<?php
class Sectores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('sectores_model');
        $this->load->model('ambitos_model');
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

            $data['sectores'] = $this->sectores_model->get_sectores();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/sectores/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_sector)
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

            $data['ambitos'] = $this->ambitos_model->get_ambitos();
            $data['sectores'] = $this->sectores_model->get_sector($cve_sector);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/sectores/detalle', $data);
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

            $data['ambitos'] = $this->ambitos_model->get_ambitos();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/sectores/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_sector=null)
    {
        if ($this->session->userdata('logueado')) {

            $sectores = $this->input->post();
            if ($sectores) {
                $data = array(
                    'nom_sector' => empty($sectores['nom_sector']) ? null : $sectores['nom_sector'],
                    'cve_ambito' => empty($sectores['cve_ambito']) ? null : $sectores['cve_ambito']
                );
                $this->sectores_model->guardar($data, $cve_sector);
            }
            redirect('sectores/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_sector)
    {
        if ($this->session->userdata('logueado')) {

            $this->sectores_model->eliminar($cve_sector);
            redirect('sectores/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function get_sectores_ambito($cve_ambito)
    {
        $data = $this->sectores_model->get_sectores_ambito($cve_ambito);
        echo json_encode($data);
    }

}
