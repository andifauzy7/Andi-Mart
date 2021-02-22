
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
                <h4 class="card-title" style="text-align: center;">Halaman Login</h4>
                <form action="<?php echo base_url()?>c_user/login_user" method="post">
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Masukkan Email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" id="pwd">
                  </div>
                  <center>
                    <input type="submit" class="btn btn-primary" value="Login">
                  </center>
                  <p align="right"><br>Belum punya akun? 
                    <a href="<?=base_url('c_user/register');?>">Register</a></br></p>
                </form>
            </div>
        </div>
  </div>
</div>
</body>
</html>
