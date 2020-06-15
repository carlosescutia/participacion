<?php
class Cargos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('cargos_model');
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

            $data['cargos'] = $this->cargos_model->get_cargos();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/cargos/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_cargo)
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

            $data['cargos'] = $this->cargos_model->get_cargo($cve_cargo);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/cargos/detalle', $data);
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
            $this->load->view('catalogos/cargos/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_cargo=null)
    {
        if ($this->session->userdata('logueado')) {

            $cargos = $this->input->post();
            if ($cargos) {
                $data = array(
                    'nom_cargo' => empty($cargos['nom_cargo']) ? null : $cargos['nom_cargo']
                );
                $this->cargos_model->guardar($data, $cve_cargo);
            }
            redirect('cargos/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_cargo)
    {
        if ($this->session->userdata('logueado')) {

            $this->cargos_model->eliminar($cve_cargo);
            redirect('cargos/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}


