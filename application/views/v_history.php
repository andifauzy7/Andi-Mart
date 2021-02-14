<?php  

	function rupiah($angka){
    	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    	return $hasil_rupiah;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Data</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <th scope="row">Nama Pemesan</th>
	      <td><?=$transaksi["dataPembeli"]["nama_pemesan"];?></td>
	    </tr>
	    <tr>
	      <th scope="row">Nama Handphone</th>
	      <td><?=$transaksi["dataPembeli"]["nohp_pemesan"];?></td>
	    </tr>
	    <tr>
	      <th scope="row">Alamat</th>
	      <td>
	      	<?=$transaksi["dataPembeli"]["alamat_pemesan"] . ", " . $transaksi["dataPembeli"]["kec_pemesan"] . ", " . $transaksi["dataPembeli"]["kota_pemesan"];?>
	      </td>
	    </tr>
	  </tbody>
	</table>
	<br>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Barang</th>
	      <th scope="col">Foto</th>
	      <th scope="col">Jumlah</th>
	      <th scope="col">Berat</th>
	      <th scope="col">Harga</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($transaksi["dataBarang"] as $barang) : ?>
	    <tr>
	      <th scope="row">1</th>
	      <td><?=$barang["namaBarang"];?></td>
	      <td><img src="
	      	<?php echo base_url(); ?>fotoBarang/<?php echo $barang["namaFileFoto"]; ?>" style="max-width: 25%;"
	      	></td>
	      <td><?=$barang["jml_jual"];?></td>
	      <td><?=$barang["berat_barang"] . " KG";?></td>
	      <td><?=rupiah($barang["harga_jual"]);?></td>
	    </tr>
		<?php endforeach;?>
	    <tr>
	      <td colspan="5">Total Berat</td>
	      <td align="right"><?=$transaksi["dataPembeli"]["berat_total"];?> KG</td>
	    </tr>
	    <?php  
	    	$berat = $transaksi["dataPembeli"]["berat_total"];
	    	$berat = $berat * 1000;
	    	if($berat%1000 > 300){
	    		$beratFilter = ceil($berat/1000);
	    	} else {
	    		$beratFilter = floor($berat/1000);
	    	}
	    ?>
	    <tr>
	      <td colspan="5">Total Berat (Setelah Pembulatan)</td>
	      <td align="right"><?=$beratFilter;?> KG</td>
	    </tr>
	    <tr>
	      <td colspan="5">Total Harga Barang</td>
	      <td align="right"><?=rupiah($transaksi["dataPembeli"]["total_penjualan"]);?></td>
	    </tr>
	    <tr>
	      <td colspan="5">Total Ongkir</td>
	      <td align="right"><?=rupiah($transaksi["dataPembeli"]["ongkir_penjualan"]);?></td>
	    </tr>
	    <tr>
	      <td colspan="5">Total</td>
	      <td align="right"><?=rupiah($transaksi["dataPembeli"]["total"]);?></td>
	    </tr>
	  </tbody>
	</table>
</body>
</html>