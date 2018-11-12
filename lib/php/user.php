<?php $user = query('SELECT username, nama, email, alamat FROM member'); ?>
<h1 class="text-center mb-3 warna-campur" style="font-family: 'Gugi', cursive;">User yang terdaftar</h1>
<table class="table table-hover table-dark" style="overflow: auto;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Username</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Alamat</th>
      </tr>
  </thead>
  <tbody>
    <?php $count = 1; foreach ($user as $rows) : ?>
      <tr>
        <th><?php echo $count; $count++ ?></th>
        <td><?php echo $rows['username']; ?></td>
        <td><?php echo $rows['nama']; ?></td>
        <td><?php echo $rows['email']; ?></td>
        <td><?php echo $rows['alamat']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
