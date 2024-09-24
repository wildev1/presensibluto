<?php foreach ($status_pegawai as $status_pegawai) {?>
	<!-- add modal -->
    <div class="modal fade deletestatus_pegawai<?php echo $status_pegawai->status_pegawai_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Delete Status Kepegawaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="alert alert-info" role="alert" align="center">
						<b>Yakin </b>ingin menghapus data  <span class="badge badge-pill badge-info font-size-8"><?php echo $status_pegawai->kode_status_pegawai; ?></span> <span class="badge badge-pill badge-primary font-size-8"><?php echo $status_pegawai->nama_status_pegawai; ?></span> ? <br>
						<b>Perhatian!</b> Penghapusan Status Kepegawaian akan secara otomatis menghapus data lain yang memiliki hubungan pada sistem <b>Presensi</b>.
					</div>
					<form action="<?php echo site_url('statuspegawai/delete'); ?>" method="post">
						<div class="form-group">
							<input type="hidden" class="form-control" value="<?php echo $status_pegawai->status_pegawai_id; ?>" name="status_pegawai_id" id="status_pegawai_id" >
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
