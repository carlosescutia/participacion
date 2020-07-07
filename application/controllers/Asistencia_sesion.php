<?php
class Asistencia_sesion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('asistencia_sesion_model');

    }

    public function generar_lista($cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            if ($cve_sesion && $cve_consejo) {
                $this->asistencia_sesion_model->eliminar_lista($cve_sesion, $cve_consejo);
                $this->asistencia_sesion_model->generar_lista($cve_sesion, $cve_consejo);
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function actualizar_asistencia($cve_asistencia, $cve_sesion, $cve_consejo, $asistencia)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            if ($cve_asistencia && $cve_sesion && $cve_consejo && $asistencia) {
                $this->asistencia_sesion_model->actualizar_asistencia($cve_asistencia, $cve_sesion, $cve_consejo, $asistencia);
            } else {
                $this->session->set_flashdata('error_asistencia_sesion', 'Capture todos los datos');
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actualizar_grado_participacion($cve_asistencia, $cve_sesion, $cve_consejo, $cve_grado_participacion)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            if ($cve_asistencia && $cve_sesion && $cve_consejo && $cve_grado_participacion) {
                $this->asistencia_sesion_model->actualizar_grado_participacion($cve_asistencia, $cve_sesion, $cve_consejo, $cve_grado_participacion);
            } else {
                $this->session->set_flashdata('error_asistencia_sesion', 'Capture todos los datos');
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function eliminar_lista($cve_sesion, $cve_consejo)
    {
        $this->proyectos_consejo_model->eliminar_lista($cve_sesion, $cve_consejo);
    }

}
