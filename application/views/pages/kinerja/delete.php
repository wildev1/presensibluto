<?php $no =1; foreach ($kinerja as $kinerja): ?> 
	<div class="modal fade delete<?php echo $kinerja->laporan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Delete Laporan Kinerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
						<?php echo form_open_multipart('kinerja/delete'); ?>
                			<input type="hidden" name="laporan_id" value="<?php echo $kinerja->laporan_id; ?>">
							<div class="alert alert-info" role="alert" align="center">
								<b>Yakin </b>ingin menghapus data Laporan ini?
							</div>
							<hr>
							<div align="right">
								<button type="submit" class="btn btn-primary btn-sm w-md">Delete</button>
							</div>
					<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
 <?php endforeach; ?>							
