<?php
class Roles extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('roles_model');
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

            $data['roles'] = $this->roles_model->get_roles();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/roles/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_rol)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $rol;
            if ($rol != 'adm') {
                redirect('inicio');
            }

            $data['roles'] = $this->roles_model->get_rol($cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/roles/detalle', $data);
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
            $this->load->view('catalogos/roles/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_rol=null)
    {
        if ($this->session->userdata('logueado')) {

            $roles = $this->input->post();
            if ($roles) {
                $data = array(
                    'nom_rol' => empty($roles['nom_rol']) ? null : $roles['nom_rol']
                );
                $this->roles_model->guardar($data, $cve_rol);
            }
            redirect('roles/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_rol)
    {
        if ($this->session->userdata('logueado')) {

            $this->roles_model->eliminar($cve_rol);
            redirect('roles/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}



