
	<!-- add modal -->
    <div class="modal fade users" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
						<?php echo form_open('users/create'); ?>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" required>
							</div>
							<div class="form-group">
								<label for="no_pegawai">NIK</label>
								<input type="text" class="form-control" id="no_pegawai" name="no_pegawai" value="<?php echo set_value('no_pegawai'); ?>">
							</div>
							<!-- <div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" required>
							</div> -->
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" required>
							</div>
							<div class="form-group">
								<label for="telepon">Tlp/Wa</label>
								<input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo set_value('telepon'); ?>">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea class="form-control" id="alamat" name="alamat"><?php echo set_value('alamat'); ?></textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin" >
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="status_pegawai">Status Kepegawaian</label>
								<select class="form-control" id="status_pegawai" name="status_pegawai_id">
									<?php foreach ($status_pegawai as $pegawai): ?>
										<option value="<?php echo $pegawai->status_pegawai_id; ?>"><?php echo $pegawai->nama_status_pegawai; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="roles">Akses</label>
								<select class="form-control" id="roles" name="roles">
									<?php foreach ($roles as $role): ?>
										<option value="<?php echo $role->roles_id; ?>"><?php echo $role->nama_roles; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<hr>
								<div align="right">
									<button type="submit" class="btn btn-primary btn-sm w-md">Submit</button>
								</div>
						<?php echo form_close(); ?>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
