<?php foreach ($persentase_tagihan as $tagihan) {?>
	<!-- add modal -->
    <div class="modal fade delete<?php echo $tagihan->persentase_tagihan_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Delete Persentase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="alert alert-info" role="alert" align="center">
						<b>Yakin </b>ingin menghapus data  <span class="badge badge-pill badge-info font-size-8"><?php echo $tagihan->jabatan_santri; ?></span>? <br>
					</div>
					<form action="<?php echo site_url('persentase/delete'); ?>" method="post">
						<div class="form-group">
							<input type="hidden" class="form-control" value="<?php echo $tagihan->persentase_tagihan_id; ?>" name="persentase_tagihan_id" id="persentase_tagihan_id" >
						</div>
						<hr>
						<div align="right">
							<button type="submit" class="btn btn-danger btn-sm w-md">Delete</button>
						</div>
					</form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php }?>
