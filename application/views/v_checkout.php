<?php  

function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}

$total=0;
$size=0;
foreach ($this->cart->contents() as $item){
    $total += $item["price"];
    $size += $item["size"];
}

$size = $size / 1000;

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <div class="container">
        <h4>Halaman Checkout</h4>
        <h5>Total (Tanpa Ongkir) : <?=rupiah($total);?></h5>
        <form method="post" action="<?=base_url('c_penjualan/add_address');?>">
          <div class="form-group">
            <label for="nama">Nama Pemesan</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Ex : Andi Fauzy" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="nomor">Nomor Handphone</label>
            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Ex : 085322677320" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Ex : Jl. Pesona Alam 2" required autocomplete="off">
          </div>
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <select class="custom-select" id="kecamatan" name="kecamatan">
              <?php  
              foreach ($dataOngkir as $kecamatan):
              ?>
                <option value="<?=$kecamatan->kec_akhir;?>"><?=$kecamatan->kec_akhir;?></option>
              <?php  
              endforeach;
              ?>
          </select>
          </div>
          <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota" placeholder="Ex : Bandung" required autocomplete="off">
          </div>
          <input type="hidden" id="total" name="total" value="<?=$total;?>">
          <input type="hidden" id="totalBerat" name="totalBerat" value="<?=$size;?>">
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="row">
          <?php foreach ($this->cart->contents() as $item): ?>
            <div class="col-sm-4 py-2">
                <div class="card h-100 border-primary">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center;"><?=$item["name"]?></h4>
                        <img src="<?php echo base_url(); ?>fotoBarang/<?php echo $item['photo']; ?>" style="max-width: 100%;">
                        <h4 class="card-title" style="text-align: center;"><?=rupiah($item["price"]);?></h4>
                        <div style="text-align: center;">
                          <h4 class="badge badge-info tex-wrap"><?=$item["qty"] . " Buah";?></h4>
                          <h4 class="badge badge-info tex-wrap"><?=$item["size"]/1000 . " KG";?></h4>
                        </div>
                    </div>
                </div>
            </div>
          <?php endforeach; ?>
        </div>
    </div>
</body>
</html>