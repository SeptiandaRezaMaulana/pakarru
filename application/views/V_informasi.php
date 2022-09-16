<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4"><?= $sub_judul; ?></h1>
        <p class="lead">Informasi Penyakit <br> Menggunakan Metode CBR (Case Based Reasoning)</p>
        <a href="<?php echo base_url('konsultasi'); ?>" class="btn btn-sm btn-outline-success"><i
                class="fas fa-question-circle"></i> Mulai Konsultasi</a>
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row content-justify-center">
        <div class="col-lg-12 info-panel">
            <!-- Tabel Informasi Penyakit -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyakit</th>
                            <th>Solusi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$str_umur="";
                        $no = 1;
						
                        foreach ($macam as $row) { 
						if($this->session->userdata("nama"))
						{
								$usia_stat = strstr(str_replace(" ","",strtolower($row["nama_penyakit"])),trim(strtolower($str_umur)));
						}
								if($usia_stat!=false){
						?>
                        <tr>

                            <?php if ($this->session->userdata("namaPenyakit") == $row['nama_penyakit']) {?>
                            <td><?= $no++; ?></td>
                            <td style="font-weight:"><?= $row['nama_penyakit']; ?></td>
                            <td><?= $row['solusi']; ?></td>
                            <?php }else {?>
                            <?php }?>

                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-success mt-5">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; PAKARRU 2022 | Credit By : Septianda Reza Maulana</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>

        </div>
    </div>
</div>