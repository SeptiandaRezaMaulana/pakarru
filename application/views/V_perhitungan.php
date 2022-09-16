<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sub_judul; ?> untuk pasien :
            <?php echo $this->session->userdata("nama"); ?></h1>
        <a href="<?= base_url('konsultasi'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-undo-alt fa-sm text-white-50"></i> Kembali</a>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-8 mb-2">
            <div class="card shadow mb-4 alert">
                <?php
                // Nilai Perhitungan Terbesar
                $max = max(array_column($final, 'hasil'));
                $key = array_search($max, array_column($final, 'hasil'));
				$this->session->set_userdata('namaPenyakit', $final[$key]['nama_penyakit']);
                ?>
                <h5 class="mt-3" style="font-weight:lighter; font-size:17px; text-transform:uppercase">Hasil yang
                    Didapat,
                    <span style="font-weight:bold" class="text-success ml-3">Status
                        <?= $final[$key]['nama_penyakit']; ?> </span>
                </h5>

                <h5 style="font-weight:lighter; font-size:17px; text-transform:uppercase">
                    Dengan Nilai Analisa Sebesar <span class="text-primary ml-3"
                        style="font-weight:bold"><?= $final[$key]['hasil'] * 100; ?> %</span>
                </h5>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 col-md-8 mb-2">
                <input id="show-btn" title="Lihat Hasil Perhitungan" type="button" value="Hasil Perhitungan"
                    class="btn btn-outline-primary" onclick="lihathasil()">

                <input id="hide-btn" title="Tutup Hasil Perhitungan" type="button" value="Tutup Perhitungan"
                    class="btn btn-outline-primary" onclick="tutuphasil()">
            </div>

            <!-- Tabel Gejala Dipilih -->
            <div class="col-xl-6 col-md-8 mb-2">
                <div id="gejala-dipilih" class="card shadow mb-2">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Gejala Yang Dipilih</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama Gejala</th>
                                        <th scope="col">Bobot</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    $jum = 1;

                                    foreach ($ciri as $gejala) { ?>
                                    <?php
                                        $gej = $gejala;
                                        $row = $this->db->query("SELECT * FROM tb_gejala WHERE id_ciri = $gej")->row_array();
                                        ?>
                                    <tr>
                                        <td><?= $row['kode']; ?></td>
                                        <td><?= $row['nama_ciri']; ?></td>
                                        <td><?= $row['bobot']; ?></td>
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Basis Pengetahuan
        <div class="col-xl-12 col-md-8 mb-2">
            <div id="basis-kasus" class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">KASUS LAMA (Basis Penyakit)</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penyakit</th>
                                    <th>Kode Gejala</th>
                                    <th>Nama Gejala</th>
                                    <th>Bobot</th>
                                </tr>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                $no = 1;
                                $jum = 1;
                                $str_umur = "";
                                foreach ($klas as $row) {
                                    $usia_stat = strstr(str_replace(" ", "", strtolower($row["nama_penyakit"])), trim(strtolower($str_umur)));

                                    if ($usia_stat != false) {
                                ?>
                                    <tr>
                                        <?php if ($jum <= 1) { ?>
                                            <td align="center" rowspan="<?= $row['jumlah']; ?>"><?= $no++; ?></td>
                                            <td rowspan="<?= $row['jumlah']; ?>"><?= $row['nama_penyakit'] ?></td>
                                            <?php $jum = $row['jumlah']; ?>
                                        <?php } else { ?>
                                            <?php $jum = $jum - 1; ?>
                                        <?php } ?>

                                        <td><?= $row['kode']; ?></td>
                                        <td><?= $row['nama_ciri']; ?></td>
                                        <td><?= $row['bobot']; ?></td>
                                    </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->

            <!-- Tabel Hasil Perhitungan Similarity -->
            <div class="col-xl-12 col-md-8 mb-2">
                <div id="hasil-konsul" class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Hasil Perhitungan Similarity Value</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kasus</th>
                                        <th scope="col">Jumlah Gejala Sama</th>
                                        <th scope="col">Jumlah Gejala Kasus</th>
                                        <th scope="col">Jumlah Gejala Dipilih</th>
                                        <th scope="col">Bobot Gejala Sama</th>
                                        <th scope="col">Bobot Gejala Kasus</th>
                                        <th scope="col">Hasil</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    // Tampilkan ke tabel
                                    foreach ($final as $row) {
                                        $usia_stat = strstr(str_replace(" ", "", strtolower($row["nama_penyakit"])), trim(strtolower($str_umur)));
                                        //echo str_replace(" ","",strtolower($row["nama_penyakit"]));
                                        //echo trim(strtolower(trim($str_umur)));
                                        if ($usia_stat != false) {
                                    ?>
                                    <tr>
                                        <strong>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_penyakit'] ?></td>
                                            <td><?= $row['jml_cocok']; ?></td>
                                            <td><?= $row['jml_gejala']; ?></td>
                                            <td><?= $row['jml_dipilih']; ?></td>
                                            <td><?= $row['bobot_sama']; ?></td>
                                            <td><?= $row['total_bobot']; ?></td>
                                            <td><?= $row['hasil']; ?></td>
                                        </strong>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="<?= base_url('informasi'); ?>"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-undo-alt fa-sm text-white-50"></i> Lihat Masukan Dokter</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-success mt-4">
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
