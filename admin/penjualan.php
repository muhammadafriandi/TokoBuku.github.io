<?php 

// pagination
$batas = 15; 
$result = mysqli_query($koneksi, "SELECT * FROM tb_penjualan");
$jumlahdata = mysqli_num_rows($result);
$halaman = ceil($jumlahdata / $batas); //membulatkan bilangan menjadi ke atas
$page_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($batas * $page_aktif) - $batas;

?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<h3 class="text-center">Data Penjualan</h3>	
		</div>
		<div class="card-header">
			<form method="POST">
				<div class="input-group offset-5">			
					<input  name="cari" type="text" class="col-md-4" placeholder="Search Here">
					<button class="btn btn-dark">Search</button>
				</div>
			</form>

			<!-- pagenation -->
			<nav aria-label="Page navigation example ">
			  <ul class="pagination">
			    
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

		</div>


		<div class="col-md-9">
			<div class="card-body ">
				<table class="col-md-12">
					<thead class="text-white" style="background-color: #3717E0;">
						<tr>
							<td>No</td>
							<td>ID Penjualan</td>
							<td>ID Buku</td>
							<td>ID Kasir</td>
							<td>Jumlah</td>
							<td>Total</td>
							<td>Tanggal</td>
						</tr>
					</thead>
					<tbody>
					<?php 
						if (isset($_POST['cari'])) {
							$cari = $_POST['cari'];
							$select = mysqli_query($koneksi, "SELECT * FROM tb_penjualan WHERE id_penjualan LIKE '%".$cari."%' OR id_buku LIKE '%".$cari."%' OR id_kasir LIKE '%".$cari."%' OR total LIKE '%".$cari."%' OR tanggal LIKE '%".$cari."%' ORDER BY tanggal DESC");
						}else{
								$select = mysqli_query($koneksi, "SELECT * FROM tb_penjualan LIMIT $awaldata, $batas");	
						}
						$no = 1+$awaldata;
						while($data = mysqli_fetch_assoc($select)){
					?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $data['id_penjualan'] ?></td>
								<td><?php echo $data['id_buku'] ?></td>
								<td><?php echo $data['id_kasir'] ?></td>
								<td><?php echo $data['jumlah'] ?></td>
								<td><?php echo $data['total'] ?></td>
								<td><?php echo $data['tanggal'] ?></td>
							</tr>
				<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>