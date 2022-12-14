<?php include '../koneksi.php';
	$id_user = $_SESSION['stat_login']['id_kasir'];
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card-header bg-secondary text-center">
				<h4 class="text-white">Tambah Buku</h4>
			</div>
			<div class="card-body bg-secondary">
				<form method="POST">
					<div class="row">
							<div>
								<label class="text-white">Nama</label>
								<input type="text" name="nama" class="form-control ucword" required>
							</div>
							<div>
								<label class="text-white">Telepon</label>
								<input type="text" name="telepon" class="form-control ucword" required>
							</div>
							<div class="mb-2">
								<label class="text-white">Alamat</label>
								<textarea class="form-control" rows="3" name="alamat"required></textarea>
							</div>
							<div>
								<input type="submit" name="tambah" class="btn btn-info" value="Simpan"> 				
								<a href="index.php?page=distributor" class="btn btn-info text-dark offset-1">Batal</a>
							</div>
					</div>
				</form>
		</div>
	</div>
</div>


<?php 
	if (isset($_POST['tambah'])) {
		$nama = $_POST['nama'];
		$telepon = $_POST['telepon'];
		$alamat = $_POST['alamat'];

		$tambah = mysqli_query($koneksi, "INSERT INTO tb_distributor (nama_distributor,telepon,alamat) VALUES ('$nama', '$telepon', '$alamat') ");

		 echo "<script>alert('Tambah Data Selesai')</script>";
		 echo "<script>location='index.php?page=distributor'</script>";			


	}

 ?>
