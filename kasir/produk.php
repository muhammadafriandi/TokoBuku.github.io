<?php include '../koneksi.php';
 $id_user = $_SESSION['stat_login']['id_kasir'];

$batas = 12; 
$result = mysqli_query($koneksi, "SELECT * FROM produk");
$jumlahdata = mysqli_num_rows($result);
$halaman = ceil($jumlahdata / $batas); //membulatkan bilangan menjadi ke atas
$page_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($batas * $page_aktif) - $batas;

?>



<div class="container" >
	<div class="row">
		<div class="card col-md-10 shadow" style="background-color:  #BC8F8F;"> 
			<div class="card-header"> 
				<h3 class="text-center">Produk</h3>
				<form method="POST" class="col-md-12 mb-2"> 	
					<div class="input-group offset-7">			
						<input  name="cari" type="text" class="col-md-4" placeholder="Search Here">
						<button class="btn btn-dark">Search</button>
					</div><br>
				</form>
			</div>

			<!-- pagenation -->
			<nav aria-label="Page navigation example">
				  <ul class="pagination offset-1">
				    
				     <?php if($page_aktif > 1): ?>
				     <li class="page-item"> <a href="?page=produk&halaman=<?php echo $page_aktif - 1; ?>" class="btn btn-primary text-white btn-sm"
				     	>&laquo;</a></li>
				    <?php endif; ?>

				   
				    <?php for($i =1; $i <= $halaman; $i++) : ?>
				        <?php if($i == $page_aktif): ?>
				          <li class="page-item"> <a href="?page=produk&halaman=<?php echo $i; ?>"class="btn btn-primary text-white btn-sm"><?php echo $i; ?></a></li>
				        <?php else : ?>
				          <li class="page-item"> <a href="?page=produk&halaman=<?php echo $i; ?>"class="btn btn-light text-success btn-sm"><?php echo $i; ?></a></li>
				        <?php endif; ?>
				      <?php endfor; ?>
				    <li class="page-item">
				     <?php if($page_aktif < $halaman ): ?>
				      <li class="page-item">  <a href="?page=produk&halaman=<?php echo $page_aktif + 1; ?>"class="btn btn-primary text-white btn-sm">&raquo;</a></li>
				    <?php endif;  ?>
				  
				  </ul>
			</nav>

			<div class="row">			
					<?php 
					if (isset($_POST['cari'])) {
						$cari = $_POST['cari'];
						$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE judul LIKE '%".$cari."%' OR harga_jual LIKE '%".$cari."%' ORDER BY id_buku DESC");
					}else{
						$ambil = mysqli_query($koneksi, "SELECT * FROM produk LIMIT $awaldata,$batas");	
					}
						while($data = mysqli_fetch_array($ambil)){
					?>	
					<div class="card-body col-md-3">
						<img src="../assets/image/produk/<?php echo $data["foto"] ?>" width="100px" class="img-fluid" href="#">
						<h6 class="mb-0"><?php echo $data['judul'] ?></h6>
						<small>Rp. <?php echo number_format($data['harga_jual']) ?></small><br>
						<small>Off <?php echo $data['diskon'] ?>% </small> <br>
						<a href="index.php?page=beli&id=<?php echo $data['id_buku']; ?>" class="btn btn-info">beli</a>
					</div>		
				<?php } ?>			
			</div>
		</div>
	</div>
</div> 