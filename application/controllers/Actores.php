<?php
class Actores extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuarios_model');
        $this->load->model('actores_model');
        $this->load->model('municipios_model');
        $this->load->model('entidades_model');
        $this->load->model('tipos_model');
        $this->load->model('ambitos_model');
        $this->load->model('sectores_model');

    }

    public function lista()
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $filtro = $this->input->post();
            if ($filtro) {
                $activo = $filtro['activo'];
                $cve_tipo = $filtro['cve_tipo'];
                $cve_sector = $filtro['cve_sector'];
            } else {
                $activo = '1';
                $cve_tipo = '1';
                $cve_sector = '0';
			}

            $data['activo'] = $activo;
            $data['cve_tipo'] = $cve_tipo;
            $data['cve_sector'] = $cve_sector;

            $data['actores'] = $this->actores_model->get_actores_dependencia($dependencia, $activo, $cve_tipo);

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
            $data['usuario_clave'] = $this->session->userdata('clave');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;
            $data['actores'] = $this->actores_model->get_actor_dependencia($dependencia, $cve_actor);
            $data['municipios'] = $this->municipios_model->get_municipios();
            $data['entidades'] = $this->entidades_model->get_entidades();
            $data['tipos'] = $this->tipos_model->get_tipos();
            $data['ambitos'] = $this->ambitos_model->get_ambitos();
            $data['sectores'] = $this->sectores_model->get_sectores();

            $this->load->view('templates/header', $data);
            $this->load->view('actores/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }

    public function nuevo()
    {
        if ($this->session->userdata('logueado')) {
            $data['error'] = $this->session->flashdata('error');
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $data['usuario_dependencia'] = $this->session->userdata('dependencia');

            $this->load->view('templates/header', $data);
            $this->load->view('actores/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/iniciar_sesion');
        }
    }


    public function guardar($cve_actor=null)
    {
        if ($this->session->userdata('logueado')) {
            $data['usuario_nombre'] = $this->session->userdata('nombre');
            $dependencia = $this->session->userdata('dependencia');
            $data['usuario_dependencia'] = $dependencia;

            $actores = $this->input->post();
            if ($actores) {
                $activo = isset($actores['activo']) ? 1 : 0 ;
                $nombre = $actores['nombre'];
                $apellido_pa = $actores['apellido_pa'];
                $apellido_ma = $actores['apellido_ma'];
                $fecha_nacimiento = empty($actores['fecha_nacimiento']) ? null : $actores['fecha_nacimiento'];
                $sexo = empty($actores['sexo']) ? null : $actores['sexo'];
                $calle = empty($actores['calle']) ? null : $actores['calle'];
                $num_exterior = empty($actores['num_exterior']) ? null : $actores['num_exterior'];
                $num_interior = empty($actores['num_interior']) ? null : $actores['num_interior'];
                $colonia = empty($actores['colonia']) ? null : $actores['colonia'];
                $codigo_postal = empty($actores['codigo_postal']) ? null : $actores['codigo_postal'];
                $ciudad = empty($actores['ciudad']) ? null : $actores['ciudad'];
                $cve_mun = empty($actores['cve_mun']) ? null : $actores['cve_mun'];
                $cve_ent = empty($actores['cve_ent']) ? null : $actores['cve_ent'];
                $cve_tipo = empty($actores['cve_tipo']) ? null : $actores['cve_tipo'];
                $ine = empty($actores['ine']) ? null : $actores['ine'];
                $expediente_archivistico = empty($actores['expediente_archivistico']) ? null : $actores['expediente_archivistico'];
                $cve_ambito = empty($actores['cve_ambito']) ? null : $actores['cve_ambito'];
                $cve_sector = empty($actores['cve_sector']) ? null : $actores['cve_sector'];
                $organizacion = empty($actores['organizacion']) ? null : $actores['organizacion'];
                $telefono_fijo = empty($actores['telefono_fijo']) ? null : $actores['telefono_fijo'];
                $telefono_celular = empty($actores['telefono_celular']) ? null : $actores['telefono_celular'];
                $correo_personal = empty($actores['correo_personal']) ? null : $actores['correo_personal'];
                $correo_laboral = empty($actores['correo_laboral']) ? null : $actores['correo_laboral'];
                $asistente = empty($actores['asistente']) ? null : $actores['asistente'];
                $correo_asistente = empty($actores['correo_asistente']) ? null : $actores['correo_asistente'];
                $telefono_asistente = empty($actores['telefono_asistente']) ? null : $actores['telefono_asistente'];
                $otros_espacios = empty($actores['otros_espacios']) ? null : $actores['otros_espacios'];
                $experiencia_exitosa = empty($actores['experiencia_exitosa']) ? null : $actores['experiencia_exitosa'];
                $fecha_experiencia_exitosa = empty($actores['fecha_experiencia_exitosa']) ? null : $actores['fecha_experiencia_exitosa'];
                $desea_colaborar = empty($actores['desea_colaborar']) ? null : $actores['desea_colaborar'];
                $profesion = empty($actores['profesion']) ? null : $actores['profesion'];
                $perfil = empty($actores['perfil']) ? null : $actores['perfil'];

                $cve_actor = $actores['cve_actor'];

                $this->actores_model->guardar($activo, $dependencia, $nombre, $apellido_pa, $apellido_ma, $fecha_nacimiento, $sexo, $calle, $num_exterior, $num_interior, $colonia, $codigo_postal, $ciudad, $cve_mun, $cve_ent, $cve_tipo, $ine, $expediente_archivistico, $cve_ambito, $cve_sector, $organizacion, $telefono_fijo, $telefono_celular, $correo_personal, $correo_laboral, $asistente, $correo_asistente, $telefono_asistente, $otros_espacios, $experiencia_exitosa, $fecha_experiencia_exitosa, $desea_colaborar, $profesion, $perfil, $cve_actor);
            }
            redirect('actores/lista');
        }
    }

}

