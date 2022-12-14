<?php include '../koneksi.php';

	$id_produk = $_GET['id'];
//	$id_user = $_SESSION['stat_login']['id_kasir'];

	$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_buku='$id_produk' ");
	$data = mysqli_fetch_assoc($ambil);
 ?>

<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="card-header bg-secondary text-center">
				<h4 class="text-white">Edit Buku</h4>
			</div>
			<div class="card-body bg-secondary">
				<form method="POST" class="col-md-12" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-5 mb-3">
							<div>
								<label class="text-white">Juduk</label>
								<input type="text" name="judul" class="form-control" value="<?php echo $data['judul'] ?>" required>
							</div>
							<div>
								<label class="text-white">Penulis</label>
								<input type="text" name="penulis" class="form-control" value="<?php echo $data['penulis'] ?>" required >
							</div>
							<div>
								<label class="text-white">Penerbit</label>
								<input type="text" name="penerbit" class="form-control" value="<?php echo $data['penerbit'] ?>" required>
							</div>
							<div>
								<label class="text-white">Tahun</label>
								<input type="text" name="tahun" class="form-control" value="<?php echo $data['tahun'] ?>" required>
							</div>
							<div>
								<label class="text-white">Foto</label>
								<input type="file" name="foto" class="form-control" value="<?php echo $data['foto'] ?>">
							</div>
						</div>
						<div class="col-md-5">
							<div>
								<label class="text-white text-center">Stok</label>
								<input type="text" name="stok" class="form-control" value="<?php echo $data['stok'] ?>">
							</div>
							<div>
								<label class="text-white">Harga Pokok</label>
								<input type="text" name="hpokok" class="form-control" value="<?php echo $data['harga_pokok'] ?>" required>
							</div>
							<div>
								<label class="text-white">Harga Jual</label>
								<input type="text" name="hjual" class="form-control" value="<?php echo $data['harga_jual'] ?>" required>
							</div>	
							<div class="col-md-3">
								<label class="text-white">Diskon</label>
								<input type="text" name="diskon" class="form-control" value="<?php echo $data['diskon'] ?>" required>
							</div>	
						</div>
							<input type="submit" name="tambah" class="btn btn-info col-md-3" value="Simpan"> 				
							<a href="index.php?page=produk" class="btn btn-info text-dark col-md-3 offset-1">Batal</a>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>

<?php 
if(isset($_POST['tambah'])) {	
	 $judul 	 = $_POST['judul'];
	 $penulis	 = $_POST['penulis'];
	 $penerbit 	 = $_POST['penerbit'];
	 $tahun 	 = $_POST['tahun'];
	 $stok		 = $_POST['stok'];
	 $hpokok  	 = $_POST['hpokok'];
	 $hjual   	 = $_POST['hjual'];
	 $diskon 	 = $_POST['diskon'];
	$namafoto  	 = $_FILES['foto']['name'];
	$lokasifoto	 = $_FILES['foto']['tmp_name'];

if (!empty($lokasifoto)) {
	move_uploaded_file($lokasifoto, "../assets/image/produk/".$namafoto);
	 $tambah = mysqli_query($koneksi, "UPDATE produk SET
	 	 	judul 		='$judul',
	 	 	penulis 	='$penulis',
	 	 	penerbit 	='$penerbit',
	 	 	tahun 		='$tahun',
	 	 	stok 		='$stok',
	 	 	harga_pokok ='$hpokok',
	 	 	harga_jual  ='$hjual',
	 	 	foto 		='$namafoto',
	 	 	diskon  	='$diskon' WHERE id_buku='$id_produk' ");

}else{
	 $tambah = mysqli_query($koneksi, "UPDATE produk SET
	 	 	judul 		='$judul',
	 	 	penulis 	='$penulis',
	 	 	penerbit 	='$penerbit',
	 	 	tahun 		='$tahun',
	 	 	stok 		='$stok',
	 	 	harga_pokok ='$hpokok',
	 	 	harga_jual  ='$hjual',
	 	 	diskon  	='$diskon' WHERE id_buku='$id_produk' ");
}
	 
	echo "<script>alert('Data Sudah Disimpan')</script>";
	echo "<script>location='index.php?page=produk'</script>";}
 ?>
