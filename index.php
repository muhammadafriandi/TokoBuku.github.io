<?php 
  include 'koneksi.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Toko Buku</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="bg-secondary">
    
<main class="form-signin border-3 solid">
  <form class="text-center" method="POST">
    <img class="mb-4" src="assets/image/logo.jpg" alt="" width="120">
    <h1 class="h3 mb-4 text-center text-info">Please sign in</h1>
    <div class="form-floating">
      <input type="text" name="username" class="form-control mb-2" id="floatingInput"  placeholder="Username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-info" name="login" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-white">&copy; 2017–<?=date('Y')?></p>
  </form>
</main>

  </body>
</html>

<?php 
session_start();
if (isset($_POST['login'])) {
  $user = $_POST['username'];
  $pass = md5($_POST['password']);

  $cek = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE username ='$user' AND password ='$pass' ");
  $valid = mysqli_fetch_assoc($cek);

  if (empty($valid)) {
    echo "<script>alert('Gagal Login')</script>";
    echo "<script>location='index.php'</script>"; 
  }else {
    $_SESSION['stat_login'] = $valid;


    $_SESSION['tb_kasir'] = $valid;
      if ($valid['akses']=="kasir"){
      echo "<script>alert('Sukses Login')</script>";
      echo "<script>location='kasir/index.php'</script>";
    }else if ($valid['akses']=="admin"){
      echo "<script>alert('Sukses Login')</script>";
      echo "<script>location='admin/index.php'</script>";
    }
  }
}
  

 ?>
