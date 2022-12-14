<?php 
	include '../koneksi.php';
	$id_produk = $_GET['id'];
	$id_user = $_SESSION['stat_login']['id_kasir'];
 	foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
	$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_buku='$id_produk' ");
	$data= mysqli_fetch_assoc($ambil);
	$tanggal = date("Y-m-d");
	$ppn = 0.11 *$data['harga_jual'];
	$tppn = $ppn * $jumlah;
  	$total = ($jumlah *$data['harga_jual']) +($tppn);
  	$diskon = ($data['diskon']/100) * $total;
  	$bayar= ($total)-($diskon); 

		mysqli_query($koneksi, "INSERT INTO tb_penjualan (id_buku,id_kasir,jumlah,total,tanggal) VALUES ('$id_produk','$id_user','$jumlah','$bayar','$tanggal') ") or die(mysql_error($koneksi));
echo "<script>alert('ok')</script>";
mysqli_query($koneksi, "UPDATE produk SET stok=stok-$jumlah WHERE id_buku='$id_produk' ");

}
	unset($_SESSION['keranjang']);
	echo "<script>location='index.php?page=keranjang'</script>";
?>



<?php 
include '../koneksi.php';
echo "<script>";
	print_r($_SESSION['keranjang']);
echo "</script>";

 ?>