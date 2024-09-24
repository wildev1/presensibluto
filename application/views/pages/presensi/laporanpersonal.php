<div class="row">
        <div class="col-xl-3">
            <div class="card  bg-soft-primary">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
								<a target="_blank" href="<?php echo site_url('admin/dosen/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
                        </div>
                        <h4 class="card-title mb-4"><?php echo $title ?></h4>
                        <hr>
                    </div>

                    <div class="table-responsive">
						<div class="search-box chat-search-box py-1">
							<div class="position-relative">
								<input type="text" class="form-control" id="search-input" placeholder="Search...">
								<i class="bx bx-search-alt search-icon"></i>
							</div>
						</div>
						<div class="tab-content">
							<div class="tab-pane show active">
								<ul class="list-unstyled chat-list" data-simplebar="" style="max-height: 410px;" id="user-list">
									<?php $no = 1; foreach ($users as $user): ?>
										<li class="active mt-2 user-item" data-name="<?php echo strtolower($user->nama); ?>,<?php echo strtolower($user->no_pegawai); ?>">
											<a href="#" class="user-link" data-users_id="<?php echo $user->users_id; ?>">
												<div class="media">
													<div class="align-self-center mr-3">
														<img src="<?php echo base_url('upload/photo/'.$user->photo); ?>" class="rounded-circle avatar-xs" alt="">
													</div>
													<div class="media-body overflow-hidden">
														<h5 class="text-truncate font-size-14 mb-1"><?php echo $user->nama; ?></h5>
														<p class="text-truncate mb-0"><?php echo $user->no_pegawai; ?></p>
													</div>
													<div class="font-size-11"><?php echo $user->nama_status_pegawai; ?></div>
												</div>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
						<form id="filter-form" method="post" action="<?php echo site_url('laporan'); ?>">
								<div class="d-flex">
									<div class="form-group mb-0 mr-2">
										<input type="date" id="date_awal" class="form-control" name="date_awal" value="<?php echo set_value('date_awal'); ?>">
									</div>
									<div class="form-group mb-0 mr-2">
										<input type="date" id="date_akhir" class="form-control" name="date_akhir" value="<?php echo set_value('date_akhir'); ?>">
									</div>
									<button type="submit" class="btn btn-primary btn-sm">
										<i class="fa fa-eye mr-2"></i> Tampilkan
									</button>
									
								</div>
							</form>    
                        <hr>
                    </div>

					<h1>TEST DATA PROFILE</h1>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Shift</th>
                                <th>WM</th>
                                <th>TM</th>
                                <th>WK</th>
                                <th>KA</th>
                                <th>Status</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($presensi as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->nama_shift; ?> (<?php echo $row->jam_mulai; ?> - <?php echo $row->jam_selesai; ?>)</td>
                                    <td><?php echo $row->waktu_masuk; ?></td>
                                    <td><?php echo $row->terlambat ? 'Ya' : 'Tidak'; ?>, <?php echo $row->lama_terlambat; ?> Menit</td>
                                    <td><?php echo $row->waktu_keluar; ?></td>
                                    <td><?php echo $row->lebih_awal ? 'Ya' : 'Tidak'; ?>, <?php echo $row->waktu_lebih_awal; ?> Menit</td>
                                    <td><?php echo $row->status; ?></td>
                                    <td>
                                        <?php if ($row->photo_path): ?>
                                            <img src="<?php echo base_url('upload/presensi/' . $row->photo_path); ?>" width="30"> | 
                                            <img src="<?php echo base_url('upload/presensiout/' . $row->photo_path_keluar); ?>" width="30">
                                        <?php else: ?>
                                            Tidak ada foto
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
						</table>

                    </div>
                </div>
            </div>
        </div>
    </div>


	<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const userList = document.getElementById('user-list');

        searchInput.addEventListener('input', function() {
            const filter = searchInput.value.toLowerCase();
            const items = userList.getElementsByClassName('user-item');

            Array.from(items).forEach(function(item) {
                const name = item.getAttribute('data-name');
                if (name.indexOf(filter) > -1) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
