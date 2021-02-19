<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_barang extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->library('template');
	    $this->load->model('m_barang');
	}

	public function index(){
		$data["barang"] = $this->m_barang->ambil_data()->result();
    	$this->template->utama('v_barang', $data);
  	}

  	public function detail($id){
  		$data["barang"] = $this->m_barang->find($id);
    	$this->template->utama('v_detail_barang', $data);
  	}

  	public function filter(){
		$data["barang"] = $this->m_barang->filter($_POST["nama"])->result();
    	$this->template->utama('v_barang', $data);
  	}
}
