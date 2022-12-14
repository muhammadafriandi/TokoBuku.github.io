<?php 

	$data = $_GET['id'];

	$ambil = mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id_buku='$data' ");

	echo "<script>alert('Data Terhapus')</script>";
	echo "<script>location='index.php?page=produk'</script>";

 ?>