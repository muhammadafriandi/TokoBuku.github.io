<?php include '../koneksi.php'; 
$id_kasir = $_SESSION['stat_login']['id_kasir'];

// pagination

$batas = 15;
$result = mysqli_query($koneksi, "SELECT * FROM tb_kasir");
$jumlahdata = mysqli_num_rows($result);
$halaman = ceil($jumlahdata / $batas); //membulatkan bilangan menjadi ke atas
$page_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($batas * $page_aktif) - $batas;

?>


<div class="container">
<div class="row">
	<div class="col-md-9">
		<h4 class="text-dark text-center">Data Pegawai</h4>
	</div>

	<div class="col-md-10 ">
		<div class="card-header">
			<form method="POST"> 	
			<div class="input-group col-md-6 offset-2">			
				<input  name="pencarian" type="text" class="col-md-6" placeholder="Search Here">
				<button class="btn btn-dark">Search</button>
			</div><br>
			</form>
			</div>

			<!-- pagenation -->
			<nav aria-label="Page navigation example ">
			  <ul class="pagination justify-content-center">
			    
			     <?php if($page_aktif > 1): ?>
			     <li class="page-item"> <a href="?page=penjualan&halaman=<?php echo $page_aktif - 1; ?>" class="btn btn-primary text-white btn-sm"
			     	>&laquo;</a></li>
			    <?php endif; ?>

			   
			    <?php for($i =1; $i <= $halaman; $i++) : ?>
			        <?php if($i == $page_aktif): ?>
			          <li class="page-item"> <a href="?page=penjualan&halaman=<?php echo $i; ?>"class="btn btn-primary text-white btn-sm"><?php echo $i; ?></a></li>
			        <?php else : ?>
			          <li class="page-item"> <a href="?page=penjualan&halaman=<?php echo $i; ?>"class="btn btn-light text-success btn-sm"><?php echo $i; ?></a></li>
			        <?php endif; ?>
			      <?php endfor; ?>
			    <li class="page-item">
			     <?php if($page_aktif < $halaman ): ?>
			      <li class="page-item">  <a href="?page=penjualan&halaman=<?php echo $page_aktif + 1; ?>"class="btn btn-primary text-white btn-sm">&raquo;</a></li>
			    <?php endif;  ?>
			  
			  </ul>
			</nav>
				
			<div class="card-body">
				<a href="index.php?page=tambah_pegawai" class="bi bi-person-plus-fill" style="font-size: 25px;"></a>
				<table class="table col-md-7">
				  <thead class="text-white" style="background-color: #3717E0;">
				     <tr>
				     	<td>No</td>
				     	<td>ID</td>
				     	<td>Nama</td>
				     	<td>Username</td>
				     	<td>email</td>
				     	<td>telepon</td>
				     	<td>Posisi</td>
				     	<td></td>
				     </tr>
				  </thead>
		<?php 	
			if (isset($_POST['pencarian'])) {
			$cari = $_POST['pencarian'];
			$ambil = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE id_kasir LIKE '%".$cari."%' OR nama LIKE '%".$cari."%'  ");
			}else{
					$ambil = mysqli_query($koneksi, "SELECT * FROM tb_kasir LIMIT $awaldata,$batas");	
			}
				$no = 1+$awaldata;
				while($tiap = mysqli_fetch_assoc($ambil)){
				?>
				  <tbody>
				    <tr class="table-active">
				    	<td><?php echo $no++ ?></td>
				    	<td><?php echo $tiap['id_kasir'] ?></td>
				    	<td><?php echo ucwords($tiap['nama']) ?></td>
				    	<td><?php echo ucwords($tiap['username']) ?></td>
				    	<td><?php echo $tiap['email'] ?></td>
				    	<td><?php echo $tiap['telepon'] ?></td>
				    	<td><?php echo $tiap['akses'] ?></td>
				  		<td>
				  			<a href="index.php?page=edit_pegawai&id=<?php echo $tiap["id_kasir"] ?>" class="bi bi-pencil-fill"></a> ||
				  			<a href="index.php?page=delete_data&id=<?php echo $tiap["id_kasir"] ?>" onclick="return confirm('Yakin Hapus ??')" class="bi bi-x-square-fill"></a>
				  		</td>
				    </tr>
				
			<?php } ?>
				  </tbody>
				</table>
			
			</div>
		</div>
	</div>
</div>
</div>