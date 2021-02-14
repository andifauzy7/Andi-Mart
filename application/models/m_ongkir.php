<?php 
 
class m_ongkir extends CI_Model{
	function ambil_data(){
		return $this->db->get('biayaongkir')->result();
	}

	function get_ongkir($kecamatan){
		$data = $this->db->query("SELECT * FROM biayaongkir WHERE kec_awal = 'Rancasari' AND kec_akhir = '$kecamatan'")->result();
		$data = json_decode(json_encode($data), true);
		return $data[0]["biaya_ongkir"];
	}
}