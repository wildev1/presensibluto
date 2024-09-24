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
                          <a class="nav-link  arrow-none" href="<?php echo base_url('/profile');?>" id="topnav-dashboard"
                              aria-expanded="false">
                              <i class="mdi mdi-account mr-2"></i>Profil </a>
                      </li>
					  
							
					  <?php if ($this->session->userdata('role') == 'Admin'): ?>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-server-network mr-2"></i>Data Master<div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                              <a href="<?php echo base_url('/lembaga');?>" class="dropdown-item">Profil Instansi </a>
                              <div class="dropdown">
                                  <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Data Referensi <div class="arrow-down"></div>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="topnav-email">
                                      <a href="<?php echo base_url('/statuspegawai');?>" class="dropdown-item">Status Kepegawaian</a>
                                      <a href="<?php echo base_url('/shift');?>" class="dropdown-item">Jam Kerja</a>
                                      <!-- <a href="<?php echo base_url('/shiftGroup');?>" class="dropdown-item">Data Shift Group</a> -->
                                      <a href="<?php echo base_url('/groupShift');?>" class="dropdown-item">Jadwal Kerja</a>
                                     <a href="<?php echo base_url('/usersShiftGroup');?>" class="dropdown-item">Jadwal Pegawai</a>
                                      <a href="#" class="dropdown-item">Kategori Perizinan</a>
                                  </div>
                              </div>
                              <div class="dropdown">
                                  <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Manajemen Data <div class="arrow-down"></div>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="topnav-email">
                                     <a href="<?php echo base_url('/karyawan');?>" class="dropdown-item">Data Pegawai</a>
                                     <a href="<?php echo base_url('/laporan');?>" class="dropdown-item">Laporan Presensi</a>
                                     <a href="<?php echo base_url('/laporan/personal');?>" class="dropdown-item">Laporan Personal</a>
                                     <a href="<?php echo base_url('/presensi/addpresensi');?>" class="dropdown-item">Add Presensi</a>
                                     <!-- <a href="<?php echo base_url('/alumni');?>" class="dropdown-item">Laporan Presensi</a> -->
                                     <!-- <a href="<?php echo base_url('/kartusantri');?>" class="dropdown-item">Laporan Perizinan</a> -->
                                  </div>
                              </div>
                          </div>
                      </li>				  
					  <?php endif; ?>

					   <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="mdi mdi-account-key mr-2"></i>Manajemen Presensi <div class="arrow-down"></div>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                              <a href="<?php echo base_url('/kinerja');?>" class="dropdown-item">Laporan Kinerja</a>
                              <a href="#" class="dropdown-item">Perizinan</a>
                              <a href="#" class="dropdown-item">Rekap Presensi</a>
                          </div>
                      </li>
					  
					  <?php if ($this->session->userdata('role') == 'Admin'): ?>				  
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
					  <?php endif; ?>


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
