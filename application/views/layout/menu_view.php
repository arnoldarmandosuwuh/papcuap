  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo base_url("index.php/beranda") ?>">papcuap</a>

    <label style="color:white"> User: <?php echo $this->session->userdata('username'); ?> </label>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="<?php echo base_url("index.php/autentikasi/logout") ?>">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>


          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Aktifitas</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("index.php/beranda") ?>">
                <span data-feather="file-text"></span>
                Beranda
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("index.php/cuap") ?>">
                <span data-feather="file-text"></span>
                Cuap Cuap
              </a>
            </li>
          </ul>


          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Pengaturan</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("index.php/profil") ?>">
                <span data-feather="file-text"></span>
                Profil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url("index.php/ganti_password") ?>">
                <span data-feather="file-text"></span>
                Ganti Password
              </a>
            </li>
          </ul>


        </div>
      </nav>