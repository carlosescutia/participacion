<?php
class Consejos_actores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('consejos_actores_model');
    }

    public function guardar()
    {
        if ($this->session->userdata('logueado')) {
            $consejos_actores = $this->input->post();
            if ($consejos_actores) {
                $cve_consejo = $consejos_actores['cve_consejo'];
                $cve_actor = $consejos_actores['cve_actor'];
                $cve_cargo = $consejos_actores['cve_cargo'];
                $fecha_inicio = $consejos_actores['fecha_inicio'];
                $fecha_fin = $consejos_actores['fecha_fin'];
                $status = $consejos_actores['status'];

                if ($cve_actor && $cve_cargo && $fecha_inicio && $fecha_fin && is_numeric($status)) {
                    $this->consejos_actores_model->guardar($cve_consejo, $cve_actor, $cve_cargo, $fecha_inicio, $fecha_fin, $status);
                } else {
                    $this->session->set_flashdata('error_integrantes', 'Capture todos los datos');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function eliminar_registro($cve_consejo, $cve_actor, $cve_cargo, $fecha_inicio, $fecha_fin, $status)
    {
        $this->consejos_actores_model->eliminar_registro($cve_consejo, $cve_actor, $cve_cargo, $fecha_inicio, $fecha_fin, $status);
        redirect($_SERVER['HTTP_REFERER']);
    }

}
