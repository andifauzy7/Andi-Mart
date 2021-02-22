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
<div class="container">
	<div class="row">
		<div class="col-sm-12"> <!--panel-->
			<h2 class="text-center">Riwayat Pembelian</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title text-center">
						Daftar Transaksi yang pernah anda lakukan!</h4>
					<br>
				</div>
				<div class="panel-body">
					<!-- /.tabel responsive -->
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Tanggal Penjualan</th>
								<th>Nama Pemesan</th>
								<th>No HP</th>
								<th>Alamat</th>
								<th>Berat Total</th>
								<th>Total Penjualan</th>
								<th>Ongkir</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($jual as $transaksi):
								?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$transaksi->tgl_penjualan;?></td>
										<td><?=$transaksi->nama_pemesan;?></td>
										<td><?=$transaksi->nohp_pemesan;?></td>
										<td><?=$transaksi->alamat_pemesan . ', ' . $transaksi->kec_pemesan . ', ' . $transaksi->kota_pemesan;?></td>
										<td><?=$transaksi->berat_total . ' KG';?></td>
										<td><?=rupiah($transaksi->total_penjualan);?></td>
										<td><?=rupiah($transaksi->ongkir_penjualan);?></td>
										<td>
											<a href="c_history/riwayat_pembelian/<?=$transaksi->id_penjualan;?>" title="Edit data"><button class="btn btn-primary btn-sm"> Lihat Detail </button> </a>
											<a href="c_history/riwayat_pembelian/<?=$transaksi->id_penjualan;?>" title="Edit data"><button class="btn btn-warning btn-sm"> Review</button> </a>
										</td>
									</tr>
								<?php 
								$i++;
								endforeach;
								?>
							</tbody>
						</table>
					</div>
					<!-- /.tabel responsive -->
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
