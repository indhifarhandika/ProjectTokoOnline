<?php
// Koneksi database
$conn = mysqli_connect('localhost','root','','db_toko_online');

function query($query) {
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ( $row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function hapus($data) {
  global $conn;

  $id_transaksi = $data['status'];
  $result = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE id_transaksi='$id_transaksi'");
  if (mysqli_num_rows($result) === 1) {
    echo "<script>alert('Kode Transaksi $id_transaksi berhasil dihapus')</script>";
    $result = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
  }else {
    echo "<script>alert('Kode Transaksi $id_transaksi tidak ada dalam daftar')</script>";
  }
}
function update($data) {
  global $conn;

  $id_transaksi = $_POST['status'];
  $result = mysqli_query($conn, "SELECT id_transaksi FROM transaksi WHERE id_transaksi='$id_transaksi'");
  if (mysqli_num_rows($result) === 1) {
    echo "<script>alert('Kode Transaksi $id_transaksi berhasil dihapus')</script>";
    $result = mysqli_query($conn, "UPDATE transaksi SET status='Terkirim' WHERE id_transaksi='$id_transaksi'");
  }else {
    echo "<script>alert('Kode Transaksi salah')</script>";
  }
}
function tambah($data) {
  global $conn;

  $id_barang = htmlspecialchars($data['kodeBarang']);
  $jenis_barang = htmlspecialchars($data['jenisBarang']);
  if ($jenis_barang === 'Import') {
    $jenis_barang = "Import";
  }else {
    $jenis_barang = "Eksport";
  }
  $harga = htmlspecialchars($data['harga']);
  $total_barang = htmlspecialchars($data['totalBarang']);
  $gambar = upload();
  if (!$gambar) {
    return false;
  }
  $result = mysqli_query($conn,"INSERT INTO barang VALUES ('$id_barang','$jenis_barang', '$harga', '$total_barang','$gambar',CURRENT_TIMESTAMP)");
  return mysqli_affected_rows($conn);
}
function upload() {
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];
  //Cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<secipt>
            alert('Pilih gambar terlebih dahulu');
          </script>";
    return false;
  }
  // Cek apakah yang diupload adalah gambar
  $typeGambarValid = ['jpeg','png','jpg'];
  $typeGambar = explode('.', $namaFile);
  $typeGambar = strtolower(end($typeGambar));
  if ( !in_array($typeGambar, $typeGambarValid) ) {
    echo "<secipt>
            alert('yang anda upload bukan Gambar');
          </script>";
    return false;
  }
  // Cek jika ukuran gambar terlalu besar
  if ($ukuranFile > 3000000) {
    echo "<secipt>
            alert('Ukuran gambar yang anda upload lebih dari 3Mb');
          </script>";
    return false;
  }
  // Lolos pengecekan upload gambar
  $namaFileNew = uniqid();
  $namaFileNew .= '.';
  $namaFileNew .= $typeGambar;
  move_uploaded_file($tmpName, 'lib/img/imgTas/' . $namaFileNew);

  return $namaFileNew;
}
function register($data) {
  global $conn;

  $username = strtolower(stripslashes($data['username']));
  $nama = $data['nama'];
  $email = $data['email'];
  $alamat = $data['alamat'];
  $password = mysqli_real_escape_string($conn, $data['password']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // Cek username ke database
  $result = mysqli_query($conn, "SELECT username FROM member WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo '<script> alert("Username telah terdaftar")';
    return false;
  }

  // Cek konfirmasi password
  if ($password !== $password2) {
    echo "<script>
      alert('Konfirmasi password tidak sesuai');
    </script>";
    return false;
  }
  // Enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Menambahkan user baru ke database
  mysqli_query($conn, "INSERT INTO member VALUES('','$username','$nama','$email','$alamat','$password','member')");

  return mysqli_affected_rows($conn);
}
 ?>
