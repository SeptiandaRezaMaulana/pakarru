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
                <form class="form-group" method="post" action="">
                     <div class="form-group">
                        <label for="formGroupExampleInput">Kode Gejala</label><br>
                        <small class="text-danger">Masukkan Kode Gejala</small>
                        <input type="text" class="form-control col-md-4" name="kode" id="kode" placeholder="Kode Gejala" value="<?= 
                            set_value('gejala'); ?>">
                        <?= form_error('kode', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Gejala</label>
                        <input type="text" class="form-control" name="gejala" id="gejala" placeholder="Masukan Nama Gejala" value="<?= set_value('gejala'); ?>">
                        <?= form_error('gejala', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Bobot</label><br>
                        <small class="text-danger">Masukkan Nilai dari 1 - 5 !</small>
                        <input type="number" class="form-control col-md-4" name="bobot" id="bobot" placeholder="Nilai Bobot" value="<?= set_value('gejala'); ?>">
                        <?= form_error('bobot', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
                    <a href="<?= base_url('gejala'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-undo-alt fa-sm text-white-50"></i> Kembali</a>
                    <br><br>

                    <div class="form-group">
                        <span class="text-danger">* Semakin besar nilai bobot, semakin besar pengaruh gejala terhadap penyakit.</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->