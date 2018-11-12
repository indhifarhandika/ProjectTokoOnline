<?php $transaksi = query('SELECT transaksi.id_transaksi, member.nama, member.alamat, transaksi.id_barang, transaksi.total_barang, transaksi.tgl, transaksi.status FROM transaksi, member WHERE transaksi.id_user = member.id_user'); ?>
<h1 class="text-center mb-3 warna-campur" style="font-family: 'Gugi', cursive;">Transaksi</h1>
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
    <?php $count = 1; foreach ($transaksi as $rows) : ?>
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
    <?php endforeach; ?>
  </tbody>
</table>
<form class="d-flex justify-content-center" action="" method="post" id="form2">
  <div class="input-group mb-3 pl-2" style="width: 20rem;">
    <div class="input-group-append">
      <button style="border-top-left-radius: 5px; border-bottom-left-radius: 5px;" class="btn btn-outline-light" type="button" id="hapus" data-toggle="modal" data-target="#modalHapus">Hapus</button>
      <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4>Apakah anda yakin ?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary" name="iya" form="form2">Iya</button>
            </div>
          </div>
        </div>
      </div>
    <input type="text" class="form-control" placeholder="Kode Transaksi" name="status" aria-label="Konfirmasi" aria-describedby="konfirmasi" autocomplete="off" required>
    <div class="input-group-append">
      <button class="btn btn-outline-light" type="button" id="konfirmasi" form="form2" data-toggle="modal" data-target="#modalKonfirmasi">Konfirmasi</button>
      <div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <h4>Apakah anda yakin ?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary" name="iya2" form="form2">Iya</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</form>
