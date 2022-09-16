<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?></h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $sub_judul; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">

                <div class="form-group">
                    <label for="formGroupExampleInput">Nama Penyakit</label>
                    <input type="text" class="form-control col-md-lg" name="status" id="status"
                        value="<?php echo $konsultasi['nama_penyakit'] ?>" readonly>
                </div>

                <form class="form-group" method="post" action="<?php echo base_url('konsultasi/prosesEdit') ?>">
                    <label for="formGroupExampleInput">Gejala</label>
                    <?php
                    $no = 1;
                    foreach ($ciri as $row) { ?>
                    <input type="hidden" name="id" value="<?php echo $id_hasil_konsultasi ?>">

                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <?php if (strpos($id_ciri, $row['id_ciri']) !== false) : ?>
                                <input type="checkbox" name="ciri[]" id="ciri[]" value="<?= $row['id_ciri']; ?>"
                                    checked>
                                <?php else : ?>
                                <input type="checkbox" name="ciri[]" id="ciri[]" value="<?= $row['id_ciri']; ?>">
                                <?php endif ?>
                            </div>
                        </div>
                        <input readonly type="text" name="labelciri" class="form-control"
                            value="<?= $row['nama_ciri']; ?>">
                    </div>
                    <?php } ?>
                    <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fas fa-paper-plane"></i>
                        Simpan</button>
                    <a href="<?= base_url('konsultasi/hasil_konsultasi'); ?>"
                        class="mt-2 d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-undo-alt fa-sm text-white-50"></i> Kembali</a>
                    <br><br>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->