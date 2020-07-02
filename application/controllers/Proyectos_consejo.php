<?php
class Proyectos_consejo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('proyectos_consejo_model');

    }

    public function guardar()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            $proyecto_sesion = $this->input->post();
            if ($proyecto_sesion) {
                $nom_proyecto = empty($proyecto_sesion['nom_proyecto']) ? null : $proyecto_sesion['nom_proyecto'];
                $dependencia = empty($proyecto_sesion['dependencia']) ? null : $proyecto_sesion['dependencia'];
                $area = empty($proyecto_sesion['area']) ? null : $proyecto_sesion['area'];
                $cve_consejo = empty($proyecto_sesion['cve_consejo']) ? null : $proyecto_sesion['cve_consejo'];
                $cve_preparacion = empty($proyecto_sesion['cve_preparacion']) ? null : $proyecto_sesion['cve_preparacion'];
                $cve_plazo = empty($proyecto_sesion['cve_plazo']) ? null : $proyecto_sesion['cve_plazo'];
                $objetivo_definido = empty($proyecto_sesion['objetivo_definido']) ? null : $proyecto_sesion['objetivo_definido'];
                $cve_atingencia = empty($proyecto_sesion['cve_atingencia']) ? null : $proyecto_sesion['cve_atingencia'];

                if ($nom_proyecto && $cve_consejo && cve_preparacion && objetivo_definido && cve_atingencia) {
                    $data = array(
                        'nom_proyecto' => $nom_proyecto,
                        'dependencia' => $dependencia,
                        'area' => $area,
                        'cve_consejo' => $cve_consejo,
                        'cve_preparacion' => $cve_preparacion,
                        'cve_plazo' => $cve_plazo,
                        'objetivo_definido' => $objetivo_definido,
                        'cve_atingencia' => $cve_atingencia
                    );
                    $this->proyectos_consejo_model->guardar($data);
                } else {
                    $this->session->set_flashdata('error_calendario_sesion', 'Capture todos los datos');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actualizar_preparacion($cve_proyecto, $cve_consejo, $cve_preparacion)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            if ($cve_proyecto && $cve_consejo && $cve_preparacion) {
                $this->proyectos_consejo_model->actualizar_preparacion($cve_proyecto, $cve_consejo, $cve_preparacion);
            } else {
                $this->session->set_flashdata('error_proyectos_consejo', 'Capture todos los datos');
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actualizar_plazo($cve_proyecto, $cve_consejo, $cve_plazo)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            if ($cve_proyecto && $cve_consejo && $cve_plazo) {
                $this->proyectos_consejo_model->actualizar_plazo($cve_proyecto, $cve_consejo, $cve_plazo);
            } else {
                $this->session->set_flashdata('error_proyectos_consejo', 'Capture todos los datos');
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actualizar_objetivo($cve_proyecto, $cve_consejo, $objetivo)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            if ($cve_proyecto && $cve_consejo && $objetivo) {
                $this->proyectos_consejo_model->actualizar_objetivo($cve_proyecto, $cve_consejo, $objetivo);
            } else {
                $this->session->set_flashdata('error_proyectos_consejo', 'Capture todos los datos');
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actualizar_atingencia($cve_proyecto, $cve_consejo, $cve_atingencia)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            if ($cve_proyecto && $cve_consejo && $cve_atingencia) {
                $this->proyectos_consejo_model->actualizar_atingencia($cve_proyecto, $cve_consejo, $cve_atingencia);
            } else {
                $this->session->set_flashdata('error_proyectos_consejo', 'Capture todos los datos');
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function eliminar_registro($cve_evento, $cve_consejo)
    {
        $dependencia = $this->session->userdata('dependencia');
        $area = $this->session->userdata('area');
        $this->proyectos_consejo_model->eliminar_registro($cve_evento, $cve_consejo, $dependencia, $area);
        redirect($_SERVER['HTTP_REFERER']);
    }

}



