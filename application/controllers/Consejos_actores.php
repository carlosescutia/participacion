<?php
class Consejos_actores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('consejos_actores_model');
        $this->load->model('accesos_sistema_model');
    }

    public function lista()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);
            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['consejos'] = $this->consejos_model->get_consejos_dependencia($dependencia, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('consejos/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
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
