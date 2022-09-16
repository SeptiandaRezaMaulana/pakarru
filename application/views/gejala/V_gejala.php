<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
        <a href="<?= base_url('gejala/tambah'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm"></i> Tambah</a>
    </div>

    <!-- <?//= $this->session->flashdata('info'); ?> -->

    <?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->flashdata('success'); ?>
    </div>

    <?php } else if($this->session->flashdata('error')){  ?>

    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
    </div>
    <?php }?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Gejala</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id Gejala</th>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($ciri as $row) { ?>
                        <tr>

                            <td><?= $no++; ?></td>
                            <td><?= $row['kode']; ?></td>
                            <td><?= $row['nama_ciri']; ?></td>
                            <td><?= $row['bobot']; ?></td>
                            <td>
                                <a href="<?= base_url('gejala/edit/' . $row['id_ciri']) ?>"
                                    class="btn btn-circle btn-outline-primary"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('gejala/hapus/' . $row['id_ciri']) ?>"
                                    class="btn btn-circle btn-outline-danger"
                                    onclick="return confirm('Anda yakin menghapus data ini ?');"><i
                                        class="fas fa-trash"></i></a>
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