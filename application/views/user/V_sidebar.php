<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-dark bg-info">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ml-auto">
                            <a class="nav-item nav-link" href="<?= base_url('Awal'); ?>">Home</a>
                            <?php if (!empty($this->session->userdata('nama'))){?>
                            <a class="nav-item nav-link" href="<?= base_url('Login/logout'); ?>">
                                Keluar</a>
                            <?php }?>
                            <!-- <?php if(!empty($this->session->userdata("nama"))) { ?><a class="nav-item nav-link" href="<?= base_url('registerpasien/logoutpasien'); ?>">Log out Pasien</a><?php } ?> -->
                        </div>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <?php if (empty($this->session->userdata('nama'))){?>
                        <a href="<?= base_url('login'); ?>" class="btn btn-sm btn-primary ml-3"><i
                                class="fas fa-user"></i> LOGIN</a>
                        <?php }?>



                    </div>
                </nav>
