<?php
class Calendario_sesiones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('calendario_sesiones_model');

    }

    public function guardar()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $calendario_sesion = $this->input->post();
            if ($calendario_sesion) {
                $cve_consejo = empty($calendario_sesion['cve_consejo']) ? null : $calendario_sesion['cve_consejo'];
                $nom_sesion = empty($calendario_sesion['nom_sesion']) ? null : $calendario_sesion['nom_sesion'];
                $fecha = empty($calendario_sesion['fecha']) ? null : $calendario_sesion['fecha'];
                $hora = empty($calendario_sesion['hora']) ? null : $calendario_sesion['hora'];
                $cve_status = empty($calendario_sesion['cve_status']) ? null : $calendario_sesion['cve_status'];

                if ($cve_consejo && $nom_sesion && $fecha && $hora && $cve_status) {
                    $this->calendario_sesiones_model->guardar($cve_consejo, $nom_sesion, $dependencia, $fecha, $hora, $cve_status);
                } else {
                    $this->session->set_flashdata('error_calendario_sesion', 'Capture todos los datos');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actualizar_status($cve_sesion, $cve_consejo, $cve_status)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            if ($cve_sesion && $cve_consejo && $cve_status) {
                $this->calendario_sesiones_model->actualizar_status($cve_sesion, $cve_consejo, $cve_status);
            } else {
                $this->session->set_flashdata('error_calendario_sesion', 'Capture todos los datos');
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function eliminar_registro($cve_sesion, $cve_consejo)
    {
        $dependencia = $this->session->userdata('dependencia');
        $this->calendario_sesiones_model->eliminar_registro($cve_sesion, $cve_consejo, $dependencia);
        redirect($_SERVER['HTTP_REFERER']);
    }

}


