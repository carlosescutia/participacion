<?php
class Actores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        $this->load->model('usuarios_model');
        $this->load->model('actores_model');
        $this->load->model('municipios_model');
        $this->load->model('entidades_model');
        $this->load->model('tipo_actores_model');
        $this->load->model('ambitos_model');
        $this->load->model('sectores_model');
        $this->load->model('consejos_actores_model');
        $this->load->model('perfiles_model');
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

            $filtros = $this->input->post();
            if ($filtros) {
                $activo = $filtros['activo'];
                $cve_tipo = $filtros['cve_tipo'];
                $cve_sector = $filtros['cve_sector'];
            } else {
                $activo = '1';
                $cve_tipo = '1';
                $cve_sector = '0';
			}

            $data['activo'] = $activo;
            $data['cve_tipo'] = $cve_tipo;
            $data['cve_sector'] = $cve_sector;

            $data['actores'] = $this->actores_model->get_actores_dependencia($dependencia, $area, $activo, $cve_tipo, $cve_sector, $cve_rol);
            $data['sectores'] = $this->sectores_model->get_sectores();

            $this->load->view('templates/header', $data);
            $this->load->view('actores/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function detalle($cve_actor)
    {
        if ($this->session->userdata('logueado')) {
            $data['error'] = $this->session->flashdata('error');
            $data['error_adj_actores'] = $this->session->flashdata('error_adj_actores');
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $data['actores'] = $this->actores_model->get_actor_dependencia($dependencia, $area, $cve_actor, $cve_rol);
            $data['municipios'] = $this->municipios_model->get_municipios();
            $data['entidades'] = $this->entidades_model->get_entidades();
            $data['tipo_actores'] = $this->tipo_actores_model->get_tipo_actores();
            $data['ambitos'] = $this->ambitos_model->get_ambitos();
            $cve_ambito = $data['actores']['cve_ambito'];
            $data['sectores'] = $this->sectores_model->get_sectores_ambito($cve_ambito);
            $data['consejos_actores'] = $this->consejos_actores_model->get_consejos_actor($cve_actor);
            $data['perfiles'] = $this->perfiles_model->get_perfiles();

            $this->load->view('templates/header', $data);
            $this->load->view('actores/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function guardar()
    {
        if ($this->session->userdata('logueado')) {

            $this->form_validation->set_rules('nombre','nombre','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('apellido_pa','apellido paterno','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('apellido_ma','apellido materno','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('sexo','sexo','required',array('required' => '*req',));
            $this->form_validation->set_rules('cve_tipo','tipo de actor','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('cve_ambito','ambito','required',array('required' => '* requerido',));
            $this->form_validation->set_rules('cve_sector','sector','required',array('required' => '* requerido',));

            $actores = $this->input->post();
            if ($this->form_validation->run())
            {
                $data = array(
                    'activo' => $actores['activo'] ,
                    'dependencia' => $actores['dependencia'],
                    'area' => $actores['area'],
                    'nombre' =>  $actores['nombre'],
                    'apellido_pa' =>  $actores['apellido_pa'],
                    'apellido_ma' =>  $actores['apellido_ma'],
                    'fecha_nacimiento' => empty($actores['fecha_nacimiento']) ? null : $actores['fecha_nacimiento'],
                    'sexo' =>  $actores['sexo'],
                    'calle' =>  $actores['calle'],
                    'num_exterior' =>  $actores['num_exterior'],
                    'num_interior' =>  $actores['num_interior'],
                    'colonia' =>  $actores['colonia'],
                    'codigo_postal' => empty($actores['codigo_postal']) ? null : $actores['codigo_postal'],
                    'ciudad' =>  $actores['ciudad'],
                    'cve_mun' =>  $actores['cve_mun'],
                    'cve_ent' =>  $actores['cve_ent'],
                    'cve_tipo' => empty($actores['cve_tipo']) ? null : $actores['cve_tipo'],
                    'expediente_archivistico' =>  $actores['expediente_archivistico'],
                    'cve_ambito' => empty($actores['cve_ambito']) ? null : $actores['cve_ambito'],
                    'cve_sector' => empty($actores['cve_sector']) ? null : $actores['cve_sector'],
                    'organizacion' =>  $actores['organizacion'],
                    'telefono_fijo' =>  $actores['telefono_fijo'],
                    'telefono_celular' =>  $actores['telefono_celular'],
                    'correo_personal' =>  $actores['correo_personal'],
                    'correo_laboral' =>  $actores['correo_laboral'],
                    'asistente' =>  $actores['asistente'],
                    'correo_asistente' =>  $actores['correo_asistente'],
                    'telefono_asistente' =>  $actores['telefono_asistente'],
                    'otros_espacios' =>  $actores['otros_espacios'],
                    'experiencia_exitosa' =>  $actores['experiencia_exitosa'],
                    'fecha_experiencia_exitosa' => empty($actores['fecha_experiencia_exitosa']) ? null : $actores['fecha_experiencia_exitosa'],
                    'desea_colaborar' =>  $actores['desea_colaborar'],
                    'profesion' =>  $actores['profesion'],
                    'cve_perfil' => empty($actores['cve_perfil']) ? null : $actores['cve_perfil']
                );
                $cve_actor = isset($actores['cve_actor']) ? $actores['cve_actor'] : null;
                $this->actores_model->guardar($data, $cve_actor);
                redirect('actores/lista');
            }

            $data = array(
                'actores' => $actores
            );
            
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $area = $this->session->userdata('area');
            $data['usuario_area'] = $area;
            $data['error_adj_actores'] = $this->session->flashdata('error_adj_actores');
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_rol'] = $cve_rol;
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $data['municipios'] = $this->municipios_model->get_municipios();
            $data['entidades'] = $this->entidades_model->get_entidades();
            $data['tipo_actores'] = $this->tipo_actores_model->get_tipo_actores();
            $data['ambitos'] = $this->ambitos_model->get_ambitos();
            if (isset($data['actores']['cve_ambito'])) {
                $cve_ambito = $data['actores']['cve_ambito'];
                $data['sectores'] = $this->sectores_model->get_sectores_ambito($cve_ambito);
            } 
            $data['perfiles'] = $this->perfiles_model->get_perfiles();

            if (isset($data['actores']['cve_actor']))
            {
                $data['consejos_actores'] = $this->consejos_actores_model->get_consejos_actor($data['actores']['cve_actor']);
                $this->load->view('templates/header', $data);
                $this->load->view('actores/detalle', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/header', $data);
                $this->load->view('actores/nuevo', $data);
                $this->load->view('templates/footer');
            }
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

}

