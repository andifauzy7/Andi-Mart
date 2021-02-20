<!DOCTYPE html>
<html lang="en">
<head>
  <title>ANDIMART - Original Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>

  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0;">
  <h1>ANDI<b>MART</b></h1>
  <p>Dapatkan barang original, murah dan menarik!</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">ANDI<b>MART</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url();?>">Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Kontak</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('c_keranjang');?>">Lihat Keranjang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <?php 
            $keranjang = 'Keranjang Belanja : ' . $this->cart->total_items(). ' Barang'
          ?>
          <?=$keranjang;?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('c_jual');?>">Tabel Penjualan</a>
      </li>
    </ul>
  </div>
  <div class="dropdown">
    <div class="btn-group dropleft">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php
      if($this->session->userdata('logged_in')==FALSE){
        echo 'Login / Register';
      } else {
        $check = $this->session->get_userdata();
        echo $check['name'];

      }?>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <?php
      if($this->session->userdata('logged_in')==FALSE){
      ?>
      <a class="dropdown-item" href="<?php echo base_url()?>c_user/register">Register</a>
      <a class="dropdown-item" href="<?php echo base_url()?>c_user/login">Login</a>
      <?php } else {?>
      <a class="dropdown-item" href="<?php echo base_url()?>c_user/edit_profile">Edit Profile</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?php echo base_url()?>c_user/logout">Logout</a>
    <?php }?>
    </div>
  </div>
  </div> 
</nav>

<div class="container" style="margin-top:30px; min-height: 500px;">
  <div class="row">
  	<div class="col-sm-10">
      <?php 
          echo $contentnya; 
      ?>
    </div>
    <div class="col-sm-2">
        <form class="form-inline my-2 my-lg-0" method="post" action="<?=base_url();?>c_barang/filter">
            <input class="form-control mr-sm-2" type="search" placeholder="Cari Berita ... " aria-label="Search" name="nama" required>
            <br>
            <br>
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Cari</button>
        </form>
      <h3>Rujukan</h3>
      <p>Kunjungi menu.</p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url();?>">Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Keranjang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Kontak</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
  </div>
</div>

<div class="jumbotron text-center" id="contact" style="margin-bottom:0">
  <div class="container">
    <div class="row">
      <div class="col">
        <p class="text-left" style="font-size: 36px; margin: 0;">ANDI<b>MART</b></p>
        <p class="text-left" style="margin: 0;">Email : andi.fauzy.tif18@polban.ac.id</p>
        <p class="text-left">Handphone : +6285322677320</p>
      </div>
  </div>
</div>

</body>
</html>