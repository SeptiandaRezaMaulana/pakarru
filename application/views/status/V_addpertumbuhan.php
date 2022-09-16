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
            <form class="form-group" method="post" action="">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Id Penyakit</label>
                            <input readonly type="text" class="form-control col-md-lg" name="id_penyakit" id="id_penyakit" value="<?= $id_penyakit; ?>">
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama Penyakit</label>
                                <input type="text" class="form-control col-md-lg" name="status" id="status" value="<?= set_value('status'); ?>">

                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Solusi</label>
                            <textarea type="text" rows="4" class="form-control col-md-lg" name="solusi" id="solusi" value="<?= set_value('solusi'); ?>"></textarea>

                            <?= form_error('solusi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= base_url('pertumbuhan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-undo-alt fa-sm text-white-50"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->