<?php include '../koneksi.php' ?>

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card-header bg-secondary text-center">
				<h4 class="text-white">Tambah Data Pegawai</h4>
			</div>
			<div class="card-body bg-secondary">
				<form method="POST" enctype="multipart/form-data">
					<div>
						<label class="text-white">Nama</label>
						<input type="text" name="nama" class="form-control" required>
					</div>
					<div>
						<label class="text-white">Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div>
						<label class="text-white">Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div>
						<label class="text-white">Telepon</label>
						<input type="text" name="telepon" class="form-control" required>
					</div>
					<div class="col-md-4">
						<label class="text-white text-center">Akses</label>
						<select class="form-control text-center" name="akses" required>
							<option>--PILIH--</option>
							<option> Admin </option>
							<option> Kasir </option>
						</select>
					</div>
					<div>
						<label class="text-white">Password</label>
						<input type="password" name="pass1" class="form-control" required>
					</div>
					<div>
						<label class="text-white">Confirm Password</label>
						<input type="password" name="pass2" class="form-control" required>
					</div>
				    <div class="mb-2">
						<label class="text-white">Foto Product</label>
						<input type="file" name="foto" class="form-control" required>
					</div>
					<div>
						<label class="text-white">Alamat</label><br>
						<textarea class="form-control mb-4" rows="3" name="alamat" value="" required></textarea>
					</div>
						<input type="submit" name="tambah" class="btn btn-dark" value="Simpan"> 				
						<a href="index.php?page=data_pegawai" class="btn btn-info text-dark col-md-3 offset-1">Batal</a>
					</div>
				</form>
		</div>
	</div>
</div>

<?php 
if(isset($_POST['tambah'])) {
	
	 $nama 		 = $_POST['nama'];
	 $username	 = $_POST['username'];
	 $email 	 = $_POST['email'];
	 $telepon 	 = $_POST['telepon'];
	 $akses		 = $_POST['akses'];
	 $pass1		 = md5($_POST['pass1']); 
	 $pass2 	 = md5($_POST['pass2']);
	 $alamat  	 = $_POST['alamat'];
	 $namafoto   = $_FILES['foto']['name'];
	 $lokasifoto = $_FILES['foto']['tmp_name'];

	if($pass1 != $pass2) {
		echo "<script>alert('Password Tidak Sama')</script>";
	}else{	
		
		move_uploaded_file($lokasifoto, "../assets/image/user/".$namafoto);
		$tambah = mysqli_query($koneksi, "INSERT INTO tb_kasir (nama,alamat,telepon,email,username,foto,password,akses) VALUES ('$nama','$alamat','$telepon','$email','$username','$namafoto','$pass1','$akses') ");


 echo "<script>alert('Uopdate Selesai')</script>";
 echo "<script>location='index.php?page=data_pegawai'</script>";			
	}
 }
 ?>
