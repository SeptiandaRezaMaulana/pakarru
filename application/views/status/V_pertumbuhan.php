<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
        <a title="Tambah Data" href="<?= base_url('pertumbuhan/tambah'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"></i> Tambah</a>
    </div>

    <?= $this->session->flashdata('info'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $sub_judul; ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Solusi</th>
                            <th style="width:100px">Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($macam as $row) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['id_penyakit']; ?></td>
                                <td><?= $row['nama_penyakit']; ?></td>
                                <td><?= $row['solusi']; ?></td>
                                <td>
                                    <a title="Edit Data" href="<?= base_url('pertumbuhan/edit/') . $row['id_penyakit']; ?>" class="btn btn-circle btn-outline-primary"><i class="fas fa-edit"></i></a>

                                    <a title="Hapus Data" href="<?= base_url('pertumbuhan/hapus/') . $row['id_penyakit']; ?>" class="btn btn-circle btn-outline-danger" onclick="return confirm('Anda yakin menghapus data ini ?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->