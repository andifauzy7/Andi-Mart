<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->library('template');
	    $this->load->model('M_barang');
	}

	public function index(){
		$data["barang"] = $this->M_barang->ambil_data()->result();
    	$this->template->utama('V_barang', $data);
  	}

  	public function detail($id){
  		$data["barang"] = $this->M_barang->find($id);
    	$this->template->utama('V_detail_barang', $data);
  	}

  	public function filter(){
		$data["barang"] = $this->M_barang->filter($_POST["nama"])->result();
    	$this->template->utama('V_barang', $data);
  	}
}
