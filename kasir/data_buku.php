<?php include '../koneksi.php'; 
$id_kasir = $_SESSION['stat_login']['id_kasir'];

// pagination
$batas = 15; 
$result = mysqli_query($koneksi, "SELECT * FROM produk");
$jumlahdata = mysqli_num_rows($result);
$halaman = ceil($jumlahdata / $batas); //membulatkan bilangan menjadi ke atas
$page_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($batas * $page_aktif) - $batas;

?>


<div class="container">
<div class="row">
	<div class="col-md-9">
		<h4 class="text-dark text-center">Data Produk</h4>
	</div>

	<div>
		<div class="card-header">
			<form method="POST"> 	
			<div class="input-group offset-7">			
				<input  name="cari" type="text" class="col-md-4" placeholder="Search Here">
				<button class="btn btn-dark">Search</button>
			</div><br>
			</form>
		</div>

			<!-- pagenation -->
			<nav aria-label="Page navigation example ">
			  <ul class="pagination offset-1">
			    
			     <?php if($page_aktif > 1): ?>
			     <li class="page-item"> <a href="?page=data_buku&halaman=<?php echo $page_aktif - 1; ?>" class="btn btn-primary text-white btn-sm"
			     	>&laquo;</a></li>
			    <?php endif; ?>

			   
			    <?php for($i =1; $i <= $halaman; $i++) : ?>
			        <?php if($i == $page_aktif): ?>
			          <li class="page-item"> <a href="?page=data_buku&halaman=<?php echo $i; ?>"class="btn btn-primary text-white btn-sm"><?php echo $i; ?></a></li>
			        <?php else : ?>
			          <li class="page-item"> <a href="?page=data_buku&halaman=<?php echo $i; ?>"class="btn btn-light text-success btn-sm"><?php echo $i; ?></a></li>
			        <?php endif; ?>
			      <?php endfor; ?>
			    <li class="page-item">
			     <?php if($page_aktif < $halaman ): ?>
			      <li class="page-item">  <a href="?page=data_buku&halaman=<?php echo $page_aktif + 1; ?>"class="btn btn-primary text-white btn-sm">&raquo;</a></li>
			    <?php endif;  ?>
			  
			  </ul>
			</nav>


				
			<div class="card-body">
				<table class="table col-md-10">
				  <thead class="text-white" style="background-color: #3717E0;">
				     <tr>
				     	<td>No</td>
				     	<td>ID</td>
				     	<td>Judul</td>
				     	<td>Penulis</td>
				     	<td>Penerbit</td>
				     	<td>Tahun</td>
				     	<td>Stok</td>
				     	<td>Harga Pokok</td>
				     	<td>Harga Jual</td>
				     </tr>
				  </thead>
		<?php 	
			if (isset($_POST['cari'])) {
			$cari = $_POST['cari'];
			$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_buku LIKE '%".$cari."%' OR judul LIKE '%".$cari."%' OR tahun LIKE '%".$cari."%' OR harga_jual LIKE '%".$cari."%' OR penerbit LIKE '%".$cari."%' ORDER BY judul DESC");
			}else{
					$ambil = mysqli_query($koneksi, "SELECT * FROM produk LIMIT $awaldata,$batas");	
			}
				$no = 1+$awaldata;
				while($tiap = mysqli_fetch_assoc($ambil)){
				?>
				  <tbody>
				    <tr class="table-active">
				    	<td><?php echo $no++ ?></td>
				    	<td><?php echo $tiap['id_buku'] ?></td>
				    	<td><?php echo ucwords($tiap['judul']) ?></td>
				    	<td><?php echo ucwords($tiap['penulis']) ?></td>
				    	<td><?php echo ucwords($tiap['penerbit']) ?></td>
				    	<td><?php echo $tiap['tahun'] ?></td>
				    	<td><?php echo $tiap['stok'] ?></td>
				  		<td>Rp. <?php echo number_format($tiap['harga_pokok']) ?></td>
				  		<td>Rp. <?php echo number_format($tiap['harga_jual']) ?></td>
				    </tr>
			<?php }?>
				  </tbody>
				</table>
			
			</div>
		</div>
	</div>
</div>
</div>