<?php
class Proyectos_consejo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->load->model('proyectos_consejo_model');
        $this->load->model('preparaciones_model');
        $this->load->model('plazos_model');
        $this->load->model('atingencias_model');
        $this->load->model('status_proyectos_consejo_model');
        $this->load->model('objetivo_plangto_model');
        $this->load->model('planteamientos_model');
        $this->load->model('accesos_sistema_model');
        $this->load->model('consejos_model');
        $this->load->model('actores_model');
        $this->load->model('bitacora_model');

    }

    public function detalle($cve_proyecto)
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

            $data['proyecto_consejo'] = $this->proyectos_consejo_model->get_proyecto_consejo($cve_proyecto);
            $data['preparaciones'] = $this->preparaciones_model->get_preparaciones();
            $data['plazos'] = $this->plazos_model->get_plazos();
            $data['atingencias'] = $this->atingencias_model->get_atingencias();
            $data['status_proyectos_consejo'] = $this->status_proyectos_consejo_model->get_status_proyectos_consejo();
            $data['objetivo_plangto'] = $this->objetivo_plangto_model->get_objetivo_plangto();
            $data['planteamientos'] = $this->planteamientos_model->get_planteamientos();

            $this->load->view('templates/header', $data);
            $this->load->view('proyectos_consejo/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar($cve_consejo=null)
    {
        if ($this->session->userdata('logueado')) {
            $this->form_validation->set_rules('nom_proyecto','Proyecto','required',array('required' => '* requerido'));
            $this->form_validation->set_rules('inversion','Inversión estimada','numeric',array('numeric' => '* numérico'));
            $this->form_validation->set_rules('empleos_directos','Empleos directos','numeric',array('numeric' => '* numérico'));
            $this->form_validation->set_rules('empleos_indirectos','Empleos indirectos','numeric',array('numeric' => '* numérico'));
            $this->form_validation->set_rules('derrama','Derrama económica','numeric',array('numeric' => '* numérico'));
            $this->form_validation->set_rules('valor_grado_preparacion','Valor del grado de preparación','numeric',array('numeric' => '* numérico'));
            $this->form_validation->set_rules('valor_atingencia','Valor de la atingencia','numeric',array('numeric' => '* numérico'));
            
            $proyecto_consejo = $this->input->post();
            if ($this->form_validation->run()) {
                $data = array(
                    'nom_proyecto' => $proyecto_consejo['nom_proyecto'],
                    'dependencia' => $proyecto_consejo['dependencia'],
                    'area' => $proyecto_consejo['area'],
                    'cve_consejo' => $proyecto_consejo['cve_consejo'],
                    'cve_planteamiento' => empty($proyecto_consejo['cve_planteamiento']) ? null : $proyecto_consejo['cve_planteamiento'],
                    'cve_preparacion' => $proyecto_consejo['cve_preparacion'],
                    'cve_plazo' => $proyecto_consejo['cve_plazo'],
                    'objetivo_definido' => $proyecto_consejo['objetivo_definido'],
                    'cve_atingencia' => $proyecto_consejo['cve_atingencia'],
                    'cve_status' => $proyecto_consejo['cve_status'],
                    'responsable' => $proyecto_consejo['responsable'],
                    'objetivos' => $proyecto_consejo['objetivos'],
                    'indicadores' => $proyecto_consejo['indicadores'],
                    'inversion' => empty($proyecto_consejo['inversion']) ? null : $proyecto_consejo['inversion'],
                    'empleos_directos' => empty($proyecto_consejo['empleos_directos']) ? null : $proyecto_consejo['empleos_directos'],
                    'empleos_indirectos' => empty($proyecto_consejo['empleos_indirectos']) ? null : $proyecto_consejo['empleos_indirectos'],
                    'derrama' => empty($proyecto_consejo['derrama']) ? null : $proyecto_consejo['derrama'],
                    'cve_objetivo' => $proyecto_consejo['cve_objetivo'],
                    'valor_grado_preparacion' => empty($proyecto_consejo['valor_grado_preparacion']) ? null : $proyecto_consejo['valor_grado_preparacion'],
                    'valor_atingencia' => empty($proyecto_consejo['valor_atingencia']) ? null : $proyecto_consejo['valor_atingencia']
                );
                $cve_proyecto = isset($proyecto_consejo['cve_proyecto']) ? $proyecto_consejo['cve_proyecto'] : null;
                if ($cve_proyecto) {
                    $accion = 'modificó';
                } else {
                    $accion = 'agregó';
                }
                $cve_consejo = isset($proyecto_consejo['cve_consejo']) ? $proyecto_consejo['cve_consejo'] : $cve_consejo ;
                $cve_proyecto = $this->proyectos_consejo_model->guardar($data, $cve_proyecto);

                $usuario = $this->session->userdata('usuario');
                $usuario_nombre = $this->session->userdata('nombre');
                $dependencia = $this->session->userdata('dependencia');
                $area = $this->session->userdata('area');
                $cve_rol = $this->session->userdata('cve_rol');
                $consejo = $this->consejos_model->get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol); 
                $datos_consejo = '(' . $cve_consejo . ':' . $consejo['nom_consejo'] . ')';
                $separador = ' -> ';
                $datos_proyecto = $cve_proyecto . ':' . $proyecto_consejo['nom_proyecto'];
                $valor = $datos_consejo . $separador . $datos_proyecto;
                $data = array(
                    'fecha' => date("Y-m-d"),
                    'hora' => date("H:i"),
                    'origen' => $_SERVER['REMOTE_ADDR'],
                    'usuario' => $usuario,
                    'usuario_nombre' => $usuario_nombre,
                    'dependencia' => $dependencia,
                    'area' => $area,
                    'accion' => $accion,
                    'entidad' => 'proyectos',
                    'valor' => $valor
                );
                $this->bitacora_model->guardar($data);

                redirect('consejos/detalle/'.$cve_consejo);
            }

            $data = array(
                'proyecto_consejo' => $proyecto_consejo
            );

            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $data['preparaciones'] = $this->preparaciones_model->get_preparaciones();
            $data['plazos'] = $this->plazos_model->get_plazos();
            $data['atingencias'] = $this->atingencias_model->get_atingencias();
            $data['status_proyectos_consejo'] = $this->status_proyectos_consejo_model->get_status_proyectos_consejo();
            $data['objetivo_plangto'] = $this->objetivo_plangto_model->get_objetivo_plangto();
            $data['planteamientos'] = $this->planteamientos_model->get_planteamientos();
            $data['cve_consejo'] = $cve_consejo;
                
            if (isset($data['proyecto_consejo']['cve_proyecto']))
            {
                $this->load->view('templates/header', $data);
                $this->load->view('proyectos_consejo/detalle', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('proyectos_consejo/nuevo', $data);
                $this->load->view('templates/footer');
            }
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function eliminar_registro($cve_proyecto, $cve_consejo)
    {
        $proyecto_consejo = $this->proyectos_consejo_model->get_proyecto_consejo($cve_proyecto);
        $this->proyectos_consejo_model->eliminar_registro($cve_proyecto, $cve_consejo);

        $usuario = $this->session->userdata('usuario');
        $usuario_nombre = $this->session->userdata('nombre');
        $dependencia = $this->session->userdata('dependencia');
        $area = $this->session->userdata('area');
        $cve_rol = $this->session->userdata('cve_rol');
        $consejo = $this->consejos_model->get_consejo_dependencia($dependencia, $area, $cve_consejo, $cve_rol); 
        $datos_consejo = '(' . $cve_consejo . ':' . $consejo['nom_consejo'] . ')';
        $separador = ' -> ';
        $datos_proyecto = $cve_proyecto . ':' . $proyecto_consejo['nom_proyecto'];
        $valor = $datos_consejo . $separador . $datos_proyecto;
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
            'entidad' => 'proyectos',
            'valor' => $valor
        );
        $this->bitacora_model->guardar($data);

        redirect($_SERVER['HTTP_REFERER']);
    }

}
