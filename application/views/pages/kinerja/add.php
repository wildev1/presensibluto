    <div class="modal fade kinerja" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Laporan Kinerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
						<?php echo form_open_multipart('kinerja/create'); ?>
							<div class="form-group">
								<label for="deskripsi">Deskripsi</label>
								<textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo set_value('deskripsi'); ?></textarea>
							</div>
							<div class="form-group">
								<label for="photo">Bukti Laporan</label>
								<input type="file" class="form-control" id="photo" name="photo" value="<?php echo set_value('photo'); ?>">
								<smal style="color:red;">Foto yang diizinkan JPEG, PNG, JPG MAX 2MB</smal>
							</div>
							<hr>
							<div align="right">
								<button type="submit" class="btn btn-primary btn-sm w-md">Submit</button>
							</div>
					<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
 
