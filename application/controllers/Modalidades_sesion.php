<?php
class Modalidades_sesion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('modalidades_sesion_model');
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

            $data['modalidades_sesion'] = $this->modalidades_sesion_model->get_modalidades_sesion();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/modalidades_sesion/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_modalidad)
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

            $data['modalidades_sesion'] = $this->modalidades_sesion_model->get_modalidad($cve_modalidad);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/modalidades_sesion/detalle', $data);
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
            $this->load->view('catalogos/modalidades_sesion/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_modalidad=null)
    {
        if ($this->session->userdata('logueado')) {

            $modalidades_sesion = $this->input->post();
            if ($modalidades_sesion) {
                $data = array(
                    'nom_modalidad' => empty($modalidades_sesion['nom_modalidad']) ? null : $modalidades_sesion['nom_modalidad']
                );
                $this->modalidades_sesion_model->guardar($data, $cve_modalidad);
            }
            redirect('modalidades_sesion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_modalidad)
    {
        if ($this->session->userdata('logueado')) {

            $this->modalidades_sesion_model->eliminar($cve_modalidad);
            redirect('modalidades_sesion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}

