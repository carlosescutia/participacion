<?php
class Archivos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

    }

    public function enviar()
    {
        if ($this->session->userdata('logueado')) {
            $config = array();
            $config['upload_path'] = 'oficios';
            $config['allowed_types'] = 'pdf';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $this->session->userdata('clave') . '.pdf';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('subir_archivo') ) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                $this->session->set_flashdata('error', $error['error']);
            }
            $this->load->view('inicio/iniciar_sesion', $data);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function nota_metodologica()
    {
        $cve_indicador = $this->input->post('cve_indicador');
        if ($this->session->userdata('logueado')) {
            $config = array();
            $config['upload_path'] = 'metadatos_propios';
            $config['allowed_types'] = 'jpg';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $cve_indicador . '.jpg';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('subir_nota') ) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                $this->session->set_flashdata('error', $error['error']);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

}


