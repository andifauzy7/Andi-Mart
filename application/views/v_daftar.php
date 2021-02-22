
<!DOCTYPE HTML>
<html>  
<head>
  <title>ANDIMART - Halaman Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.container {
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.child {
		position: absolute;
		top: 20%;
		width: 50%;
	}
  </style>
</head>
<body>
<div class="container">
	<div class="child">
		<div class="card h-100 border-primary" style="border-top: 10px solid #000080;background-color:#FFFAF0;">
            <div class="card-body">
                <h3 class="card-title" style="text-align: center;">ANDI<b>MART</b></h3>
                <h4 class="card-title" style="text-align: center;">Halaman Register</h4>
                <form action="<?php echo base_url()?>c_user/pendaftaran" method="post">
					<div class="form-group">
					  <label for="nama">Nama:</label>
					  <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" id="nama_lengkap">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="text" name="email" placeholder="Masukkan Email" class="form-control" id="email">
					</div>
					<div class="form-group">
					  <label for="pwd">Password:</label>
					  <input type="password" name="password" placeholder="Password" class="form-control" id="password">
					</div>
					<div class="form-group">
					  <label for="pwdconfirm">Confirm Password:</label>
					  <input type="password" name="password_confirm" placeholder="Konfirmasi Password" class="form-control" id="password_confirm">
					</div>
					<center>
						<input type="submit" class="btn btn-primary" value="Daftar">
					</center>
					<p align="right"><br>Sudah punya akun? 
						<a href="<?=base_url('c_user/register');?>">Login</a></br></p>
                </form>

            </div>
        </div>
        <br><br><br><br>
	</div>
</div>

</body>
</html>
