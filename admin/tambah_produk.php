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
				<form method="POST" class="col-md-12" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-5 mb-3">
							<div>
								<label class="text-white">Judul</label>
								<input type="text" name="judul" class="form-control ucword" required>
							</div>
							<div>
								<label class="text-white">Penulis</label>
								<input type="text" name="penulis" class="form-control ucword" required>
							</div>
							<div>
								<label class="text-white">Penerbit</label>
								<input type="text" name="penerbit" class="form-control" required ucword>
							</div>
							<div>
								<label class="text-white">Tahun</label>
								<input type="text" name="tahun" class="form-control" required>
							</div>
							<div class="mb-2">
								<label>Foto Product</label>
								<input type="file" name="foto" class="form-control">
							</div>
						</div>
						<div class="col-md-5">
							<div>
								<label class="text-white">Harga Pokok</label>
								<input type="text" name="hpokok" class="form-control" required>
							</div>
							<div>
								<label class="text-white">Harga Jual</label>
								<input type="text" name="hjual" class="form-control" required>
							</div>
							<div>
								<label class="text-white text-center">Stok</label>
								<input type="text" name="stok" class="form-control">
							</div>
							<div class="col-md-3">
								<label class="text-white text-center">Diskon</label>
								<input type="text" name="diskon" class="form-control">
							</div>
						</div>
							<input type="submit" name="simpan" class="btn btn-info col-md-3" value="Simpan"> 				
							<a href="index.php?page=produk" class="btn btn-info text-dark col-md-3 offset-1">Batal</a>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>

<?php 

if(isset($_POST['simpan'])){

	$judul 		 = $_POST['judul'];
	$penulis  = $_POST['penulis'];
	$penerbit = $_POST['penerbit'];
	$tahun		 = $_POST['tahun'];
	$hpokok 		 = $_POST['hpokok'];
	$hjual 		 = $_POST['hjual'];
	$stok		 = $_POST['stok'];
	$diskon  = $_POST['diskon'];
	$namafoto  	 = $_FILES['foto']['name'];
	$lokasifoto	 = $_FILES['foto']['tmp_name'];




	if(!empty($lokasifoto)){
		move_uploaded_file($lokasifoto, "../assets/image/produk/".$namafoto);
		$tambah = mysqli_query($koneksi, "INSERT INTO produk (id_buku,judul,penulis,penerbit,stok,harga_pokok,harga_jual,tahun,foto,diskon) VALUES (null,'$judul','$penulis','$penerbit','$stok','$hpokok','$hjual','$tahun','$namafoto','$diskon') ");



	echo "<script>alert('Data Sudah Disimpan')</script>";
	echo "<script>location='index.php?page=produk'</script>";
	}else{
		echo "<script>alert('Data gagal Disimpan')</script>";
		mysqli_error($koneski);
	}
 
}

?>