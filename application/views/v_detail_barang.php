<?php  

function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.checked {
		  color: orange;
		}
	</style>
	<title></title>
</head>
<body>
<div class="container">
    <h4>Produk : <?=$barang->namaBarang;?></h4>
    <div class="row">
    	<div class="col-4 py-2">
    		<div class="card h-100 border-primary">
                <div class="card-body">
                    <a href="<?=base_url();?>c_barang/detail/<?=$barang->kodeBarang;?>">
                      <img src="<?php echo base_url(); ?>fotoBarang/<?php echo $barang->namaFileFoto; ?>" style="max-width: 100%;">
                    </a>
                    <div style="text-align: center;">
                      <?php echo anchor('c_keranjang/tambah_keranjang/'.$barang->kodeBarang, '<div class="btn btn-sm btn-primary">Tambah Keranjang</div>') ?>
                    </div>
                </div>
        	</div>
    	</div>
    	<div class="col-8 py-2">
    		<div class="card h-100 border-primary">
                <div class="card-body">
                	<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <h4 class="card-title"><?=rupiah($barang->hargaBarang);?></h4>
                    <div>
                      <h4 class="badge badge-info tex-wrap">BERAT : <?=$barang->beratBarang/1000 . " KG";?></h4>
                      <h4 class="badge badge-info tex-wrap">STOK : <?=$barang->stokBarang . " Buah";?></h4>
                    </div>
                </div>
        	</div>
    	</div>
    </div>
    <br>
    <h4>Review</h4>
	<div class="row">
		<div class="col-12 py-2">
			<div class="card h-100 border-primary">
				<div class="card-body">
					<div class="row">
						<div class="col-3">
							Mark Otto
						</div>
						<div class="col-9">
							<div class="row">
								<div class="col-12">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
								<div class="col-12 mt-3">
									Rekomendasi banget nih bro & Sis, yang punya lapak Fast Respon oke banget, unit hp nya Original 
									100%, Dannnnn Cepat Sampai nya.. jadi Yang Mau order jangan kelamaan mikir, buruannnnnnnnnn!!!
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-3">
							Jacob Thornton
						</div>
						<div class="col-9">
							<div class="row">
								<div class="col-12">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
								</div>
								<div class="col-12 mt-3">
									Rekomendasi banget nih bro & Sis, yang punya lapak Fast Respon oke banget, unit hp nya Original 
									100%, Dannnnn Cepat Sampai nya.. jadi Yang Mau order jangan kelamaan mikir, buruannnnnnnnnn!!!
								</div>
							</div>
						</div>
					</div>
					
					<div class="row mt-4">
						<div class="col-3">
							Larry The Bird
						</div>
						<div class="col-9">
							<div class="row">
								<div class="col-12">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
								<div class="col-12 mt-3">
									Rekomendasi banget nih bro & Sis, yang punya lapak Fast Respon oke banget, unit hp nya Original 
									100%, Dannnnn Cepat Sampai nya.. jadi Yang Mau order jangan kelamaan mikir, buruannnnnnnnnn!!!
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <br>
</div>
</body>
</html>