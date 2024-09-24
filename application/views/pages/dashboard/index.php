<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-primary fade show" align="justify" role="alert">
            <div class="media">
                <div class="mr-3">
                    <img src="<?php echo base_url('upload/photo/'.$user->photo); ?>" alt=""
                        class="avatar-sm rounded-circle img-thumbnail">
                </div>
                <div class="media-body align-self-center">
                    <div class="text-muted">
                        <h6 class="mb-1"><?php echo $user->nama; ?></h6>
                        <small class="text-muted mb-0"><i class="mdi mdi-circle text-success align-middle mr-1"></i><?php echo $user->roles; ?></small>
                    </div>
                </div>
            </div>
            <hr>
            <p class="card-text">Selamat datang di <b>E-SiP</b>, sistem informasi yang dirangcang khusus untuk
                memfasilitasi karyawan dalam proses presensi.</p>
        </div>
    </div>
</div>



        <div class="row">
            <div class="col-md-6">
				<a href="<?php echo base_url('/profile');?>">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Data Profile</p>
                                <h6 class="mb-0 text-primary">Profile Karyawan</h6>
                            </div>

                            <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                <span class="avatar-title">
                                    <i class="bx bx-user font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
				</a>
            </div>
            <div class="col-md-6">
				<a href="<?php echo base_url('/presensi/addpresensi');?>">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Presensi</p>
                                <h6 class="mb-0 text-primary">Absen Kerja</h6>
                            </div>

                            <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                <span class="avatar-title">
                                    <i class="bx bx-check-circle font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
				</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
				<a href="<?php echo base_url('/dosen');?>">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Dosen</p>
                                <h6 class="mb-0">sa</h6>
                            </div>

                            <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                <span class="avatar-title">
                                    <i class="bx bx-hourglass font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
				</a>
            </div>
            <div class="col-md-6">
				<a href="<?php echo base_url('/mahasiswa');?>">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted font-weight-medium">Mahasiswa</p>
                                <h6 class="mb-0">s</h6>
                            </div>

                            <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                <span class="avatar-title">
                                    <i class="bx bx-hourglass font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
				</a>
            </div>
        </div>
