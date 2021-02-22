<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_jual extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->library('template');
      $this->load->model('m_penjualan');
	    $this->load->model('m_jual');
      $this->load->model('m_barang');
	}

	public function index(){
		$data["jual"] = $this->m_penjualan->ambil_data()->result();
		$this->template->utama('v_riwayat_pembelian', $data);
	}

  	public function add_data(){
  		$currentid = $this->m_penjualan->get_currentid()-1;
  		foreach ($this->cart->contents() as $item){
  			$data 	= array(
			'id_penjualan' => $currentid,
			'kode_barang' => $item["id"],
			'jml_jual' => $item["qty"],
			'harga_jual' => $item["price"]*$item["qty"],
			'berat_barang' => $item["size"]/1000
			);
			$this->m_barang->updateqty($data["kode_barang"], $data["jml_jual"]);
			$this->m_jual->tambah_data($data);
  		}
  		$this->cart->destroy();
  		redirect('c_history'); 
  	}
}
