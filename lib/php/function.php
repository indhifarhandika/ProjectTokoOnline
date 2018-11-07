<?php
// Koneksi database
$conn = mysqli_connect('localhost','root','','toko_online');

function query($query) {
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ( $row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
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
  $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

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
  mysqli_query($conn, "INSERT INTO users VALUES('','$username','$nama','$email','$alamat','$password','member')");

  return mysqli_affected_rows($conn);
}
 ?>
