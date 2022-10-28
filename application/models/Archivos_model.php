<?php
class Archivos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function save_file_metadata($data)
    {
        $sql = "insert into metadatos_archivos values (?, ?) on conflict (archivo_sistema) do update set archivo_original = ? ";
        $parametros = array();
        array_push($parametros, $data['archivo_sistema']);
        array_push($parametros, $data['archivo_original']);
        array_push($parametros, $data['archivo_original']);
        $query = $this->db->query($sql, $parametros);
    }

    public function get_file_metadata($cve_actor, $nom_adjunto)
    {
        $archivo_sistema = $cve_actor . '_' . $nom_adjunto ;
        $sql = "select * from metadatos_archivos where archivo_sistema = ?" ;
        $query = $this->db->query($sql, $archivo_sistema);
        return $query->row_array();
    }

}
