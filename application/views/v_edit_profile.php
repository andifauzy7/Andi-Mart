<div class="container">
	<div class="child">
		<div class="card h-100 border-primary" style="border-top: 10px solid #000080;background-color:#FFFAF0;">
            <div class="card-body">
                <h3 class="card-title" style="text-align: center;">ANDI<b>MART</b></h3>
                <h4 class="card-title" style="text-align: center;">Edit Profile</h4>
                <form action="<?php echo base_url()?>c_user/edit_profile/<?php echo $user['id_user']?>" method="post">
					<div class="form-group">
					  <label for="nama">Nama:</label>
					  <input type="text" name="nama_lengkap" value="<?php echo $user['nama_user']?>" class="form-control" id="nama_lengkap">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="text" name="email" value="<?php echo $user['email_user']?>" class="form-control" id="email" disabled>
					</div>
					<div class="form-group">
					  <label for="no_hp">Nomor Handphone:</label>
					  <input type="number" name="no_hp" value="<?php echo $user['no_hp_user']?>" class="form-control" id="no_hp">
					</div>
					<div class="form-group">
					  <label for="Alamat">Alamat:</label>
					  <textarea name="alamat" class="form-control" id="alamat" row="4"><?php echo $user['alamat_user']?></textarea>
					</div>
					<div class="form-group">
					  <label for="kota">Kota:</label>
					  <input type="text" name="kota" value="<?php echo $user['kota_user']?>" class="form-control" id="kota">
					</div>
					<center>
						<input type="submit" class="btn btn-primary" value="Update">
					</center>
                </form>

            </div>
        </div>
        <br><br><br><br>
	</div>
</div>
