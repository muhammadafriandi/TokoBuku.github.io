<?php  include '../koneksi.php'; ?>
<?php

	$id_user = $_SESSION['stat_login']['id_kasir'];
	$ambil = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE id_kasir='$id_user' ");
	$user = mysqli_fetch_assoc($ambil);


?>
<div class="card border-0 bg-info">
	<div class="card-body">
		<h3 class="text-arial offset-4">MY PROFIL</h3>
	</div>	
	<div class="row ">
		<div class="col-md-5">
			<div class="panel panel-info">
				<div class="panel-heading ">
					<h3 class="text-center">Informasi Diri</h3>
				</div>
				<div class="panel-body">
					<table class="table bg-info" cellpadding="8" cellspacing="8">
						<tr>
							<th>Nama</th><td>:</td><th><?php echo $user['nama'] ?></th>
						</tr>
						<tr>
							<th>Username</th><td>:</td><th><?php echo $user['username'] ?></th>
						</tr>
						<tr>
							<th>Email</th><td>:</td><th><?php echo $user['email'] ?></th>
						</tr>
						<tr>
							<th>Telepon</th><td>:</td><th><?php echo $user['telepon'] ?></th>
						</tr>
						<tr>
							<th>Alamat</th><td>:</td><th><?php echo $user['alamat'] ?></th>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-5 offset-1">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="text-center">Edit Profil</h3>
				</div>
			<form method="POST">
			<div class="card-body bg-info mb-3">
				<div>
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $user['nama'] ?>">
				</div>
				<div>
					<label>Usename</label>
					<input type="text" name="username" class="form-control" value="<?php echo $user['username'] ?>">
				</div>
				<div>
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo $user['email'] ?>">
				</div>
				<div>
					<label>Telepon</label>
					<input type="text" name="telepon" class="form-control" value="<?php echo $user['telepon'] ?>">
				</div>
				<div>
					<label>Alamat</label><br>
					<textarea class="form-control" rows="3" name="alamat" value=""><?php echo $user['alamat'] ?></textarea>
				</div>
			</div>
			<input type="submit" name="simpan" class="btn btn-dark" value="Simpan"> 
		</form>
	</div>
</div>

<?php 
	if (isset($_POST['simpan'])){
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$telepon = $_POST['telepon'];
		$alamat = $_POST['alamat'];
	
		$update = mysqli_query($koneksi, "UPDATE tb_kasir SET nama='$nama', username='$username', email='$email', telepon='$telepon', alamat='$alamat'  WHERE id_kasir='$id_user' ");
		
	echo "<script>alert('Akun Telah Di Edit !!')</script>";
	echo "<script>location='index.php?page=profil'</script>";
}	
 ?>