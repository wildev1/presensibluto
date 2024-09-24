<?php $no =1; foreach ($kinerja as $kinerja): ?> 
	<div class="modal fade edit<?php echo $kinerja->laporan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit Laporan Kinerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
						<?php echo form_open_multipart('kinerja/update'); ?>
                			<input type="hidden" name="laporan_id" value="<?php echo $kinerja->laporan_id; ?>">

							<div class="form-group">
								<label for="deskripsi">Deskripsi</label>
								<textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $kinerja->deskripsi; ?></textarea>
							</div>
							<div class="form-group">
								<label for="photo">Bukti Laporan</label>
								<input type="file" class="form-control" id="photo" name="photo" value="<?php echo $kinerja->photo; ?>">
								<smal style="color:red;">Foto yang diizinkan JPEG, PNG, JPG MAX 2MB</smal>
							</div>
							<div>
								<img src="<?php echo base_url('upload/document/' . $kinerja->photo); ?>" alt="User Photo" class="img-thumbnail mt-2">
							</div>
							<hr>
							<div align="right">
								<button type="submit" class="btn btn-primary btn-sm w-md">Simpan</button>
							</div>
					<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
 <?php endforeach; ?>							
