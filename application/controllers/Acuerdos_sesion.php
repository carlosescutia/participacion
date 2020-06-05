<?php
class Acuerdos_sesion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $this->load->model('acuerdos_sesion_model');
        $this->load->model('status_acuerdos_sesion_model');
    }

    public function detalle($cve_acuerdo, $cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['error_acuerdos_sesion'] = $this->session->flashdata('error_acuerdos_sesion');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $rol = $this->session->userdata('rol');
            $data['usuario_rol'] = $rol;

            if ($rol == 'Administrador') {
                $dependencia = '';
            }

            $data['acuerdos_sesion'] = $this->acuerdos_sesion_model->get_acuerdo($cve_acuerdo, $cve_sesion, $cve_consejo);
            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();

            $this->load->view('templates/header', $data);
            $this->load->view('acuerdos/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }


    public function guardar($cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {

            $this->form_validation->set_rules('nom_acuerdo','Acuerdo','required',array('required' => '* requerido'));
            $this->form_validation->set_rules('cve_status','Status','required',array('required' => '* requerido'));
            $this->form_validation->set_rules('fecha_acuerdo','Fecha acuerdo','required',array('required' => '* requerido'));

            $acuerdos_sesion = $this->input->post();
            if ($this->form_validation->run()) {
                $data = array(
                    'nom_acuerdo' => $acuerdos_sesion['nom_acuerdo'],
                    'cve_status' => $acuerdos_sesion['cve_status'],
                    'cve_sesion' => $cve_sesion,
                    'cve_consejo' => $cve_consejo,
                    'observaciones' => $acuerdos_sesion['observaciones'],
                    'fecha_acuerdo' => empty($acuerdos_sesion['fecha_acuerdo']) ? null : $acuerdos_sesion['fecha_acuerdo'],
                    'fecha_compromiso' => empty($acuerdos_sesion['fecha_compromiso']) ? null : $acuerdos_sesion['fecha_compromiso'],
                    'fecha_cumplimiento' => empty($acuerdos_sesion['fecha_cumplimiento']) ? null : $acuerdos_sesion['fecha_cumplimiento'],
                    'porcentaje_avance' => empty($acuerdos_sesion['porcentaje_avance']) ? null : $acuerdos_sesion['porcentaje_avance'],
                    'causa_cancelado' => $acuerdos_sesion['causa_cancelado']
                );
                $cve_acuerdo = isset($acuerdos_sesion['cve_acuerdo']) ? $acuerdos_sesion['cve_acuerdo'] : null ;
                $this->acuerdos_sesion_model->guardar($data, $cve_acuerdo);
                redirect('sesiones/detalle/'.$cve_sesion.'/'.$cve_consejo);
            }

            $data = array(
                'acuerdos_sesion' => $acuerdos_sesion
            );

            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $rol = $this->session->userdata('rol');
            $data['usuario_rol'] = $rol;

            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();
            $data['cve_sesion'] = $cve_sesion;
            $data['cve_consejo'] = $cve_consejo;

            if ($rol == 'Administrador') {
                $dependencia = '';
            }

            if (isset($data['acuerdos_sesion']['cve_acuerdo']))
            {
                $this->load->view('templates/header', $data);
                $this->load->view('acuerdos/detalle', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('acuerdos/nuevo', $data);
                $this->load->view('templates/footer');
            }
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar_registro($cve_acuerdo, $cve_sesion, $cve_consejo)
    {
        $this->acuerdos_sesion_model->eliminar_registro($cve_acuerdo, $cve_sesion, $cve_consejo);
        redirect($_SERVER['HTTP_REFERER']);
    }

}



