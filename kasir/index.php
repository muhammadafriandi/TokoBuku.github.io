<?php include '../koneksi.php';
session_start();
 
$ambil = mysqli_query($koneksi, "SELECT * FROM tb_kasir");
$data = mysqli_fetch_assoc($ambil);

 ?>
<?php 
// jika belum login (tidak ada seasion)

if(!isset($_SESSION['stat_login'])){
  echo "<script>alert('Login Gagal')</script>";
  echo "<script>location='../index.php'</script>";
  exit();
}

?>
 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Kasir Toko Buku</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

 
    
    <!-- Custom styles for this template -->
    <link href="../assets/admin.css" rel="stylesheet">
  </head>
  <body style="background-color:#BC8F8F;">
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-white" href="index.php">Kasir</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   <div class="navbar-nav">
    <div class="nav-item">
        <div class="input-group">
      <a class="nav-link text-info px-3 bi-person-circle text-white" href="index.php?page=profil" >Profil</a>
      <a class="nav-link text-info bi-box-arrow-right px-3 text-white" href="index.php?page=logout">
      LogOut
      </a>
    </div>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color:  #F5DEB3">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link bi bi-house-door-fill" href="index.php">
              <label>Dashboard</label>              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link bi bi-shop" href="index.php?page=produk">
              <span data-feather="file"></span>
              Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link bi bi-bar-chart-line-fill" href="index.php?page=data_penjualan">
              <span data-feather="shopping-cart"></span>
              Data Penjualan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link bi bi-book-fill" href="index.php?page=data_buku">
              <span data-feather="bar-chart-2"></span>
              Data Buku
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link bi bi-cart4" href="index.php?page=keranjang">
              <span data-feather="bar-chart-2"></span>
              Keranjang
            </a>
          </li>
        </ul>       
      </div>
    </nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh- 100 pt-3">

<?php 
      if (!isset($_GET['page'])){
        include 'dashboard.php';
      }else{
        if ($_GET['page']=="produk"){
          include 'produk.php';
        }elseif ($_GET['page']=="data_penjualan"){
          include 'data_penjualan.php';
        }elseif ($_GET['page']=="data_buku"){
          include 'data_buku.php';
        }elseif ($_GET['page']=="tambah_buku"){
          include 'tambah_buku.php';
        }elseif ($_GET['page']=="input_pemasukan"){
          include 'input_pemasukan.php';
        }elseif ($_GET['page']=="data_pemasukan"){
          include 'data_pemasukan.php';
        }elseif ($_GET['page']=="logout"){
          include 'logout.php';
        }elseif ($_GET['page']=="profil"){
          include 'profil.php';
        }elseif ($_GET['page']=="edit_profil"){
          include 'edit_profil.php';
        }elseif ($_GET['page']=="ganti_password"){
          include 'ganti_password.php';
        }elseif ($_GET['page']=="detail_buku"){
          include 'detail_buku.php';
        }elseif ($_GET['page']=="beli"){
          include 'beli.php';
        }elseif ($_GET['page']=="keranjang"){
          include 'keranjang.php';
        }elseif ($_GET['page']=="delete_keranjang"){
          include 'delete_keranjang.php';
        }elseif ($_GET['page']=="checkout"){
          include 'checkout.php';
        }
  }
?>



</main>

    
     <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
