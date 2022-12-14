<?php 

// pagination
$batas = 10; 
$result = mysqli_query($koneksi, "SELECT * FROM tb_penjualan");
$jumlahdata = mysqli_num_rows($result);
$halaman = ceil($jumlahdata / $batas); //membulatkan bilangan menjadi ke atas
$page_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($batas * $page_aktif) - $batas;

?>


<div class="container">
<div class="row">
	<div class="col-md-9">
		<h4 class="text-dark text-center">Data Penjualan</h4>
	</div>

		
		<!-- pagenation -->
		<nav aria-label="Page navigation example">
			  <ul class="pagination justify-content-end">
			    
			     <?php if($page_aktif > 1): ?>
			     <li class="page-item"> <a href="?page=data_penjualan&halaman=<?php echo $page_aktif - 1; ?>" class="btn btn-primary text-white btn-sm"
			     	>&laquo;</a></li>
			    <?php endif; ?>

			   
			    <?php for($i =1; $i <= $halaman; $i++) : ?>
			        <?php if($i == $page_aktif): ?>
			          <li class="page-item"> <a href="?page=data_penjualan&halaman=<?php echo $i; ?>"class="btn btn-primary text-white btn-sm"><?php echo $i; ?></a></li>
			        <?php else : ?>
			          <li class="page-item"> <a href="?page=data_penjualan&halaman=<?php echo $i; ?>"class="btn btn-light text-success btn-sm"><?php echo $i; ?></a></li>
			        <?php endif; ?>
			      <?php endfor; ?>
			    <li class="page-item">
			     <?php if($page_aktif < $halaman ): ?>
			      <li class="page-item">  <a href="?page=data_penjualan&halaman=<?php echo $page_aktif + 1; ?>"class="btn btn-primary text-white btn-sm">&raquo;</a></li>
			    <?php endif;  ?>
			  
			  </ul>
		</nav>

	<div>
		<div class="card-body">
				<a href="index.php?page=tambah_produk" class="bi bi-person-plus-fill" style="font-size: 25px;"></a>
				<table class="table col-md-10">
				  <thead class="text-white" style="background-color: #3717E0;">
				     <tr>
				     	<td>No</td>
				     	<td>ID Penjualan</td>
				     	<td>ID Buku</td>
				     	<td>ID Kasir</td>
				     	<td>Jumlah</td>
				     	<td>Total</td>
				     	<td>Tanggal</td>
				     	<td></td>
				     </tr>
				  </thead>
		<?php 	
			$ambil = mysqli_query($koneksi, "SELECT * FROM tb_penjualan ORDER BY id_buku DESC");
					$ambil = mysqli_query($koneksi, "SELECT * FROM tb_penjualan LIMIT $awaldata,$batas");	
				$no = 1+$awaldata;
				while($tiap = mysqli_fetch_assoc($ambil)){
				?>
				  <tbody>
				    <tr>
				    	<td><?php echo $no++ ?></td>
				    	<td><?php echo $tiap['id_penjualan'] ?></td>
				    	<td><?php echo ucwords($tiap['id_buku']) ?></td>
				    	<td><?php echo ucwords($tiap['id_kasir']) ?></td>
				    	<td><?php echo ucwords($tiap['jumlah']) ?></td>
				    	<td><?php echo $tiap['total'] ?></td>
				    	<td><?php echo $tiap['tanggal'] ?></td>
				  		<td>
				  			<a href="index.php?page=edit_produk&id=<?php echo $tiap["id_buku"] ?>" class="bi bi-pencil-fill"></a> ||
				  			<a href="index.php?page=delete_produk&id=<?php echo $tiap["id_buku"] ?>" onclick="return confirm('Yakin Hapus ??')" class="bi bi-x-square-fill"></a>
				  		</td>
				    </tr>
			<?php }?>
				  </tbody>
				</table>
			
			</div>
		</div>
	</div>
</div>
</div>