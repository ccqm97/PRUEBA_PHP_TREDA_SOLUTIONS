<?php

class ModelTienda extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    /**Este método guarda los datos de una tienda en la tabla tienda en la base de datos */
    function crearTienda($data){
        $this->db->insert('tienda',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    
    
}