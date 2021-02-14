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
      <?php foreach ($barang as $item): ?>
        <div class="col-sm-4 py-2">
            <div class="card h-100 border-primary">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;"><?=$item->namaBarang;?></h4>
                    <img src="<?php echo base_url(); ?>fotoBarang/<?php echo $item->namaFileFoto; ?>" style="max-width: 100%;">
                    <h4 class="card-title" style="text-align: center;"><?=rupiah($item->hargaBarang);?></h4>
                    <div style="text-align: center;">
                      <h4 class="badge badge-info tex-wrap"><?=$item->beratBarang/1000 . " KG";?></h4>
                      <h4 class="badge badge-info tex-wrap"><?=$item->stokBarang . " Buah";?></h4>
                    </div>
                    <div style="text-align: center;">
                      <?php echo anchor('c_keranjang/tambah_keranjang/'.$item->kodeBarang, '<div class="btn btn-sm btn-primary">Tambah Keranjang</div>') ?>
                    </div>
                </div>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
</div>
</body>
</html>