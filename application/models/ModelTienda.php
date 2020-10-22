<?php

class ModelTienda extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
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

    /**
     * Obtiene de la base de datos todas las tiendas que tengas estado 1 es to indica que no estan borradas.
     */
    function obtenerTiendas(){
        $query = $this->db->get_where("tienda", array('Estado_Tienda' => '1'));
        return $query->result();
    }

    /**
     * recible por parametro el id de la tienda de la cual quiere obtener información
     */
    function obtenerTiendaPorId($idTienda){
        $query = $this->db->get_where("tienda", array('ID' => $idTienda));
        return $query->result();
    }

    /**
     * Recibe por parametro los nuevos valores de los campos de la columnas de la tienda a editar
     */
    public function modificarTienda($param){
		$campos = array(
			'Nombre' => $param['Nombre'],
			'Fecha_de_apertura' => $param['Fecha_de_apertura'],
		);
		$this->db->where('ID', $param['ID']);
		$this->db->update('tienda',$campos);
		
		return 1;
    }

    /**
     * Recibe por parametro el id de la tienda que se quiere borrar, lo que se hace es actualizar el estado del objeto
     * a 0 esto para representar logicamente qeu se ha borrado la tienda.
     */

    public function borrarTienda($ID){
        $campos = array(
			'Estado_Tienda' => 0,
		);
		$this->db->where('ID', $ID);
		$this->db->update('tienda',$campos);
		return 1;
    }

    
    
}