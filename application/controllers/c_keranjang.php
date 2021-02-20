<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_keranjang extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->library('template');
	    $this->load->model('m_barang');
	    if( ! $this->session->userdata('logged_in')){
        	print_r('Anda harus Login terlebih dahulu'); 
        	redirect('c_user/login');
        }
	}

  	public function tambah_keranjang($id){
		$barang = $this->m_barang->find($id);
		$data 	= array(
			'id' => $barang->kodeBarang,
			'name' => $barang->namaBarang,
			'price' => $barang->hargaBarang,
			'photo' => $barang->namaFileFoto,
			'size' => $barang->beratBarang,
			'qty' => 1
		);
		$this->cart->insert($data);
		redirect('c_barang');
  	}

  	public function index(){
  		$data = null;
  		$this->template->utama('v_keranjang', $data);
  	}

  	public function hapus_keranjang(){
  		$this->cart->destroy();
  		redirect('c_barang');
  	}
}
