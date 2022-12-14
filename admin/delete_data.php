<?php 

	$data = $_GET['id'];

	$ambil = mysqli_query($koneksi, "DELETE FROM tb_kasir WHERE id_kasir='$data' ");

	echo "<script>alert('Data Terhapus')</script>";
	echo "<script>location='index.php?page=data_pegawai'</script>";

 ?>