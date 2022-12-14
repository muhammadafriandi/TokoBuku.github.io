<?php 
include '../koneksi.php';

$id_produk = $_GET['id'];

if (isset($_SESSION['keranjang'][$id_produk])) {
	$_SESSION['keranjang'][$id_produk]+=1;
}else{
	$_SESSION['keranjang'][$id_produk]=1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

echo "<script>alert('produk sudah di masukkan ke keranjang')</script>";
echo "<script>location='index.php?page=produk'</script>";
 ?>
<!--  <?php  
//include '../koneksi.php';
// $id_produk = $_GET['id'];
// $id_user= $_SESSION['stat_login']['id_kasir'];

// $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_buku='$id_produk'  ");
// $produk = mysqli_fetch_assoc($ambil);


// 	// jika di keranjang tidak id produk, maka jumlah defaultnya 1
// 	if (!isset($_SESSION['keranjang'][$id_produk])){
// 		$_SESSION['keranjang'][$id_produk] = 1;
// 	}else{
// 		$jumlahkeranjang = $_SESSION['keranjang'][$id_produk];
// 		if ($produk['stok'] > $jumlahkeranjang){

// 		$_SESSION['keranjang'][$id_produk] += 1;	
// 		}
		
// 	}	

// echo "<script>alert('produk sudah di masukkan ke keranjang')</script>";
// echo "<script>location='index.php?page=produk'</script>";
?> -->
