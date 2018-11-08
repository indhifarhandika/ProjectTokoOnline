<?php
  require("lib/php/function.php");
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: login.php');
	}else {
    global $conn;
    $username = $_SESSION['username'];
    $result = mysqli_query($conn,"SELECT username FROM member WHERE status='member'");
    $row = mysqli_fetch_assoc($result);
    if ( $username === $row['username'] ) {
      header("Location: index.php");
      exit;
    }
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Azarine Bag</title>
    <?php include('lib/php/link.php') ?>
  </head>
  <body>
    <?php include('lib/php/navbarAdmin.php') ?>

    <div class="jumbotron jumbotron-fuild" style="border-radius: 0;top: 0;margin-bottom: 0;background-image: url('lib/img/background.jpg'); background-size: cover; height: 20rem;">
      <div class="container text-center">
        <h1 style="color: #ffffff; font-family: 'Patrick Hand', cursive; font-size: 50px; padding-top: 5rem;">Admin Panel</h1>
      </div>
    </div>
    <div class="container-fuild">
      <div class="alert alert-primary row text-center">
        <div class="col-sm pt-1">
          <a href="login.php" class="nav-item nav-link">Tambah Data</a>
        </div>
        <div class="col-sm pt-1">
          <a href="login.php" class="nav-item nav-link">Update Data</a>
        </div>
        <div class="col-sm pt-1">
          <a href="login.php" class="nav-item nav-link">Hapus Data</a>
        </div>
        <div class="col-sm pt-1">
          <a href="login.php" class="nav-item nav-link">Laporan Stok</a>
        </div>
      </div>
    </div>
    <?php include('lib/php/footer.php') ?>
    <?php include('lib/php/link2.php') ?>
  </body>
</html>
