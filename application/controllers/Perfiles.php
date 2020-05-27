<?php
class Perfiles extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('perfiles_model');
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

            $data['perfiles'] = $this->perfiles_model->get_perfiles();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/perfiles/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_perfil)
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

            $data['perfiles'] = $this->perfiles_model->get_perfil($cve_perfil);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/perfiles/detalle', $data);
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
            $this->load->view('catalogos/perfiles/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_perfil=null)
    {
        if ($this->session->userdata('logueado')) {

            $perfiles = $this->input->post();
            if ($perfiles) {
                $data = array(
                    'nom_perfil' => empty($perfiles['nom_perfil']) ? null : $perfiles['nom_perfil']
                );
                $this->perfiles_model->guardar($data, $cve_perfil);
            }
            redirect('perfiles/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_perfil)
    {
        if ($this->session->userdata('logueado')) {

            $this->perfiles_model->eliminar($cve_perfil);
            redirect('perfiles/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}

