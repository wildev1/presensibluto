<?php $this->load->view('layout/header'); ?>
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                        <div class="row">
                            <div class="col-lg-4 col-6 mb-4">
                                <div class="small-box text-bg-primary h-100">
                                    <div class="inner">
                                        <h3>*</h3>
                                        <p>Profil Pegawai</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>   
                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"></path>
                                    </svg>
                                    <a href="#profilpegawai" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                        Kunjungi Profil <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6 mb-4">
                                <div class="small-box text-bg-success h-100">
                                    <div class="inner">
                                        <h3>*</h3>
                                        <p>Absen Apelmu</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"> 
                                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0"/>
                                    </svg>
                                    <a href="#absenapel" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                        Absen Apel <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6 mb-4">
                                <div class="small-box text-bg-warning h-100">
                                    <div class="inner">
                                        <h3>*</h3>
                                        <p>Absen Kerja</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0"/>
                                    </svg>
                                    <a href="#AbsenKerja" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                        Absen Kerja <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6 mb-4">
                                <div class="small-box text-bg-danger h-100">
                                    <div class="inner">
                                        <h3>*</h3>
                                        <p>Laporan Pekerjaan</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>
                                    </svg>
                                    <a href="#laporanpekerjaan" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                        Laporan Pekerjaan <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6 mb-4">
                                <div class="small-box text-bg-info h-100">
                                    <div class="inner">
                                        <h3>*</h3>
                                        <p>Lapor Izin</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>
                                    </svg>
                                    <a href="#laporIzin" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                        Lapor Izin <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-6 mb-4">
                                <div class="small-box text-bg-secondary h-100">
                                    <div class="inner">
                                        <h3>*</h3>
                                        <p>Rekap Presensi</p>
                                    </div>
                                    <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/>
                                    </svg>
                                    <a href="#rekapPresensi" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                        Rekap Presensi <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!--end::Col-->
                </div> <!--end::Row--> <!--begin::Row-->
</div> <!--end::Container-->
</div> <!--end::App Content-->


<?php $this->load->view('layout/footer'); ?>