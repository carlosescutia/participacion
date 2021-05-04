<?php
class Bitacora_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function guardar($data)
    {
        $result = $this->db->insert('bitacora', $data);
        return $result;
    }

}
