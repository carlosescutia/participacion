<?php
class Sesiones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('sesiones_model');

    }

    public function detalle($cve_sesion)
    {
        if ($this->session->userdata('logueado')) {
            $data['error_sesion'] = $this->session->flashdata('error_sesion');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $data['sesiones'] = $this->sesiones_model->get_sesion($cve_sesion);

            $this->load->view('templates/header', $data);
            $this->load->view('sesiones/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function nuevo($cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['error_sesion'] = $this->session->flashdata('error_sesion');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $data['cve_consejo'] = $cve_consejo;

            $this->load->view('templates/header', $data);
            $this->load->view('sesiones/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_sesion=null)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $sesion = $this->input->post();
            if ($sesion) {
                $cve_consejo = empty($sesion['cve_consejo']) ? null : $sesion['cve_consejo'];
                $nom_sesion = empty($sesion['nom_sesion']) ? null : $sesion['nom_sesion'];
                $tipo = empty($sesion['tipo']) ? null : $sesion['tipo'];
                $lugar = empty($sesion['lugar']) ? null : $sesion['lugar'];
                $fecha = empty($sesion['fecha']) ? null : $sesion['fecha'];
                $hora = empty($sesion['hora']) ? null : $sesion['hora'];
                $objetivo = empty($sesion['objetivo']) ? null : $sesion['objetivo'];
                $orden_dia = empty($sesion['orden_dia']) ? null : $sesion['orden_dia'];

                if ($cve_consejo && $nom_sesion && $tipo && $lugar && $fecha && $hora && $objetivo && $orden_dia) {
                    $this->sesiones_model->guardar($cve_consejo, $nom_sesion, $tipo, $lugar, $fecha, $hora, $objetivo, $orden_dia, $cve_sesion);
                } else {
                    $this->session->set_flashdata('error_sesion', 'Capture todos los datos');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            redirect('consejos/lista');
        }
    }

}

