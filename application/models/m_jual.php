<?php 
 
class m_jual extends CI_Model{
	function ambil_data(){
		return $this->db->get('jual');
	}

	function find($id){
		return $this->db->query("SELECT * FROM jual INNER JOIN barang ON jual.kodeBarang = barang.kodeBarang WHERE jual.id_penjualan = '$id'")->result();
	}

	function tambah_data($data){
		$id_penjualan = $data["id_penjualan"];
		$kode_barang = $data["kode_barang"];
		$jml_jual = $data["jml_jual"];
		$harga_jual = $data["harga_jual"];
		$berat_barang = $data["berat_barang"];
		$this->db->query("
			INSERT INTO jual VALUES (
			'', '$id_penjualan', '$kode_barang', 
			'$jml_jual', '$berat_barang', '$harga_jual')
			");
	}
}