<?php
class Sesiones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('sesiones_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }

    public function detalle($cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['error_sesion'] = $this->session->flashdata('error_sesion');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $data['sesiones'] = $this->sesiones_model->get_sesion_consejo($cve_sesion, $cve_consejo);

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

            $this->form_validation->set_rules('nom_sesion','nombre','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('tipo','tipo','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('lugar','lugar','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('fecha','fecha','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('hora','hora','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('objetivo','objetivo','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('orden_dia','orden_dia','required',array('required' => '* requerido',));

            $sesion = $this->input->post();
            if ($this->form_validation->run())
            {
                $data = array(
                    'cve_consejo' => $sesion['cve_consejo'],
                    'nom_sesion' => $sesion['nom_sesion'],
                    'tipo' => $sesion['tipo'],
                    'lugar' => $sesion['lugar'],
                    'fecha' => $sesion['fecha'],
                    'hora' => $sesion['hora'],
                    'objetivo' => $sesion['objetivo'],
                    'orden_dia' => $sesion['orden_dia']
                );
                $cve_sesion = $sesion['cve_sesion'];
                $this->sesiones_model->guardar($data, $cve_sesion);
                redirect('consejos/lista');
            }

            $data = array(
                'sesiones' => $sesion
            );

            $data['error_sesion'] = $this->session->flashdata('error_sesion');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

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

