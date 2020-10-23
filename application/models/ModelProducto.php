<?php

class ModelProducto extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
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

    /**
     * Obtiene de la base de datos todos los productos que tengas estado 1 es to indica que no estan borrados.
     */
    function obtenerProductos(){       
        $query = $this->db->query("SELECT p.SKU, p.Nombre AS nombreProducto, p.Descripcion,p.Valor,
        p.Id_Tienda, p.imagen, t.Nombre FROM `producto` p
        INNER JOIN tienda t ON t.ID = p.Id_Tienda
        WHERE p.Estado_Producto = 1 AND
        t.Estado_Tienda = 1");
        return $query->result();
    }

    function obtenerProductoPorSKU($idProducto){
        $query = $this->db->query("SELECT p.SKU, p.Nombre AS nombreProducto, p.Descripcion,p.Valor,
        p.Id_Tienda, p.imagen, t.ID, t.Nombre FROM `producto` p
        INNER JOIN tienda t ON t.ID = p.Id_Tienda
        WHERE p.SKU LIKE('".$idProducto."')");
        return $query->result();
    }

    function productoExiste($SKU){
        $query = $this->db->get_where("producto", array('SKU' => $SKU));
        return $query->num_rows();
    }

    public function modificarProducto($param){
		$campos = array(
			'Nombre' => $param['Nombre'],
            'SKU' => $param['SKU'],
            'Descripcion' => $param['Descripcion'],
            'Valor' => $param['Valor'],
            'Id_Tienda' => $param['Id_Tienda'],
			'imagen' => $param['imagen'],
		);
		$this->db->where('SKU', $param['SKU_OLD']);
		$this->db->update('producto',$campos);
		
		return 1;
    }

    public function borrarProducto($ID){
        $campos = array(
			'Estado_Producto' => 0,
		);
		$this->db->where('SKU', $ID);
		$this->db->update('producto',$campos);
		return 1;
    }

    function obtenerProductoPorTienda($idTienda){
        $query = $this->db->query("SELECT p.SKU, p.Nombre AS nombreProducto, p.Descripcion,p.Valor,
        p.Id_Tienda, p.imagen, t.ID, t.Nombre FROM `producto` p
        INNER JOIN tienda t ON t.ID = p.Id_Tienda
        WHERE t.ID =".$idTienda."");
        return $query->result();
    }
    
    
}