<?php
class Ejes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ejes_model');
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

            $data['ejes'] = $this->ejes_model->get_ejes();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/ejes/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_eje)
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

            $data['ejes'] = $this->ejes_model->get_eje($cve_eje);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/ejes/detalle', $data);
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
            $this->load->view('catalogos/ejes/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_eje=null)
    {
        if ($this->session->userdata('logueado')) {

            $ejes = $this->input->post();
            if ($ejes) {
                $data = array(
                    'nom_eje' => empty($ejes['nom_eje']) ? null : $ejes['nom_eje']
                );
                $this->ejes_model->guardar($data, $cve_eje);
            }
            redirect('ejes/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_eje)
    {
        if ($this->session->userdata('logueado')) {

            $this->ejes_model->eliminar($cve_eje);
            redirect('ejes/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}


