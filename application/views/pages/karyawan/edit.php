<?php $no = 1; foreach ($users as $user): ?>
    <!-- Edit Modal -->
    <div class="modal fade edit<?php echo $user->users_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                 <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?php echo form_open('users/update/' . $user->users_id); ?>
                    
                    <!-- Include hidden input to keep track of user ID -->
                    <input type="hidden" name="user_id" value="<?php echo $user->users_id; ?>">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama', $user->nama); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_pegawai">NIK</label>
                        <input type="text" class="form-control" id="no_pegawai" name="no_pegawai" value="<?php echo set_value('no_pegawai', $user->no_pegawai); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email', $user->email); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Tlp/Wa</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo set_value('telepon', $user->telepon); ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"><?php echo set_value('alamat', $user->alamat); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="L" <?php echo set_select('jenis_kelamin', 'L', $user->jenis_kelamin == 'L'); ?>>Laki-laki</option>
                            <option value="P" <?php echo set_select('jenis_kelamin', 'P', $user->jenis_kelamin == 'P'); ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_pegawai">Status Pegawai</label>
                        <select class="form-control" id="status_pegawai" name="status_pegawai_id">
                            <?php foreach ($status_pegawai as $pegawai): ?>
                                <option value="<?php echo $pegawai->status_pegawai_id; ?>" <?php echo set_select('status_pegawai_id', $pegawai->status_pegawai_id, $pegawai->status_pegawai_id == $user->status_pegawai_id); ?>>
                                    <?php echo $pegawai->nama_status_pegawai; ?>
                                </option>
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
                        <button type="submit" class="btn btn-primary btn-sm w-md">Update</button>
                    </div>
                    
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
