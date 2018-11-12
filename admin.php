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
    }elseif (isset($_POST['insert'])) {
      if (tambah($_POST) > 0) {
        echo "<script>alert('Data berhasil di tambah')</script>";
      }else {
        echo "<script>alert('Data gagal di tambah')</script>";
      }
    }elseif (isset($_POST['iya2'])) {
      update($_POST);
    }elseif (isset($_POST['iya'])) {
      hapus($_POST);
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Azarine Bag</title>
    <meta name="author" content="INDHI FARHANDIKA">
    <?php include('lib/php/link.php') ?>
    <script type="text/javascript">
      function info() {
        alert("OKE");
      }
    </script>
  </head>
  <body style="background-color: #112233;">
    <?php include('lib/php/navbarAdmin.php') ?>

    <div class="jumbotron jumbotron-fuild" style="border-radius: 0;top: 0;margin-bottom: 0;background-image: url('lib/img/background.jpg'); background-size: cover; height: 20rem;">
      <div class="container text-center">
        <h1 class="text-3d" style="font-family: 'Gugi', cursive; font-size: 4rem; padding-top: 5rem;">Admin Panel</h1>
      </div>
    </div>
    <div class="container-fuild">
      <div class="alert bg-dark row text-center" style="margin-right: 0;">
        <div class="col-sm pt-1">
          <a href="" class="nav-item nav-link text-white font-weight-bold" data-toggle="modal" data-target="#FormInsert">Tambah Data</a>
          <!-- Form Insert Data -->
          <div class="modal fade" id="FormInsert" tabindex="-1" role="dialog" aria-labelledby="FormInsert" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="FormInsertLabel">Tambah Data Barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="" action="" method="post" id="form1">
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                       <span class="input-group-text" for="kodeBarang">Kode Barang</span>
                     </div>
                      <input type="text" name="kodeBarang" value="" class="form-control" id="kodeBarang" placeholder="TAS100" required>
                    </div>
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="jenisBarang">Jenis Barang</label>
                      </div>
                      <select class="custom-select" id="jenisBarang" name="jenisBarang">
                        <option selected>Pilih</option>
                        <option value="Import">Barang Import</option>
                        <option value="Eksport">Barang Eksport</option>
                      </select>
                    </div>
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                       <span class="input-group-text" for="harga">Harga</span>
                     </div>
                      <input type="number" name="harga" value="" class="form-control" id="harga" placeholder="100000">
                    </div>
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                       <span class="input-group-text" for="totalBarang">Total Barang</span>
                      </div>
                      <input type="number" name="totalBarang" value="" class="form-control" id="totalBarang" placeholder="10">
                    </div>
                    <div class="form-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="gambar">Gambar</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGambar" name="gambar" aria-describedby="gambar">
                        <label class="custom-file-label" for="inputGambar">Klik</label>
                      </div>
                    </div>
                    <div class="form-group text-center pt-4" style="border-top: 1px solid #e9ecef;">
                      <button type="submit" name="insert" class="btn btn-outline-primary" form="form1">Tambah</button>
                      <button type="submit" name="update" class="btn btn-outline-primary mr-4 ml-4" form="form1">Update</button>
                      <button type="submit" name="delete" class="btn btn-outline-primary" form="form1">Hapus</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End -->
        </div>
        <div class="col-sm pt-1">
          <a href="admin.php?user=true" class="nav-item nav-link text-white font-weight-bold">User</a>
        </div>
        <div class="col-sm pt-1">
          <a href="admin.php?transaksi=true" class="nav-item nav-link text-white font-weight-bold">Transaksi</a>
        </div>
        <div class="col-sm pt-1">
          <a href="admin.php" class="nav-item nav-link text-white font-weight-bold">Laporan Stok</a>
        </div>
      </div>
      <?php if (isset($_GET['user'])) {
        include 'lib/php/user.php';
      }elseif (isset($_GET['transaksi'])) {
        include 'lib/php/transaksi.php';
      }else {
        include 'lib/php/stok.php';
      } ?>
    </div>
    <?php include('lib/php/footer.php') ?>
    <?php include('lib/php/link2.php') ?>
  </body>
</html>
