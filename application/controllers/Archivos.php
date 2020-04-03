<?php
class Archivos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

    }

    public function presentacion()
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
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function minuta()
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
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function asistencia()
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
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function extras()
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
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actores_adj1()
    {
        if ($this->session->userdata('logueado')) {
            $cve_actor = $this->input->post('cve_actor');
            
            $config = array();
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_actores';
            $config['file_name'] = $cve_actor . '_adj1.pdf';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-act-adj1') ) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actores_adj2()
    {
        if ($this->session->userdata('logueado')) {
            $cve_actor = $this->input->post('cve_actor');
            
            $config = array();
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['upload_path'] = 'adj_actores';
            $config['file_name'] = $cve_actor . '_adj2.pdf';
            $this->load->library('upload',$config);
            if ( ! $this->upload->do_upload('arch-act-adj2') ) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
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
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
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
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $error['error']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


}
