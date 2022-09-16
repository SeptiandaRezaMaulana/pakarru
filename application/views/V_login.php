<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login PAKARRU</h1>
                                        <span class="text-gray-600 mb-4">Sign in to start your session</span><br><br>
                                    </div>

                                    <?= $this->session->flashdata('info'); ?>

                                    <form class="user" method="post" action="<?= base_url('Login/auth'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="nama"
                                                name="nama" placeholder="Masukkan Username . ."
                                                value="<?= set_value('nama'); ?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Masukkan Password . .">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <a href="<?= base_url('Registerpasien')?>">Belum punya akun? Silahkan registrasi!!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>