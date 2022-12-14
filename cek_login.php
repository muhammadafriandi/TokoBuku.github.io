<?php 

      //panggil koneksi data base
      include "koneksi.php";


      $username = mysqli_escape_string($koneksi, $_POST['username']);  //['password'] adalah inputan name ="username" dari form index, mysqli_escape_string untuk mengamankan data user
      $pass = md5($_POST['password']); //['password'] adalah inputan name ="password" dari form index
      $password = mysqli_escape_string($koneksi, $pass);

      //cek user ada atau tidak
      $cek = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE username = '$username' AND password = '$password' ");

      $user_valid = mysqli_fetch_array($cek);

      //uji jika username terdaftar
      if($user_valid){
            //jika user terdaftar
            //cek password
            if($password == $user_valid['password']){ // ['password'] ini yang ada di database
                  //jika passwor benar
            session_start();
            $_SESSION['username'] = $user_valid['username']; // $user_valid['username']; ini dari database dan                                                                                                          $_SESSION['username'] dari form input 
            $_SESSION['nama'] = $user_valid['nama'];
            $_SESSION['akses'] = $user_valid['akses'];

            //uji level user
            if($user_valid['akses'] == "admin"){
                  header('location:admin/index.php');
            }elseif($user_valid['akses'] == "kasir"){
                  header('location:kasir/index.php');
            }
      
      }else{
            echo "<script>alert('user name tidak benar KONTOL')</script>";
      }
 }else{
      echo "<script>alert('YANG BAENAR LAH KONTOL')</script>";
 }

 ?>