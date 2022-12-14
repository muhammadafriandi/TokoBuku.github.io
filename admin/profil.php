 <?php  include '../koneksi.php'; ?>
<?php

	$id_user = $_SESSION['stat_login']['id_kasir'];
	$ambil = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE id_kasir='$id_user' ");
	$user = mysqli_fetch_assoc($ambil);


?>

<div class="card border-0" style=" background-color:#CDD9DA">
	<div class="card-body">
		<h3 class="text-arial offset-4">MY PROFIL</h3>
	</div>	
	<div class="row ">
		<div class="col-md-5">
			<div class="panel ">
				<div class="panel-heading ">
					<h3 class="text-center">Informasi Diri</h3>
				</div>
				<div class="panel-body">
					<table class="table" cellpadding="8" cellspacing="8">
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
				<a href="index.php?page=edit_profil" class="btn btn-dark col-md-3 offset-1 mb-2">Edit</a>
				<a href="index.php?page=ganti_password" class="btn btn-dark col-md-4 offset-3 mb-2">Ganti Password</a>
			</div>
		</div>
		<div class="col-md-5 offset-2">
			<div class="panel panel-info">	
				<form method="POST">
					<img src="../assets/image/user/<?php echo $user ['foto'] ?>" width="400px">
				</form>
			</div>
		</div>
</div>
