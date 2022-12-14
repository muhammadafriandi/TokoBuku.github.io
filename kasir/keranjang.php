<?php 	
include '../koneksi.php';
$id_user = $_SESSION['stat_login']['id_kasir'];

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
	echo "<script>alert('Keranjang Kosong Silahkan Lakukan Pembelian Dulu')</script>";
	echo "<script>location='index.php?page=produk'</script>";
}

?>
 	<div class="card-body">
 		<div class="row col-md-11 align-center">
			<form method="POST">
				<table class="table table-responsive">
					<thead class="text-white" style="background-color: #3717E0;">
				     <tr>
				     	<td>No</td>
				     	<td>Judul</td>
				     	<td>Harga</td>
				     	<td>Jumlah</td>
				     	<td>PPN</td>
				     	<td>Total</td>
				     	<td>Diskon</td>
				     	<td>Bayar</td>
				     	<td></td>
				     </tr>
				  </thead>
				  <tbody>
				  	<?php $no=1;	
				  	$grandtotal=0;  
				  	?>
					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
					  	<?php
					  	$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_buku = '$id_produk'");
					  	$data = mysqli_fetch_assoc($ambil);
					  	$ppn = ($jumlah * $data['harga_jual'])*(0.11);
					  	$total = ($jumlah *$data['harga_jual']) +($ppn);
					  	$diskon = ($data['diskon']/100) * $total;
					  	$bayar=$total-$diskon; 
					  	$grandtotal+=$bayar; 

					?>	

						<tr class="">
					  	 	<td><?php echo $no++; ?></td>
					  	 	<td>
					  	 		<input type="text" name="id" value="<?php echo ucwords($id_produk) ?>"></td>
					  	 	<td>Rp <?php echo number_format($data['harga_jual']) ?></td>
					  	 	<td>
					  	 		<input type="text" name="jumlah" class="col-md-7" value="<?php echo $jumlah; ?>"></td>
					  	 	<td>11 %</td>
					  	 	<td>Rp. <?php echo number_format($total); ?></td>
					  	 	<td><?php echo $data['diskon'] ?> %</td>
					  	 	<td>
					  	 		<input type="text" name="bayar" value="Rp. <?php echo number_format($bayar); ?>"></td>
					  	 	<td class="col-md-9">
					  	 		<a href="index.php?page=delete_keranjang&id=<?php echo $id_produk ?>" class="btn btn-sm text-white" style="background-color:#90021A;">Hapus</a>
					  	 		<input type="submit" name="tambah" class="btn btn-sm col-md-5 btn-info" value="Beli"> 
					  	 	</td>
					  	 </tr>

				<?php endforeach ?>	
				  </tbody>
				  <tr>
				  	<td colspan="7">Total Harga</td>
				  	<td>Rp. <?php echo number_format($grandtotal) ?></td>
				<td><a href="index.php?page=checkout&id=<?php echo $id_produk ?>" name="checkout" class="btn btn-info">CheckOut</a>`</td>
				  </tr>
				</table>
			 </form>
			
			</div>
 
<!--php  
// if (isset($_POST['checkout'])) {
//  $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_buku='$id_produk' ");
// foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
// 	$id_user = $_SESSION['stat_login']['id_kasir'];	
// 	$tanggal = date("Y-m-d");
// 	$id= $_SESSION['keranjang'][$id_produk];
// 	$jumlah = $_SESSION['keranjang'][$jumlah];
// 	$ppn = ($jumlah * $data['harga_jual'])*(0.11);
//   	$total = ($jumlah *$data['harga_jual']) +($ppn);
//   	$diskon = ($data['diskon']/100) * $total;
//   	$bayar=$post['bayar']; 

// 	$tambah = mysqli_query($koneksi, "INSERT INTO tb_penjualan (id_buku,id_kasir,jumlah,total,tanggal) VALUES ('$id','$id_user','$jumlah','$bayar','$tanggal') ")or die (mysqli_error($koneksi));
`
// 	echo "<script>alert('OK')</script>";
// }
// }else{ 
// 	echo "<script>alert('no')</script>";
// }

 ?> -->
<!-- <?php 
// echo "<pre>";
// 	print_r($_SESSION['keranjang'][$id_produk]);
// echo "</pre>";
// echo "<pre>";
// 	print_r($_SESSION['keranjang'][$jumlah]);
// echo "</pre>";
// echo "<pre>";
// 	print_r($_SESSION['stat_login']['id_kasir']);
// echo "</pre>";
//  echo "<pre>";
// 	print_r($bayar);
// echo "</pre>";
// echo "</pre>";
//  echo "<pre>";
// 	print_r($jumlah);
// echo "</pre>";

 // ?>