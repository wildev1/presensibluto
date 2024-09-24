<?php $no =1; foreach ($kinerja as $kinerja): ?> 
	<div class="modal fade validasi<?php echo $kinerja->laporan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Validasi Laporan Kinerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
						<?php echo form_open_multipart('kinerja/validasi'); ?>
                			<input type="hidden" name="laporan_id" value="<?php echo $kinerja->laporan_id; ?>">

							<div class="form-group">
								<label for="deskripsi"><b>Deskripsi Tugas</b></label>
								<p><?php echo $kinerja->deskripsi; ?></p>
							</div>
							<div class="form-group">
								<label for="deskripsi"><b>Tanggal</b></label>
								<p><?php echo $kinerja->hari; ?>, <?php $tanggal = $kinerja->tanggal; $formatted_date = date('d F Y ', strtotime($tanggal)); echo $formatted_date; ?></p>
							</div>
							<div class="form-group">
								<label for="deskripsi"><b>Status Laporan</b></label>
								<p>
									<?php if ($kinerja->status_validasi == 'Valid'): ?>
										<span class="badge badge-success">Valid</span>
									<?php elseif ($kinerja->status_validasi == 'Tidak Valid'): ?>
										<span class="badge badge-danger">Tidak Valid</span>
									<?php elseif ($kinerja->status_validasi == 'Pending'): ?>
										<span class="badge badge-warning">Pending (Belum diperiksa)</span>
									<?php else: ?>
										<span class="badge badge-secondary">Unknown</span>
									<?php endif; ?>
								</p>
							</div>
							<div class="form-group">
								<label for="deskripsi"><b>Dokumentasi</b></label>
								<img src="<?php echo base_url('upload/document/' . $kinerja->photo); ?>" alt="User Photo" class="img-thumbnail mt-2">
							</div>
							<?php if ($user_role == 'Admin'): ?>
								<hr>
								<div class="form-group">
									<label class="control-label">Status Validasi</label>
									<select class="form-control" name="status_validasi">
										<option value="Pending" <?php echo ($kinerja->status_validasi == 'Pending') ? 'selected' : ''; ?>>Pending</option>
										<option value="Tidak Valid" <?php echo ($kinerja->status_validasi == 'Tidak Valid') ? 'selected' : ''; ?>>Tidak Valid</option>
										<option value="Valid" <?php echo ($kinerja->status_validasi == 'Valid') ? 'selected' : ''; ?>>Valid</option>
									</select>
								</div>
								<div class="form-group">
									<label for="catatan">Catatan</label>
									<textarea class="form-control" id="catatan" name="catatan"><?php echo set_value('catatan', $kinerja->catatan); ?></textarea>
								</div>
								<hr>
								<div align="right">
									<button type="submit" class="btn btn-primary btn-sm w-md">Simpan</button>
								</div>
							<?php endif; ?>
							
					<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
 <?php endforeach; ?>							
