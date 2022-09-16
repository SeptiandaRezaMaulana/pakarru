<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
    </div>

    <!-- notifikasi -->
    <?= $this->session->flashdata('info'); ?>

    <!-- Data Penyakit -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Data Penyakit <?= $status['nama_penyakit']; ?></h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <h5 class="card-title"><strong><?= $status['nama_penyakit']; ?></strong></h5>
                <p class="card-text text-justify"><b>ID Penyakit : <?= $status['id_penyakit']; ?></b></p>
                <p class="card-text text-justify"><?= $status['solusi']; ?></p>
            </div>
        </div>
    </div>

  

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
        <a href="<?= base_url('klasifikasi'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-undo-alt fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- Detail Gejala -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Detail Gejala</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Gejala</th>
                                <th>Bobot</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($detail as $row) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['kode']; ?></td>
                                    <td style="font-weight:lighter"><?= $row['nama_ciri']; ?></td>
                                    <td><?= $row['bobot']; ?></td>
                                    <td>
                                        <a title="Hapus Gejala" href="<?= base_url('klasifikasi/hapusGejala/') . $row['id_penyakit'] . '/' . $row['id_ciri']; ?>" class="btn btn-circle btn-outline-danger" onclick="return confirm('Anda yakin menghapus data ini ?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->