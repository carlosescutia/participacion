<?php
class Accesos_sistema extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('accesos_sistema_model');
        $this->load->model('opciones_model');
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

            $data['accesos_sistema'] = $this->accesos_sistema_model->get_accesos_sistema();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/accesos_sistema/lista', $data);
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

            $data['opciones'] = $this->opciones_model->get_opciones();
            $data['roles'] = $this->roles_model->get_roles();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/accesos_sistema/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_acceso=null)
    {
        if ($this->session->userdata('logueado')) {

            $accesos_sistema = $this->input->post();
            if ($accesos_sistema) {
                $data = array(
                    'cod_opcion' => empty($accesos_sistema['cod_opcion']) ? null : $accesos_sistema['cod_opcion'],
                    'cve_rol' => empty($accesos_sistema['cve_rol']) ? null : $accesos_sistema['cve_rol']
                );
                $this->accesos_sistema_model->guardar($data, $cve_acceso);
            }
            redirect('accesos_sistema/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_acceso)
    {
        if ($this->session->userdata('logueado')) {

            $this->accesos_sistema_model->eliminar($cve_acceso);
            redirect('accesos_sistema/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}



