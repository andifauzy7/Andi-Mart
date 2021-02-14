<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_penjualan extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->library('template');
	    $this->load->model('m_penjualan');
	    $this->load->model('m_jual');
	    $this->load->model('m_barang');
      $this->load->model('m_ongkir');
	}

  	public function index(){
      $data["dataOngkir"] = $this->m_ongkir->ambil_data();
  		$this->template->utama('v_checkout', $data);
  	}

  	public function add_address(){
      $ongkir = $this->m_ongkir->get_ongkir($_POST["kecamatan"]);
  		$currentid = $this->m_penjualan->get_currentid();
  		$this->m_penjualan->tambah_data($currentid, $_POST, $ongkir);
  		redirect('c_jual/add_data'); 
  	}
}
