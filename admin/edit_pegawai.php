<?php 
$data = $_GET['id'];

$ambil = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE id_kasir='$data' ");
$select = mysqli_fetch_assoc($ambil);

 ?>


<div class="card border-0 shadow">
	<div class="card-header bg-dark text-white">Edit Kategori</div>
	<div class="card-body">
		<form method="POST" enctype="multipart/form-data">
			<div class="mb-3">
				<label>Nama</label>
				<input type="text" name="nama" class="form-control" value="<?php echo $select['nama'] ?>">
			</div>
			<div class="mb-3">
				<label>Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $select['username'] ?>">
			</div>
			<div class="mb-3">
				<label>Email</label>
				<input type="text" name="email" class="form-control" value="<?php echo $select['email'] ?>">
			</div>
			<div class="mb-3">
				<label>Telepon</label>
				<input type="text" name="telepon" class="form-control" value="<?php echo $select['telepon'] ?>">
			</div>
			<div class="col-md-5 mb-3">
				<label class="text-white text-center">Akses</label>
					<select class="form-control text-center" name="akses" required>
						<option>--<?php echo $select['akses'] ?>--</option>
						<option> admin </option>
						<option> kasir </option>
					</select>
			</div>
			<div>
				<label class="text-white col-md-8">Alamat</label><br>
				<textarea class="form-control mb-4" rows="3" name="alamat" value="" required><?php echo $select['alamat'] ?></textarea>
			</div>			
			<button class="btn btn-dark" name="simpan">Simpan</button>
			<a href="index.php?page=data_pegawai" class="btn btn-dark text-white offset-1">Batal</a>
		</form>
	</div>
</div>

<?php 

if(isset($_POST['simpan'])){

	$id_user   = $_SESSION['stat_login']['id_kasir'];
	$nama 	   = $_POST['nama'];
	$username  = $_POST['username'];
	$email 	   = $_POST['email'];
	$telepon   = $_POST['telepon'];
	$alamat    = $_POST['alamat'];
	$akses     = $_POST['akses'];

	mysqli_query($koneksi, "UPDATE tb_kasir SET nama='$nama', username='$username', alamat='$alamat', telepon='$telepon', email='$email', akses='$akses' WHERE id_kasir='$data' ");

	echo "<script>alert('Data Sudah Disimpan')</script>";
	echo "<script>location='index.php?page=data_pegawai'</script>";
}

?>