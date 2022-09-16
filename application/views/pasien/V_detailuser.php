<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
    </div>

    <!-- notifikasi -->
    <?= $this->session->flashdata('info'); ?>

    <!-- Data Penyakit -->
    <?php                            
foreach ($detail as $row) { 
?>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Data User <?= $row['nama']; ?></h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <p class="card-text text-justify"><b>ID User : <?= $row['id']; ?></b></p>
                <p class="card-text text-justify"><b>Email : <?= $row['email']; ?></b></p>
                <p class="card-text text-justify"><b>Nama : <?= $row['nama']; ?></b></p>
                <p class="card-text text-justify"><b>Umur : <?= $row['umur_pasien']; ?></b></p>
            </div>
        </div>

    </div>

    <?php } ?>

</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->