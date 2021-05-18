<?php
class Sesiones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $this->load->model('sesiones_model');
        $this->load->model('acuerdos_sesion_model');
        $this->load->model('status_acuerdos_sesion_model');
        $this->load->model('objetivos_sesion_model');
        $this->load->model('modalidades_sesion_model');
        $this->load->model('asistencia_sesion_model');
        $this->load->model('grados_participacion_model');
        $this->load->model('accesos_sistema_model');
        $this->load->model('consejos_model');
        $this->load->model('bitacora_model');
    }

    public function detalle($cve_sesion, $cve_consejo)
    {
        if ($this->session->userdata('logueado')) {
            $data['error_sesion'] = $this->session->flashdata('error_sesion');
            $data['error_acuerdos_sesion'] = $this->session->flashdata('error_acuerdos_sesion');
            $data['error_adj_sesiones'] = $this->session->flashdata('error_adj_sesiones');
            $data['error_asistencia_sesion'] = $this->session->flashdata('error_asistencia_sesion');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $data['sesiones'] = $this->sesiones_model->get_sesion_consejo($cve_sesion, $cve_consejo);
            $data['acuerdos_sesion'] = $this->acuerdos_sesion_model->get_acuerdos_sesion($cve_sesion, $cve_consejo);
            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();
            $data['objetivos_sesion'] = $this->objetivos_sesion_model->get_objetivos_sesion();
            $data['modalidades_sesion'] = $this->modalidades_sesion_model->get_modalidades_sesion();
            $data['asistencia_sesion'] = $this->asistencia_sesion_model->get_asistencia_sesion($cve_sesion, $cve_consejo);
            $data['grados_participacion'] = $this->grados_participacion_model->get_grados_participacion();

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

            $this->form_validation->set_rules('num_sesion','nombre','required|numeric',array('required' => '* requerido','numeric' => '* número'));
            $this->form_validation->set_rules('tipo','tipo','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('cve_modalidad','cve_modalidad','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('lugar','lugar','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('fecha','fecha','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('hora_ini','hora_ini','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('hora_fin','hora_fin','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('cve_objetivo','cve_objetivo','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('orden_dia','orden_dia','required',array('required' => '* requerido',));

            $sesion = $this->input->post();
            if ($this->form_validation->run())
            {
                $data = array(
                    'cve_consejo' => $sesion['cve_consejo'],
                    'num_sesion' => $sesion['num_sesion'],
                    'tipo' => $sesion['tipo'],
                    'cve_modalidad' => $sesion['cve_modalidad'],
                    'lugar' => $sesion['lugar'],
                    'fecha' => $sesion['fecha'],
                    'hora_ini' => $sesion['hora_ini'],
                    'hora_fin' => $sesion['hora_fin'],
                    'cve_objetivo' => $sesion['cve_objetivo'],
                    'orden_dia' => $sesion['orden_dia'],
                    'comentarios' => $sesion['comentarios']
                );
                $cve_sesion = $sesion['cve_sesion'];
                if ( !isset($cve_sesion) ) {
                    $data['pub_presentacion'] = 1;
                    $data['pub_minuta'] = 1;
                    $data['pub_lista_asistencia'] = 1;
                    $data['pub_extras'] = 1;
                    $data['pub_audio'] = 1;
                    $data['pub_video'] = 1;
                    $accion = 'agregó';
                } else {
                    $accion = 'modificó';
                }
                $cve_sesion = $this->sesiones_model->guardar($data, $cve_sesion);

                $usuario = $this->session->userdata('usuario');
                $usuario_nombre = $this->session->userdata('nombre');
                $dependencia = $this->session->userdata('dependencia');
                $area = $this->session->userdata('area');
                $cve_rol = $this->session->userdata('cve_rol');

                $consejo = $this->consejos_model->get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol); 
                $datos_consejo = '(' . $cve_consejo . ':' . $consejo['nom_consejo'] . ')';
                $separador = ' -> ';
                $datos_sesion = $cve_sesion . ':' . $sesion['num_sesion'] . ' ' . ($sesion['tipo'] == 'o' ? 'ordinaria' : 'extraordinaria');
                $valor = $datos_consejo . $separador . $datos_sesion;

                $data = array(
                    'fecha' => date("Y-m-d"),
                    'hora' => date("H:i"),
                    'origen' => $_SERVER['REMOTE_ADDR'],
                    'usuario' => $usuario,
                    'usuario_nombre' => $usuario_nombre,
                    'dependencia' => $dependencia,
                    'area' => $area,
                    'accion' => $accion,
                    'entidad' => 'sesiones',
                    'valor' => $valor
                );
                $this->bitacora_model->guardar($data);

                redirect('consejos/detalle/'.$cve_consejo);
            }

            $data = array(
                'sesiones' => $sesion
            );
            $cve_sesion = empty($sesion['cve_sesion']) ? null : $sesion['cve_sesion'];

            $data['error_sesion'] = $this->session->flashdata('error_sesion');
            $data['error_acuerdos_sesion'] = $this->session->flashdata('error_acuerdos_sesion');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $data['acuerdos_sesion'] = $this->acuerdos_sesion_model->get_acuerdos_sesion($cve_sesion, $cve_consejo);
            $data['status_acuerdos_sesion'] = $this->status_acuerdos_sesion_model->get_status_acuerdos_sesion();
            $data['objetivos_sesion'] = $this->objetivos_sesion_model->get_objetivos_sesion();
            $data['modalidades_sesion'] = $this->modalidades_sesion_model->get_modalidades_sesion();

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

    public function actualizar_acceso_adjunto($cve_sesion, $cve_consejo, $adjunto, $valor_acceso)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            if ($cve_sesion && $cve_consejo && $adjunto) {
                $this->sesiones_model->actualizar_acceso_adjunto($cve_sesion, $cve_consejo, $adjunto, $valor_acceso);
            } else {
                echo "no entró";
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

}

