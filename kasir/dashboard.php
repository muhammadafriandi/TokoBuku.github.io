<?php 

$data = mysqli_query($koneksi, "SELECT SUM(stok) FROM produk");
$jumlah_produk =  mysqli_fetch_array($data);

$data = mysqli_query($koneksi, "SELECT SUM(jumlah) FROM tb_penjualan");
$jumlah_penjualan =  mysqli_fetch_array($data);

$data = mysqli_query($koneksi, "SELECT SUM(total) FROM tb_penjualan");
$pendapatan =  mysqli_fetch_array($data);
	 

 ?>



<div class="card border-0" style="background-color:	#BC8F8F">
	<div class="card-body">
		<h3>Welocome <?php echo $_SESSION['stat_login']['nama'] ?> </h3>
	</div>	
	
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-light shadow h-100 py-2" style="background-color:#85C1E9;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-center text-uppercase mb-1">
                                Stock</div>
                            <div class="h5 mb-0 font-weight-bold text-center text-danger text-gray-800"><?php echo $jumlah_produk['SUM(stok)'];?> Produk	</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="background-color:#D7BDE2;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-center text-uppercase mb-1">
                                Penjualan</div>
                            <div class="h5 mb-0 font-weight-bold text-center text-danger text-gray-800"><?php echo $jumlah_penjualan	['SUM(jumlah)'] ?><br> Produk Terjual</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2" style="background-color:#FCF3CF;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dar text-center text-uppercase mb-1">
                                Total Pendapatan</div>
                            <div class="h5 mb-0 font-weight-bold text-center text-danger text-gray-800">Rp. <?php echo number_format($pendapatan['SUM(total)'], 0,',','.') ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	</div>
	
</div>