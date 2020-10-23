<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	function __construct() {
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->model("ModelTienda","modelTienda");
		$this->load->model("ModelProducto","mpr");
		
			
	}
	public function index()
	{
		header('Location: '.base_url().'index.php/Controller/moduloCrearTienda');
	}

	public function moduloCrearTienda(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Tienda/CrearTienda');
		$this->load->view('layout/footer');
	}

	public function crearTienda(){
		$data = array(
			"Nombre "=>$this->input->post("Nombre"),
			"Fecha_de_apertura"=>$this->input->post("Fecha_de_apertura"),
			"Estado_Tienda"=> '1'			
			);
		if($this->modelTienda->crearTienda($data)){
		    echo(TRUE);
		}else{
		    echo(FALSE);
		}
	}

	public function obtenerTiendas(){
		echo json_encode($this->modelTienda->obtenerTiendas());
	}

	public function obtenerTiendaPorId(){
		echo json_encode($this->modelTienda->obtenerTiendaPorId($this->input->post('ID')));
	}

	public function modificarTienda(){
	    $param['ID'] = $this->input->post('ID');
	    $param['Nombre'] = $this->input->post('Nombre');
		$param['Fecha_de_apertura'] = $this->input->post('Fecha_de_apertura');		
		
		echo $this->modelTienda->modificarTienda($param);
	}

	public function borrarTienda(){
		echo $this->modelTienda->borrarTienda($this->input->post('ID'));
	}

	public function moduloCrearProducto(){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('Producto/CrearProducto');
		$this->load->view('layout/footer');
	}

	public function crearProducto(){
		if ($this->mpr->productoExiste($this->input->post("SKU"))==0) {
			$config['upload_path']= './img/ProductosImg/';
			$config['allowed_types']= 'gif|jpg|png';
			$config['encrypt_name'] = FALSE;

			$this->load->library('upload',$config);

			if ($this->upload->do_upload("imagen")) {
				$file_info = $this->upload->data();
				$data = array(
					"Nombre"=>$this->input->post("Nombre"),
					"SKU"=>$this->input->post("SKU"),
					"Descripcion"=>$this->input->post("Descripcion"),
					"Valor"=>$this->input->post("Valor"),
					"Id_Tienda"=>$this->input->post("Id_Tienda"),
					"imagen "=>$file_info['file_name'],
					"Estado_Producto"=> '1'			
				);
				echo $this->mpr->crearProducto($data);
			}else{
				echo "mal";
			}
		}else{
			echo "existe";
		}
		
	}

	public function obtenerProductos(){
		echo json_encode($this->mpr->obtenerProductos());
	}

	public function obtenerProductoPorSKU(){
		echo json_encode($this->mpr->obtenerProductoPorSKU($this->input->post('ID')));
	}

	public function modificarProducto(){
		if ($this->mpr->productoExiste($this->input->post("SKU_e"))==0 || $this->input->post("SKU_e") ==$this->input->post("SKU_OLD")) {
			$config['upload_path']= './img/ProductosImg/';
			$config['allowed_types']= 'gif|jpg|png';
			$config['encrypt_name'] = FALSE;
			$this->load->library('upload',$config);

			if ($this->upload->do_upload("imagen_e")) {
				$file_info = $this->upload->data();
				$param['SKU_OLD'] = $this->input->post("SKU_OLD");
				$param['Nombre'] = $this->input->post("Nombre_e");
				$param['SKU'] = $this->input->post("SKU_e");
				$param['Descripcion'] = $this->input->post("Descripcion_e");
				$param['Valor'] = $this->input->post("Valor_e");
				$param['Id_Tienda'] = $this->input->post("Id_Tienda_e");		
				$param['imagen'] = $file_info['file_name'];

				echo $this->mpr->modificarProducto($param);
			}else{
				echo("Error en cargar la imagen");
			}
			
		}else{
			echo "existe";
		}
	}

	public function borrarProducto(){
		echo $this->mpr->borrarProducto($this->input->post('ID'));
	}

	public function obtenerProductosPorTienda(){
		echo json_encode($this->mpr->obtenerProductoPorTienda($this->input->post('ID_TIENDA')));
	}
}
