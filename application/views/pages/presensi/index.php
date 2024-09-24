<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
								<a target="_blank" href="<?php echo site_url('admin/dosen/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".kinerja"><i class="bx bx-plus"></i></button>
                        </div>
                        <h4 class="card-title mb-4"><?php echo $title ?></h4>
                        <hr>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th>No</th>
									<th>User</th>
									<th>Group Shift</th>
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
										<td><?php echo $row->user_name; ?></td>
										<td><?php echo $row->nama_group; ?></td>
										<td><?php echo $row->nama_shift; ?> (<?php echo $row->jam_mulai; ?> - <?php echo $row->jam_selesai; ?>)</td>
										<td><?php echo $row->waktu_masuk; ?></td>
										<td><?php echo $row->terlambat ? 'Ya' : 'Tidak'; ?></td>
										<td><?php echo $row->waktu_keluar; ?></td>
										<td><?php echo $row->waktu_keluar; ?></td>
										<td><?php echo $row->status; ?></td>
										<td>
											<?php if ($row->photo_path): ?>
												<img src="<?php echo base_url('uploads/' . $row->photo_path); ?>" width="50">
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
