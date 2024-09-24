
	<!-- add modal -->
    <div class="modal fade status_pegawai" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Status Kepegawaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form action="<?php echo site_url('statuspegawai/simpan'); ?>" method="post">
						<div class="form-group">
							<label for="status_pegawai">Nama Status Pegawai</label>
							<input type="text" class="form-control" id="status_pegawai" name="nama_status_pegawai">
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi</label>
							<input type="text" class="form-control" id="deskripsi" name="deskripsi">
						</div>
						<hr>
						<div align="right">
							<button type="submit" class="btn btn-primary btn-sm w-md">Submit</button>
						</div>
					</form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
