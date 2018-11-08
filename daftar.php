<?php
  require "lib/php/function.php";
  session_start();
  if(!isset($_SESSION['username'])){
    $username = "Anon";
  }else{
    $username = $_SESSION['username'];
  }
  if ( isset($_POST['daftar']) ) {
    if ( register($_POST) > 0 ) {
      echo '<script>alert("SIP")</script>';
      header('Location: login.php');
    }else {
      echo mysqli_error($conn);
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Azarine Bag</title>
    <!-- Import Link -->
    <?php include("lib/php/link.php") ?>
    <!-- End Import Link -->
    <style>
      .jumbotron {
        margin-bottom: 0;
      }
    </style>
  </head>
  <body>
    <!-- Import Navbar -->
    <?php include('lib/php/navbar.php') ?>
    <!-- End Import Navbar -->
    <!-- Form Daftar -->
    <div class="jumbotron jumbotron-fuild" style="background: linear-gradient(to right, #33ccff 25%, #ff99ff 100%);">


    <div class="container">
      <div class="text-center">
        <h1 style="font-family: 'Titillium Web', sans-serif;"><strong>Form Pendaftaran</strong></h1>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <form class="" action="" method="post">
            <div class="form-group">
              <label for="inputUsername">Username</label>
              <input type="text" name="username" value="" class="form-control" id="inputUsername" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label for="inputNama">Nama</label>
              <input type="text" name="nama" value="" class="form-control" id="inputNama" placeholder="Nama anda" required>
            </div>
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" name="email" value="" class="form-control" id="inputEmail" placeholder="Email" required>
            </div>
            <div class="form-group">
              <label for="inputAlamat">Alamat</label>
              <textarea class="form-control" id="inputAlamat" name="alamat" rows="5" cols="50" required></textarea>
            </div>
            <div class="form-group">
              <label for="inputPass">Password</label>
              <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group">
              <label for="inputPass2">Konfirmasi Password</label>
              <input type="password" name="password2" value="" class="form-control" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" name="daftar" class="btn btn-outline-dark btn-lg">Daftar</button>
          </form>
        </div>
      </div>
    </div>

    </div>
    <!-- End Form Daftar -->
    <!-- Import Footer -->
    <?php include('lib/php/footer.php') ?>
    <!-- End Import Footer -->
    <!-- Import Link2 -->
    <?php include('lib/php/link2.php') ?>
    <!-- End Import Link2 -->
  </body>
</html>
