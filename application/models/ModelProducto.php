<?php

class ModelProducto extends CI_Model {
    function __construct() {
        parent::__construct();
    }

     /**Este método guarda los datos de un producto en la tabla producto en la base de datos */
    function crearProducto($data){
        $this->db->insert('producto',$data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    
    
}