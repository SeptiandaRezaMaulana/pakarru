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
            <input id="idf" value="1" type="hidden" />
            <div class="row">
               <div class="col-md-12">
                  <label for="exampleFormControlSelect1">Nama Penyakit</label>
                  <div class="input-group mb-3">
                     <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Penyakit</label>
                     </div>
                     <select class="custom-select" id="status" name="status">
                        <option value="" selected>Pilih Status...</option>
                        <?php foreach ($status as $row) { ?>
                           <option value="<?= $row['id_penyakit']; ?>"><?= $row['id_penyakit']; ?> - <?= $row['nama_penyakit']; ?></option>
                        <?php }; ?>
                     </select>
                  </div>
                  <?= form_error('status', '<small class="text-danger">', '</small><br><br>'); ?>
               </div>

               <div class="col-md-12 mb-4">
                  <button type="button" class="btn btn-sm btn-outline-primary" onclick="tambahGejala(); return false;"><i class="fas fa-plus"></i> Tambah Gejala</button>
               </div><br>

               <div class="col-md-12 mb-3" id="divGejala"></div>

               <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-paper-plane"></i> Simpan</button>
                  <a href="<?= base_url('klasifikasi'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-undo-alt fa-sm text-white-50"></i> Kembali</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->