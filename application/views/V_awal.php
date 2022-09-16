<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Selamat Datang <br> Di PAKARRU</h1>
        <p class="lead">Sistem Pakar Paru-Paru <br> Menggunakan Metode Case Based Reasoning</p>

        <?php if(empty($cekSession)){?>
        <a href="<?php echo base_url('login'); ?>" class="btn btn-sm btn-outline-success"><i
                class="fas fa-question-circle"></i> Diagnosa</a>
        <?php }else{?>
        <a href="<?php echo base_url('konsultasi'); ?>" class="btn btn-sm btn-outline-success"><i
                class="fas fa-question-circle"></i> Diagnosa</a>
        <?php }?>

    </div>
</div>

<!-- Container -->
<div class="container">
    <!-- Informasi Pertumbuhan -->
    <div class="row informasi">
        <div class="col">
            <img src="<?= base_url('assets/img/informasi.png'); ?>" alt="infopertumbuhan" class="img-fluid">
        </div>
        <div class="col ml-2">
            <h3>Apa Itu <span>PAKARRU</span>?</h3>
            <p>PAKARRU merupakan sebuah sistem yang dapat membantu pengguna atau orang - orang dalam berkonsultasi
                tentang paru-paru.</p>
        </div>
    </div>
    <!-- End Of -->

</div>
<!-- End Of Container -->


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
