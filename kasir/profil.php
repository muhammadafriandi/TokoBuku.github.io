<?php  include '../koneksi.php'; ?>
<?php

	$id_user = $_SESSION['stat_login']['id_kasir'];
	$ambil = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE id_kasir='$id_user' ");
	$user = mysqli_fetch_assoc($ambil);


?>

<div class="card" style="background-color:  #BC8F8F;">
	<div class="card-body">
		<h3 class="text-arial offset-1">MY PROFIL</h3>                 
	</div>	
	<div class="row" style="background-color:  #BC8F8F;">
		<div class="col-md-5">
			<div class="panel panel-info">
				<div class="panel-body">
					<table class="table mb-4" cellpadding="8" cellspacing="8">
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
				<a class="btn btn-dark col-md-2" href="index.php?page=edit_profil">Edit</a>
				<a class="btn btn-dark col-md-4 offset-3" href="index.php?page=ganti_password">Ganti Password</a>
			</div>
		<div class="col-md-5 offset-2 border-0 mb-4 shadow">
			<div class="panel panel-info">	
				<form method="POST">
					<img src="../assets/image/user/<?php echo $user ['foto'] ?>" width="300px" class="img-fluid">
				</form>
			</div>
		</div>
	</div>
</div>
