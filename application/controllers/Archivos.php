<?php
class Archivos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('archivos_model');
    }

    public function sesiones_presentacion()
    {
        if ($this->session->userdata('logueado')) {
            $cve_consejo = $this->input->post('cve_consejo');
            $cve_sesion = $this->input->post('cve_sesion');
            
            $config = array();
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_sesiones';
            $config['file_name'] = $cve_consejo . '_' . $cve_sesion . '_presentacion.pdf';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-presentacion') ) {
                $error_adj_sesiones = array('error_adj_sesiones' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_sesiones', $error_adj_sesiones['error_adj_sesiones']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function sesiones_minuta()
    {
        if ($this->session->userdata('logueado')) {
            $cve_consejo = $this->input->post('cve_consejo');
            $cve_sesion = $this->input->post('cve_sesion');
            
            $config = array();
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_sesiones';
            $config['file_name'] = $cve_consejo . '_' . $cve_sesion . '_minuta.pdf';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-minuta') ) {
                $error_adj_sesiones = array('error_adj_sesiones' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_sesiones', $error_adj_sesiones['error_adj_sesiones']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function sesiones_asistencia()
    {
        if ($this->session->userdata('logueado')) {
            $cve_consejo = $this->input->post('cve_consejo');
            $cve_sesion = $this->input->post('cve_sesion');
            
            $config = array();
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_sesiones';
            $config['file_name'] = $cve_consejo . '_' . $cve_sesion . '_asistencia.pdf';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-asistencia') ) {
                $error_adj_sesiones = array('error_adj_sesiones' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_sesiones', $error_adj_sesiones['error_adj_sesiones']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function sesiones_extras()
    {
        if ($this->session->userdata('logueado')) {
            $cve_consejo = $this->input->post('cve_consejo');
            $cve_sesion = $this->input->post('cve_sesion');
            
            $config = array();
            $config['allowed_types'] = 'zip';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_sesiones';
            $config['file_name'] = $cve_consejo . '_' . $cve_sesion . '_extras.zip';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-extras') ) {
                $error_adj_sesiones = array('error_adj_sesiones' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_sesiones', $error_adj_sesiones['error_adj_sesiones']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function sesiones_audio()
    {
        if ($this->session->userdata('logueado')) {
            $cve_consejo = $this->input->post('cve_consejo');
            $cve_sesion = $this->input->post('cve_sesion');
            
            $config = array();
            $config['allowed_types'] = 'mp3';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_sesiones';
            $config['file_name'] = $cve_consejo . '_' . $cve_sesion . '_audio.mp3';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-audio') ) {
                $error_adj_sesiones = array('error_adj_sesiones' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_sesiones', $error_adj_sesiones['error_adj_sesiones']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function sesiones_video()
    {
        if ($this->session->userdata('logueado')) {
            $cve_consejo = $this->input->post('cve_consejo');
            $cve_sesion = $this->input->post('cve_sesion');
            
            $config = array();
            $config['allowed_types'] = 'mp4';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_sesiones';
            $config['file_name'] = $cve_consejo . '_' . $cve_sesion . '_video.mp4';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-video') ) {
                $error_adj_sesiones = array('error_adj_sesiones' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_sesiones', $error_adj_sesiones['error_adj_sesiones']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actores_adj1()
    {
        if ($this->session->userdata('logueado')) {
            $cve_actor = $this->input->post('cve_actor');
            $archivo_sistema = $cve_actor . '_adj1.pdf';

            $config = array();
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_actores';
            $config['file_name'] = $archivo_sistema;
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-act-adj1') ) {
                $error_adj_actores = array('error_adj_actores' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_actores', $error_adj_actores['error_adj_actores']);
            } else {
                $upload_data = $this->upload->data();
                $archivo_original = $upload_data['client_name'];
                $data = array(
                    'archivo_sistema' => $archivo_sistema, 
                    'archivo_original' => $archivo_original 
                );
                $this->archivos_model->save_file_metadata($data);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actores_adj2()
    {
        if ($this->session->userdata('logueado')) {
            $cve_actor = $this->input->post('cve_actor');
            $archivo_sistema = $cve_actor . '_adj2.pdf';

            $config = array();
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_actores';
            $config['file_name'] = $archivo_sistema;
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-act-adj2') ) {
                $error_adj_actores = array('error_adj_actores' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_actores', $error_adj_actores['error_adj_actores']);
            } else {
                $upload_data = $this->upload->data();
                $archivo_original = $upload_data['client_name'];
                $data = array(
                    'archivo_sistema' => $archivo_sistema, 
                    'archivo_original' => $archivo_original 
                );
                $this->archivos_model->save_file_metadata($data);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actores_extras()
    {
        if ($this->session->userdata('logueado')) {
            $cve_actor = $this->input->post('cve_actor');
            
            $config = array();
            $config['allowed_types'] = 'zip';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_actores';
            $config['file_name'] = $cve_actor . '_extras.zip';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-act-extras') ) {
                $error_adj_actores = array('error_adj_actores' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_actores', $error_adj_actores['error_adj_actores']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actores_foto()
    {
        if ($this->session->userdata('logueado')) {
            $cve_actor = $this->input->post('cve_actor');
            
            $config = array();
            $config['allowed_types'] = 'jpg';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_actores';
            $config['file_name'] = $cve_actor . '_foto.jpg';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-act-foto') ) {
                $error_adj_actores = array('error_adj_actores' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_actores', $error_adj_actores['error_adj_actores']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function consejos_juridico()
    {
        if ($this->session->userdata('logueado')) {
            $cve_consejo = $this->input->post('cve_consejo');
            
            $config = array();
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_consejos';
            $config['file_name'] = $cve_consejo . '_juridico.pdf';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-juridico') ) {
                $error_adj_consejos = array('error_adj_consejos' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_consejos', $error_adj_consejos['error_adj_consejos']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function consejos_normativa()
    {
        if ($this->session->userdata('logueado')) {
            $cve_consejo = $this->input->post('cve_consejo');
            
            $config = array();
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_consejos';
            $config['file_name'] = $cve_consejo . '_normativa.pdf';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-normativa') ) {
                $error_adj_consejos = array('error_adj_consejos' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_consejos', $error_adj_consejos['error_adj_consejos']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function consejos_extras()
    {
        if ($this->session->userdata('logueado')) {
            $cve_consejo = $this->input->post('cve_consejo');
            
            $config = array();
            $config['allowed_types'] = 'zip';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_consejos';
            $config['file_name'] = $cve_consejo . '_extras.zip';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-extras') ) {
                $error_adj_consejos = array('error_adj_consejos' => $this->upload->display_errors());
                $this->session->set_flashdata('error_adj_consejos', $error_adj_consejos['error_adj_consejos']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

}
