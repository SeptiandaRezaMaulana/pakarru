<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
    </div>

    <!-- notifikasi -->

    <?php                            
foreach ($detail as $row) { ?>
    <!-- Data Penyakit -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Data User <?= $row['nama']; ?></h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <?= $this->session->flashdata('info'); ?>
                <?php echo validation_errors(); ?>
                <form class="form-group" method="post" action="">
                    <p class="card-text text-justify"><b>Password Baru </b><br />
                        <input type="password" class="form-control col-md-4" name="password" id="password">
                    </p>
                    <p class="card-text text-justify"><b>Konfirmasi Lagi Password Baru </b><br />
                        <input type="password" class="form-control col-md-4" name="confirmpassword"
                            id="confirmpassword">
                    </p>
                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-paper-plane"></i> Ganti
                        Password</button>
                </form>
            </div>
        </div>

    </div>
    <?php } ?>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->