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
		$this->moduloCrearTienda();
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
}
