<?php include '../koneksi.php';

	$id_produk = $_GET['id'];
//	$id_user = $_SESSION['stat_login']['id_kasir'];

	$ambil = mysqli_query($koneksi, "SELECT * FROM tb_distributor WHERE id_distributor='$id_produk' ");
	$data = mysqli_fetch_assoc($ambil);
 ?>

 <div class="container">
 	<div class="row">
 		<div class="col-md-10">
 			<div class="card-header text-center">
 				<h4>Edit Distributor</h4>
 			</div>
 			<div class="card-body">
 				<div class="row col-md-10 offset-1">
	 				<form method="POST">
	 					<div>
	 						<label>Nama Distributor</label>
	 						<input type="text" name="nama" class="form-control" value="<?php echo $data['nama_distributor'] ?>">
	 					</div>
	 					<div>
	 						<label>Telepon</label>
	 						<input type="text" name="telepon" class="form-control" value="<?php echo $data['telepon'] ?>">
	 					</div>
	 					<div class="mb-3">
	 						<label>Alamat</label>
	 						<textarea class="form-control" name="alamat" rows="3"><?php echo $data['alamat'] ?></textarea>
	 					</div>
	 					<div>
	 						<input type="submit" name="tambah" class="btn btn-info" value="Simpan"> 				
							<a href="index.php?page=distributor" class="btn btn-info text-dark offset-1">Batal</a>
	 					</div>
	 				</form>	
	 			</div>
 			</div>
 		</div>
 	</div>
 </div>


<?php 
if(isset($_POST['tambah'])) {	
	 $nama 	 = $_POST['nama'];
	 $telepon	 = $_POST['telepon'];
	 $alamat 	 = $_POST['alamat'];
	 
	 $tambah = mysqli_query($koneksi, "UPDATE tb_distributor SET
	 	 	nama_distributor ='$nama',
	 	 	telepon 		 ='$telepon',
	 	 	alamat 			 ='$alamat' WHERE id_distributor='$id_produk' ");

	 
	echo "<script>alert('Data Sudah Disimpan')</script>";
	echo "<script>location='index.php?page=distributor'</script>";}
 ?>
