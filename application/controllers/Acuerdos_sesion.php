<?php
class Acuerdos_sesion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('acuerdos_sesion_model');

    }

    public function guardar()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $acuerdos_sesion = $this->input->post();
            if ($acuerdos_sesion) {
                $cve_sesion = empty($acuerdos_sesion['cve_sesion']) ? null : $acuerdos_sesion['cve_sesion'];
                $cve_consejo = empty($acuerdos_sesion['cve_consejo']) ? null : $acuerdos_sesion['cve_consejo'];
                $nom_acuerdo = empty($acuerdos_sesion['nom_acuerdo']) ? null : $acuerdos_sesion['nom_acuerdo'];
                $cve_status = empty($acuerdos_sesion['cve_status']) ? null : $acuerdos_sesion['cve_status'];
                $observaciones = empty($acuerdos_sesion['observaciones']) ? null : $acuerdos_sesion['observaciones'];

                if ($cve_sesion && $cve_consejo && $nom_acuerdo && $cve_status) {
                    $data = array(
                        'cve_sesion' => $cve_sesion,
                        'cve_consejo' => $cve_consejo,
                        'nom_acuerdo' => $nom_acuerdo,
                        'cve_status' => $cve_status,
                        'observaciones' => $observaciones
                    );
                    $this->acuerdos_sesion_model->guardar($data);
                } else {
                    $this->session->set_flashdata('error_acuerdos_sesion', 'Capture todos los datos');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actualizar_status($cve_acuerdo, $cve_sesion, $cve_consejo, $cve_status)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            if ($cve_acuerdo && $cve_sesion && $cve_consejo && $cve_status) {
                $this->acuerdos_sesion_model->actualizar_status($cve_acuerdo, $cve_sesion, $cve_consejo, $cve_status);
            } else {
                $this->session->set_flashdata('error_acuerdos_sesion', 'Capture todos los datos');
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function eliminar_registro($cve_acuerdo, $cve_sesion, $cve_consejo)
    {
        $this->acuerdos_sesion_model->eliminar_registro($cve_acuerdo, $cve_sesion, $cve_consejo);
        redirect($_SERVER['HTTP_REFERER']);
    }

}



