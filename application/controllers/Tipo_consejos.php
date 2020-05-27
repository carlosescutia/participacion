<?php
class Tipo_consejos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tipo_consejos_model');
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

            $data['tipo_consejos'] = $this->tipo_consejos_model->get_tipo_consejos();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/tipo_consejos/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_tipo)
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

            $data['tipo_consejos'] = $this->tipo_consejos_model->get_tipo($cve_tipo);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/tipo_consejos/detalle', $data);
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
            $this->load->view('catalogos/tipo_consejos/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_tipo=null)
    {
        if ($this->session->userdata('logueado')) {

            $tipo_consejos = $this->input->post();
            if ($tipo_consejos) {
                $data = array(
                    'nom_tipo' => empty($tipo_consejos['nom_tipo']) ? null : $tipo_consejos['nom_tipo']
                );
                $this->tipo_consejos_model->guardar($data, $cve_tipo);
            }
            redirect('tipo_consejos/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_tipo)
    {
        if ($this->session->userdata('logueado')) {

            $this->tipo_consejos_model->eliminar($cve_tipo);
            redirect('tipo_consejos/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}



