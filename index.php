<!-- Project Toko Online -->
<?php
    require('lib/php/function.php');
    session_start();
  	if(!isset($_SESSION['username'])){
  		$username = "Anon";
  	}else{
  	  $username = $_SESSION['username'];  
    }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Azarine Bag</title>
    <!-- Import Link -->
    <?php include("lib/php/link.php") ?>
    <!-- End Import Link -->
  </head>
  <body>
    <!-- Import Navbar -->
    <?php
      if ( !isset($_SESSION['username']) ) {
        include('lib/php/navbar.php');
      }else{
        global $conn;
        $username = $_SESSION['username'];
        $result = mysqli_query($conn,"SELECT username FROM member WHERE status='admin'");
        $row = mysqli_fetch_assoc($result);
        if ( $username === $row['username'] ) {
          include('lib/php/navbarAdmin.php');
        }else{
          include('lib/php/navbarMember.php');
        }
      }
     ?>
    <!-- End Import Navbar -->
    <!-- Isi -->
    <div class="jumbotron jumbotron-fluid bgUtama">
      <div class="container mt-3">
        <h1 class="text-white text-center">Test</h1>
      </div>
    </div>
    <!-- End Isi -->
    <!-- Import Footer -->
    <?php include('lib/php/footer.php') ?>
    <!-- End Import Footer -->
    <!-- Import Link2 -->
    <?php include('lib/php/link2.php') ?>
    <!-- End Import Link2 -->
  </body>
</html>
