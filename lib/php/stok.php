<?php $stok = query("SELECT * FROM stok"); ?>
<h1 class="text-center mb-3 warna-campur" style="font-family: 'Gugi', cursive;">Laporan Stok</h1>
<table class="table table-hover table-dark table-responsive-sm" style="overflow: auto;">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode Barang</th>
        <th scope="col">Jenis Barang</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Gambar</th>
        <th scope="col">Tanggal Update</th>
      </tr>
  </thead>
  <tbody>
    <?php $count = 1; foreach ($stok as $rows) : ?>
      <tr>
        <th><?php echo $count; $count++ ?></th>
        <td><?php echo $rows['id_barang']; ?></td>
        <td><?php echo $rows['jenis_barang']; ?></td>
        <td><?php echo $rows['harga']; ?></td>
        <td><?php echo $rows['total_barang']; ?></td>
        <td> <img src="lib/img/imgTas/<?php echo $rows['gambar']; ?>" style="height: 100px;"></td>
        <td><?php echo $rows['tgl_update']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
