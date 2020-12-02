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

    public function guardar_lista($cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            $lista_asistencia = $this->input->post();
            if ($lista_asistencia) {
                foreach ($lista_asistencia as $clave => $valor) {
                    if ($clave[0] == 's') {
                        $cve_asistencia = substr($clave, 2);
                        $nom_suplente = $valor;
                        $this->actualizar_nom_suplente($cve_asistencia, $cve_sesion, $cve_consejo, $nom_suplente);
                    }
                    if ($clave[0] == 'a') {
                        $cve_asistencia = substr($clave, 2);
                        $asistencia = $valor;
                        $this->actualizar_asistencia($cve_asistencia, $cve_sesion, $cve_consejo, $asistencia);
                    }
                    if ($clave[0] == 'p') {
                        $cve_asistencia = substr($clave, 2);
                        $cve_grado_participacion = $valor;
                        $this->actualizar_grado_participacion($cve_asistencia, $cve_sesion, $cve_consejo, $cve_grado_participacion);
                    }
                }
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function actualizar_nom_suplente($cve_asistencia, $cve_sesion, $cve_consejo, $nom_suplente)
    {
        if ($cve_asistencia && $cve_sesion && $cve_consejo) {
            $this->asistencia_sesion_model->actualizar_nom_suplente($cve_asistencia, $cve_sesion, $cve_consejo, $nom_suplente);
        }
    }

    public function actualizar_asistencia($cve_asistencia, $cve_sesion, $cve_consejo, $asistencia)
    {
        if ($cve_asistencia && $cve_sesion && $cve_consejo && $asistencia) {
            $this->asistencia_sesion_model->actualizar_asistencia($cve_asistencia, $cve_sesion, $cve_consejo, $asistencia);
        }
    }

    public function actualizar_grado_participacion($cve_asistencia, $cve_sesion, $cve_consejo, $cve_grado_participacion)
    {
        if ($cve_asistencia && $cve_sesion && $cve_consejo && $cve_grado_participacion) {
            $this->asistencia_sesion_model->actualizar_grado_participacion($cve_asistencia, $cve_sesion, $cve_consejo, $cve_grado_participacion);
        }
    }

    public function eliminar_lista($cve_sesion, $cve_consejo)
    {
        $this->proyectos_consejo_model->eliminar_lista($cve_sesion, $cve_consejo);
    }

}
