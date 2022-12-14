<?php 

// pagination

$batas = 15;
$result = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
$jumlahdata = mysqli_num_rows($result);
$halaman = ceil($jumlahdata / $batas); //membulatkan bilangan menjadi ke atas
$page_aktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($batas * $page_aktif) - $batas;

?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
		   <h3 class="text-center">Data Distributor</h3>				
		</div>
	<div class="card-header mb-3">
		<form method="POST"> 	
			<div class="input-group offset-5">			
				<input  name="cari" type="text" class="col-md-4" placeholder="Search Here">
				<button class="btn btn-dark">Search</button>
			</div>
		</form>
	</div>
		<!-- pagenation -->
			<nav aria-label="Page navigation example ">
			  <ul class="pagination justify-content-center">
			    
			     <?php if($page_aktif > 1): ?>
			     <li class="page-item"> <a href="?page=distributor&halaman=<?php echo $page_aktif - 1; ?>" class="btn btn-primary text-white btn-sm"
			     	>&laquo;</a></li>
			    <?php endif; ?>
			   
			    <?php for($i =1; $i <= $halaman; $i++) : ?>
			        <?php if($i == $page_aktif): ?>
			          <li class="page-item"> <a href="?page=distributor&halaman=<?php echo $i; ?>"class="btn btn-primary text-white btn-sm"><?php echo $i; ?></a></li>
			        <?php else : ?>
			          <li class="page-item"> <a href="?page=distributor&halaman=<?php echo $i; ?>"class="btn btn-light text-success btn-sm"><?php echo $i; ?></a></li>
			        <?php endif; ?>
			      <?php endfor; ?>
			    <li class="page-item">
			     <?php if($page_aktif < $halaman ): ?>
			      <li class="page-item">  <a href="?page=distributor&halaman=<?php echo $page_aktif + 1; ?>"class="btn btn-primary text-white btn-sm">&raquo;</a></li>
			    <?php endif;  ?>
			  
			  </ul>
			</nav>

		
		<div class="col-md-9 offset-1">
			<div class="card-body ">
				<a href="index.php?page=tambah_distributor" class="bi bi-person-plus-fill" style="font-size: 25px;"></a>
				<table class="col-md-12">
					<thead class="text-white" style="background-color: #3717E0;">
						<tr>
							<td>No</td>
							<td>ID Distributor</td>
							<td>Nama Distributor</td>
							<td>Alamat</td>
							<td>Telepon</td>
							<td></td>
						</tr>
					</thead>
					<tbody style="background-color:#A9CCE3 ;">
					<?php 

						if (isset($_POST['cari'])) {
							$cari = $_POST['cari'];
							$select = mysqli_query($koneksi, "SELECT * FROM tb_distributor WHERE nama_distributor LIKE '%".$cari."%' OR telepon LIKE '%".$cari."%' OR alamat LIKE '%".$cari."%' ORDER BY nama_distributor DESC");
						}else{
								$select = mysqli_query($koneksi, "SELECT * FROM tb_distributor LIMIT $awaldata,$batas");	
						}
						$no = 1+$awaldata;
						while($data = mysqli_fetch_assoc($select)){
					?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td class="text-center col-md-2"><?php echo $data['id_distributor'] ?></td>
								<td><?php echo ucwords($data['nama_distributor']) ?></td>
								<td><?php echo ucwords($data['alamat']) ?></td>
								<td><?php echo $data['telepon'] ?></td>
								<td>
									<a href="index.php?page=edit_distributor&id=<?php echo $data["id_distributor"] ?>" class="bi bi-pencil-fill text-dark"></a> ||
				  					<a href="index.php?page=delete_distributor&id=<?php echo $data["id_distributor"] ?>" onclick="return confirm('Yakin Hapus ??')" class="bi bi-x-square-fill text-dark"></a>
				  		
								</td>
							</tr>
				<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>