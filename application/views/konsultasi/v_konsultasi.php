<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
  </div>

  <?= $this->session->flashdata('info'); ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tabel Data konsultasi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nama</th>
              <th>Kode Gejala</th>
              <th>Hasil</th>
              <th>Penyakit</th>
              <th>Tanggal Periksa</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $no = 1;
            foreach ($hasil_konsultasi as $row) {
            ?>
              <tr>

                <td><?= $no++; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['kode']; ?></td>
                <td><?php echo $row['hasil']; ?></td>
                <td><?php echo $row['nama_penyakit']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td>
                  <a href="<?php echo base_url('konsultasi/verifikasi/') . $row['id'] ?>" class="btn btn-success">Verifikasi</a>
                  <button class="btn btn-secondary">Detail</button>
                  <a href="<?= base_url('konsultasi/edit/') . $row['id'] ?>" class="btn btn-primary">Edit</a>
                  <a href="<?= base_url('konsultasi/hapus/' . $row['id']) ?>" class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ini ?');">Hapus</a>
                </td>
              </tr>
            <?php }; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->