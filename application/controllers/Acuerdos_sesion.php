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
        $this->load->model('accesos_model');
    }

    public function detalle($cve_acuerdo, $cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['error_acuerdos_sesion'] = $this->session->flashdata('error_acuerdos_sesion');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $data['acuerdos_sesion'] = $this->acuerdos_sesion_model->get_acuerdo($cve_acuerdo, $cve_sesion, $cve_consejo);
            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();
            $data['accesos'] = $this->accesos_model->get_accesos();

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

            $this->form_validation->set_rules('codigo_acuerdo','Codigo','required',array('required' => '* requerido'));
            $this->form_validation->set_rules('nom_acuerdo','Acuerdo','required',array('required' => '* requerido'));
            $this->form_validation->set_rules('cve_status','Status','required',array('required' => '* requerido'));
            $this->form_validation->set_rules('fecha_acuerdo','Fecha acuerdo','required',array('required' => '* requerido'));
            $this->form_validation->set_rules('porcentaje_avance','Porcentaje avance','numeric',array('numeric' => '* solo números'));

            $acuerdos_sesion = $this->input->post();
            if ($this->form_validation->run()) {
                $data = array(
                    'codigo_acuerdo' => $acuerdos_sesion['codigo_acuerdo'],
                    'nom_acuerdo' => $acuerdos_sesion['nom_acuerdo'],
                    'cve_status' => $acuerdos_sesion['cve_status'],
                    'cve_acceso' => $acuerdos_sesion['cve_acceso'],
                    'cve_sesion' => $cve_sesion,
                    'cve_consejo' => $cve_consejo,
                    'observaciones' => $acuerdos_sesion['observaciones'],
                    'solicitud_iplaneg' => $acuerdos_sesion['solicitud_iplaneg'],
                    'responsable' => $acuerdos_sesion['responsable'],
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
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;

            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();
            $data['accesos'] = $this->accesos_model->get_accesos();
            $data['cve_sesion'] = $cve_sesion;
            $data['cve_consejo'] = $cve_consejo;

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



