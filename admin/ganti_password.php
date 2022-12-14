<?php 
include '../koneksi.php';
 	$id_user = $_SESSION['stat_login']['id_kasir'];
	$ambil = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE id_kasir='$id_user' ");
	$user = mysqli_fetch_assoc($ambil);

 ?>


<div class="container">
	<div class="row">
		<div class="card-body">
			<form method="POST bg-info">
			<div class="card-body bg-info mb-3">
				<div>
					<label>Password</label>
					<input type="password" name="pass_awal" class="form-control">
				</div>
				<div>
					<label>Password Baru</label>
					<input type="password" name="pass1" class="form-control">
				</div>
				<div>
					<label>Ulangi Password baru</label>
					<input type="password" name="pass2" class="form-control">
				</div>
			</div>
			<input type="submit" name="edit_password" class="btn btn-dark" value="Simpan"> 
			<a href="index.php?page=profil" class="btn btn-dark offset-1 col-md-1">Batal</a>
		</form>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['edit_password'])) {
	$pass1 = md5($_POST['pass1']); 
	$pass2 = md5($_POST['pass2']);
	$pass = $_POST['pass_awal'];
	if($pass1 != $pass2) {
		echo "<script>alert('Password Tidak Sama')</script>";
	}else{
		if(md5($pass)==$user['password']) {
			mysqli_query($koneksi, "UPDATE tb_kasir SET password='$pass1' WHERE id_kasir='$id_user' ");
		
		echo "<script>alert('Password Telah Di ganti Bro, Harap Login Lagi !!')</script>";
		echo "<script>location='../index.php'</script>";
 
		}
	}
}

 ?>