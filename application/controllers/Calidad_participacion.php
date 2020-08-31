<?php
class Calidad_participacion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('calidad_participacion_model');
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

            $data['calidad_participacion'] = $this->calidad_participacion_model->get_calidad_participacion();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/calidad_participacion/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_calidad)
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

            $data['calidad_participacion'] = $this->calidad_participacion_model->get_calidad($cve_calidad);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/calidad_participacion/detalle', $data);
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
            $this->load->view('catalogos/calidad_participacion/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_calidad=null)
    {
        if ($this->session->userdata('logueado')) {

            $calidad_participacion = $this->input->post();
            if ($calidad_participacion) {
                $data = array(
                    'nom_calidad' => empty($calidad_participacion['nom_calidad']) ? null : $calidad_participacion['nom_calidad']
                );
                $this->calidad_participacion_model->guardar($data, $cve_calidad);
            }
            redirect('calidad_participacion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_calidad)
    {
        if ($this->session->userdata('logueado')) {

            $this->calidad_participacion_model->eliminar($cve_calidad);
            redirect('calidad_participacion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}

