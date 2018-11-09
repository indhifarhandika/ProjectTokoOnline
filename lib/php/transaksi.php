<?php $result = mysqli_query($conn, 'SELECT transaksi.id_transaksi, member.nama, member.alamat, transaksi.id_barang, transaksi.total_barang, transaksi.tgl, transaksi.status FROM transaksi, member WHERE transaksi.id_user = member.id_user'); ?>
<h1 class="text-center mb-3">Transaksi</h1>
<table class="table table-hover table-dark" style="overflow: auto;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode Transaksi</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Kode Barang</th>
        <th scope="col">Total Barang</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Status</th>
      </tr>
  </thead>
  <tbody>
    <?php $count = 1; while ($rows = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <th><?php echo $count; $count++ ?></th>
        <td><?php echo $rows['id_transaksi']; ?></td>
        <td><?php echo $rows['nama']; ?></td>
        <td><?php echo $rows['alamat']; ?></td>
        <td><?php echo $rows['id_barang']; ?></td>
        <td><?php echo $rows['total_barang']; ?></td>
        <td><?php echo $rows['tgl']; ?></td>
        <td><?php echo $rows['status']; ?></td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>
<form class="" action="" method="post" id="form2">
  <div class="input-group mb-3 pl-2" style="width: 20rem;">
    <input type="text" class="form-control" placeholder="Kode Transaksi" name="status" aria-label="Konfirmasi" aria-describedby="konfirmasi" required>
    <div class="input-group-append">
      <button onclick="konfirmasi()" class="btn btn-outline-secondary" type="submit" id="konfirmasi" name="konfirmasi" form="form2">Konfirmasi</button>
    </div>
  </div>
</form>
