<?php 
 
class m_barang extends CI_Model{
	function ambil_data(){
		return $this->db->get('barang');
	}

	function filter($kata){
		return $this->db->query("SELECT * FROM barang WHERE namaBarang LIKE '%$kata%'");
	}

	function find($id){
		$result = $this->db->where('kodeBarang', $id)
		->limit(1)
		->get('barang');
		if($result->num_rows()>0){
			return $result->row();
		} else {
			return array();
		}
	}

	function updateqty($id, $qty){
		$data = $this->db->query("
			SELECT * FROM  barang
			WHERE kodeBarang = '$id';
			")->result();
		$data = json_decode(json_encode($data), true);
		$data = $data[0]["stokBarang"];
		$stokBaru = $data - $qty;
		$this->db->query("
			UPDATE barang SET stokBarang = '$stokBaru'
			WHERE kodeBarang = '$id';
			");
	}
}