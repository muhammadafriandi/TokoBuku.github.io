<?php 
include '../koneksi.php';
//session_start();
$id_produk = $_GET['id'];
// jika di keranjang tinggal 1, maka hilangkan sekalian
if ($_SESSION['keranjang'][$id_produk]==1){
	unset($_SESSION['keranjang'][$id_produk]);
}else{
	$_SESSION['keranjang'][$id_produk] -=1;
}

	echo "<script>alert('produk sudah di Hapus')</script>";
echo "<script>location='index.php?page=keranjang'</script>";

echo "<pre>";
	print_r($_SESSION['keranjang']);
echo "</pre>";

?>