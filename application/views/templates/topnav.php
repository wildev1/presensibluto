  <div class="topnav">
      <div class="container-fluid">
          <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

              <div class="collapse navbar-collapse" id="topnav-menu-content">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link  arrow-none" href="<?php echo base_url('/dashboard');?>"
                              id="topnav-dashboard" role="button" aria-expanded="false">
                              <i class="mdi mdi-home-variant mr-2"></i>Dashboard </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link  arrow-none" href="<?php echo base_url('/profil');?>" id="topnav-dashboard"
                              aria-expanded="false">
                              <i class="mdi mdi-account mr-2"></i>Profil </a>
                      </li>

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-server-network mr-2"></i>Data Master<div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                              <a href="<?php echo base_url('/lembaga');?>" class="dropdown-item">Profil Lembaga </a>
                              <div class="dropdown">
                                  <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Data Referensi <div class="arrow-down"></div>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="topnav-email">
                                      <a href="<?php echo base_url('/tahunajaran');?>" class="dropdown-item">Tahun Ajaran</a>
                                      <a href="<?php echo base_url('/rayon');?>" class="dropdown-item">Data Rayon</a>
                                      <a href="<?php echo base_url('/persentase');?>" class="dropdown-item">Persentase Tagihan</a>
                                  </div>
                              </div>
                              <div class="dropdown">
                                  <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Manajemen Santri <div class="arrow-down"></div>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="topnav-email">
                                     <a href="<?php echo base_url('/santri');?>" class="dropdown-item">Data Santri</a>
                                     <a href="<?php echo base_url('/alumni');?>" class="dropdown-item">Data Alumni</a>
                                     <a href="<?php echo base_url('/kartusantri');?>" class="dropdown-item">Kartu Santri</a>
                                  </div>
                              </div>
                          </div>
                      </li>

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-server-network mr-2"></i>Tagihan & Transaksi<div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                              <a href="<?php echo base_url('/tagihan');?>" class="dropdown-item">Tagihan Pembayaran</a>
                              <a href="<?php echo base_url('/laporan');?>" class="dropdown-item">Laporan Keuangan</a>
                              <a href="<?php echo base_url('/limit');?>" class="dropdown-item">Limit Penarikan</a>
                          </div>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-account-key mr-2"></i>Admin App <div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                              <a href="<?php echo base_url('/users');?>" class="dropdown-item">Data Users</a>
                              <a href="<?php echo base_url('/roles');?>" class="dropdown-item">Roles</a>
                              <a href="<?php echo base_url('/permission');?>" class="dropdown-item">Hak Akses</a>
                              <a href="<?php echo base_url('/rolespermission');?>" class="dropdown-item">Roles & Hak Akses</a>
                          </div>
                      </li>

                  </ul>
              </div>
          </nav>
      </div>
  </div>

  <div class="main-content">
      <div class="page-content">
          <div class="container-fluid">

              <!-- start page title -->
              <div class="row">
                  <div class="col-12">
                      <div class="page-title-box d-flex align-items-center justify-content-between">
                          <h4 class="mb-0 font-size-18"><?php echo $title?></h4>

                          <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                  <li class="breadcrumb-item active"><?php echo $title?></li>
                              </ol>
                          </div>

                      </div>
                  </div>
              </div>
              <!-- end page title -->
