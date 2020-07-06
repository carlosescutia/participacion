<?php
class Grados_participacion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('grados_participacion_model');
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

            $data['grados_participacion'] = $this->grados_participacion_model->get_grados_participacion();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/grados_participacion/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_grado_participacion)
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

            $data['grados_participacion'] = $this->grados_participacion_model->get_grado_participacion($cve_grado_participacion);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/grados_participacion/detalle', $data);
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
            $this->load->view('catalogos/grados_participacion/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_grado_participacion=null)
    {
        if ($this->session->userdata('logueado')) {

            $grados_participacion = $this->input->post();
            if ($grados_participacion) {
                $data = array(
                    'nom_grado_participacion' => empty($grados_participacion['nom_grado_participacion']) ? null : $grados_participacion['nom_grado_participacion']
                );
                $this->grados_participacion_model->guardar($data, $cve_grado_participacion);
            }
            redirect('grados_participacion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar($cve_grado_participacion)
    {
        if ($this->session->userdata('logueado')) {

            $this->grados_participacion_model->eliminar($cve_grado_participacion);
            redirect('grados_participacion/lista');

        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}

