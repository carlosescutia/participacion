<?php
class Sesiones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $this->load->model('sesiones_model');
        $this->load->model('acuerdos_sesion_model');
        $this->load->model('status_acuerdos_sesion_model');
        $this->load->model('objetivos_sesion_model');
        $this->load->model('modalidades_sesion_model');
    }

    public function detalle($cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['error_sesion'] = $this->session->flashdata('error_sesion');
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

            $data['sesiones'] = $this->sesiones_model->get_sesion_consejo($cve_sesion, $cve_consejo);
            $data['acuerdos_sesion'] = $this->acuerdos_sesion_model->get_acuerdos_sesion($cve_sesion, $cve_consejo);
            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();
            $data['objetivos_sesion'] = $this->objetivos_sesion_model->get_objetivos_sesion();
            $data['modalidades_sesion'] = $this->modalidades_sesion_model->get_modalidades_sesion();

            $this->load->view('templates/header', $data);
            $this->load->view('sesiones/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_consejo)
    {
        if ($this->session->userdata('logueado')) {

            $this->form_validation->set_rules('num_sesion','nombre','required|numeric',array('required' => '* requerido','numeric' => '* número'));
            $this->form_validation->set_rules('tipo','tipo','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('cve_modalidad','cve_modalidad','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('lugar','lugar','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('fecha','fecha','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('hora_ini','hora_ini','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('hora_fin','hora_fin','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('cve_objetivo','cve_objetivo','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('orden_dia','orden_dia','required',array('required' => '* requerido',));

            $sesion = $this->input->post();
            if ($this->form_validation->run())
            {
                $data = array(
                    'cve_consejo' => $sesion['cve_consejo'],
                    'num_sesion' => $sesion['num_sesion'],
                    'tipo' => $sesion['tipo'],
                    'cve_modalidad' => $sesion['cve_modalidad'],
                    'lugar' => $sesion['lugar'],
                    'fecha' => $sesion['fecha'],
                    'hora_ini' => $sesion['hora_ini'],
                    'hora_fin' => $sesion['hora_fin'],
                    'cve_objetivo' => $sesion['cve_objetivo'],
                    'orden_dia' => $sesion['orden_dia']
                );
                $cve_sesion = $sesion['cve_sesion'];
                $this->sesiones_model->guardar($data, $cve_sesion);
                redirect('consejos/detalle/'.$cve_consejo);
            }

            $data = array(
                'sesiones' => $sesion
            );
            $cve_sesion = empty($sesion['cve_sesion']) ? null : $sesion['cve_sesion'];

            $data['error_sesion'] = $this->session->flashdata('error_sesion');
            $data['error_acuerdos_sesion'] = $this->session->flashdata('error_acuerdos_sesion');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $rol = $this->session->userdata('rol');
            $data['usuario_rol'] = $rol;

            $data['acuerdos_sesion'] = $this->acuerdos_sesion_model->get_acuerdos_sesion($cve_sesion, $cve_consejo);
            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();
            $data['objetivos_sesion'] = $this->objetivos_sesion_model->get_objetivos_sesion();
            $data['modalidades_sesion'] = $this->modalidades_sesion_model->get_modalidades_sesion();

            if ($rol == 'Administrador') {
                $dependencia = '';
            }


            $data['cve_consejo'] = $cve_consejo;

            if (isset($data['sesiones']['cve_sesion']))
            {
                $this->load->view('templates/header', $data);
                $this->load->view('sesiones/detalle', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('sesiones/nuevo', $data);
                $this->load->view('templates/footer');
            }
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}

