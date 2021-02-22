<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_history extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->library('template');
	    $this->load->model('m_penjualan');
	    $this->load->model('m_jual');
	}

	public function index(){
		// Mendapatkan Informasi Pembeli.
		$dataPenjualan = $this->m_penjualan->ambil_data_atas()->result();
		$dataPenjualan = json_decode(json_encode($dataPenjualan), true);
		$dataPenjualan = $dataPenjualan[0];

		// Mendapatkan Informasi Barang.
		$dataBarang = $this->m_jual->find($dataPenjualan["id_penjualan"]);
		$dataBarang = json_decode(json_encode($dataBarang), true);
		$data["transaksi"] 	= array(
			'dataPembeli' => $dataPenjualan,
			'dataBarang' => $dataBarang
		);
    	$this->template->utama('v_history', $data);
  	}

  	public function riwayat_pembelian($id){
		// Mendapatkan Informasi Pembeli.
		$dataPenjualan = $this->m_penjualan->cari_penjualan($id)->result();
		$dataPenjualan = json_decode(json_encode($dataPenjualan), true);
		$dataPenjualan = $dataPenjualan[0];

		// Mendapatkan Informasi Barang.
		$dataBarang = $this->m_jual->find($id);
		$dataBarang = json_decode(json_encode($dataBarang), true);
		$data["transaksi"] 	= array(
			'dataPembeli' => $dataPenjualan,
			'dataBarang' => $dataBarang
		);
    	$this->template->utama('v_history', $data);
  	}
}
