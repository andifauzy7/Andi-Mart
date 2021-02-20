<?php 
 
class m_penjualan extends CI_Model{
	function ambil_data(){
		return $this->db->get('penjualan');
	}

	function ambil_data_atas(){
		return $this->db->query("SELECT * FROM penjualan ORDER BY id_penjualan DESC");
	}

	function get_currentid(){
		$currentid = $this->db->query("
			SELECT `AUTO_INCREMENT`
			FROM  INFORMATION_SCHEMA.TABLES
			WHERE TABLE_SCHEMA = 'andimart'
			AND   TABLE_NAME   = 'penjualan';
			")->result();
		$currentid = json_decode(json_encode($currentid), true);
		return $currentid[0]["AUTO_INCREMENT"];
	}

	function tambah_data($id, $data, $ongkir){
		$berat = $data["totalBerat"];
		$nama = $data["nama"];
		$noHp = $data["nomor"];
		$alamat = $data["alamat"];
		$kecamatan = $data["kecamatan"];
		$kota = $data["kota"];
		$totalBarang = $data["total"];

		$beratAsli = (float)$berat * 1000;
		if($beratAsli%1000 > 300){
			$beratSetelahPembulatan = ceil($beratAsli/1000);
		} else {
			$beratSetelahPembulatan = floor($beratAsli/1000);
		}
		$ongkir = $ongkir*$beratSetelahPembulatan;
		$total = $ongkir + $totalBarang;
		
		$this->db->query("
			INSERT INTO penjualan VALUES (
			'$id', CURRENT_TIMESTAMP, '$nama', '$noHp', 
			'$alamat', '$kecamatan', '$kota', '$berat', 
			'$totalBarang', '$ongkir', '$total'
			)
			");
	}

	function cari_penjualan($id){
		return $this->db->query("SELECT * FROM penjualan WHERE id_penjualan='$id'");
	}
}