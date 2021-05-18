<?php
class Calendario_sesiones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('calendario_sesiones_model');
        $this->load->model('accesos_sistema_model');
        $this->load->model('consejos_model');
        $this->load->model('bitacora_model');

    }

    public function guardar()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            $calendario_sesion = $this->input->post();
            if ($calendario_sesion) {
                $cve_consejo = empty($calendario_sesion['cve_consejo']) ? null : $calendario_sesion['cve_consejo'];
                $nom_sesion = empty($calendario_sesion['nom_sesion']) ? null : $calendario_sesion['nom_sesion'];
                $fecha = empty($calendario_sesion['fecha']) ? null : $calendario_sesion['fecha'];
                $hora = empty($calendario_sesion['hora']) ? null : $calendario_sesion['hora'];
                $cve_status = empty($calendario_sesion['cve_status']) ? null : $calendario_sesion['cve_status'];

                if ($cve_consejo && $nom_sesion && $fecha && $hora && $cve_status) {
                    $cve_evento = $this->calendario_sesiones_model->guardar($cve_consejo, $nom_sesion, $dependencia, $area, $fecha, $hora, $cve_status);

                    $usuario = $this->session->userdata('usuario');
                    $usuario_nombre = $this->session->userdata('nombre');
                    $dependencia = $this->session->userdata('dependencia');
                    $area = $this->session->userdata('area');
                    $cve_rol = $this->session->userdata('cve_rol');
                    $consejo = $this->consejos_model->get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol); 
                    $datos_consejo = '(' . $cve_consejo . ':' . $consejo['nom_consejo'] . ')';
                    $separador = ' -> ';
                    $datos_calendario = $cve_evento . ':' . $nom_sesion;
                    $valor = $datos_consejo . $separador . $datos_calendario;
                    $accion = 'agregó';

                    $data = array(
                        'fecha' => date("Y-m-d"),
                        'hora' => date("H:i"),
                        'origen' => $_SERVER['REMOTE_ADDR'],
                        'usuario' => $usuario,
                        'usuario_nombre' => $usuario_nombre,
                        'dependencia' => $dependencia,
                        'area' => $area,
                        'accion' => $accion,
                        'entidad' => 'calendario',
                        'valor' => $valor
                    );
                    $this->bitacora_model->guardar($data);

                } else {
                    $this->session->set_flashdata('error_calendario_sesion', 'Capture todos los datos');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actualizar_status($cve_evento, $cve_consejo, $cve_status)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;

            if ($cve_evento && $cve_consejo && $cve_status) {
                $this->calendario_sesiones_model->actualizar_status($cve_evento, $cve_consejo, $cve_status);

                $usuario = $this->session->userdata('usuario');
                $usuario_nombre = $this->session->userdata('nombre');
                $dependencia = $this->session->userdata('dependencia');
                $area = $this->session->userdata('area');
                $cve_rol = $this->session->userdata('cve_rol');
                $consejo = $this->consejos_model->get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol); 
                $calendario = $this->calendario_sesiones_model->get_calendario($cve_evento, $cve_consejo);
                $datos_consejo = '(' . $cve_consejo . ':' . $consejo['nom_consejo'] . ')';
                $separador = ' -> ';
                $datos_evento = $cve_evento . ':' . $calendario['nom_sesion'];
                $valor = $datos_consejo . $separador . $datos_evento;
                $accion = 'modificó';

                $data = array(
                    'fecha' => date("Y-m-d"),
                    'hora' => date("H:i"),
                    'origen' => $_SERVER['REMOTE_ADDR'],
                    'usuario' => $usuario,
                    'usuario_nombre' => $usuario_nombre,
                    'dependencia' => $dependencia,
                    'area' => $area,
                    'accion' => $accion,
                    'entidad' => 'calendario',
                    'valor' => $valor
                );
                $this->bitacora_model->guardar($data);

            } else {
                $this->session->set_flashdata('error_calendario_sesion', 'Capture todos los datos');
                redirect($_SERVER['HTTP_REFERER']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function eliminar_registro($cve_evento, $cve_consejo)
    {
        $usuario = $this->session->userdata('usuario');
        $usuario_nombre = $this->session->userdata('nombre');
        $dependencia = $this->session->userdata('dependencia');
        $area = $this->session->userdata('area');
        $cve_rol = $this->session->userdata('cve_rol');
        $consejo = $this->consejos_model->get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol); 
        $calendario = $this->calendario_sesiones_model->get_calendario($cve_evento, $cve_consejo);
        $datos_consejo = '(' . $cve_consejo . ':' . $consejo['nom_consejo'] . ')';
        $separador = ' -> ';
        $datos_evento = $cve_evento . ':' . $calendario['nom_sesion'];
        $valor = $datos_consejo . $separador . $datos_evento;
        $accion = 'eliminó';

        $data = array(
            'fecha' => date("Y-m-d"),
            'hora' => date("H:i"),
            'origen' => $_SERVER['REMOTE_ADDR'],
            'usuario' => $usuario,
            'usuario_nombre' => $usuario_nombre,
            'dependencia' => $dependencia,
            'area' => $area,
            'accion' => $accion,
            'entidad' => 'calendario',
            'valor' => $valor
        );
        $this->bitacora_model->guardar($data);

        $this->calendario_sesiones_model->eliminar_registro($cve_evento, $cve_consejo, $dependencia, $area);
        redirect($_SERVER['HTTP_REFERER']);
    }

}


