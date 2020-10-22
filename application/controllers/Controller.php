<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	function __construct() {
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->model("ModelTienda","mti");
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
}
