<?php foreach ($tahun_ajaran as $tahun) {?>
	<!-- add modal -->
    <div class="modal fade deletetahunajaran<?php echo $tahun->tahun_ajaran_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Delete Tahun Akademik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="alert alert-info" role="alert" align="center">
						<b>Yakin </b>ingin menghapus data  <span class="badge badge-pill badge-info font-size-8"><?php echo $tahun->kode_tahun_ajaran; ?></span> <span class="badge badge-pill badge-primary font-size-8"><?php echo $tahun->nama_tahun_ajaran; ?></span> ? <br>
						<b>Perhatian!</b> Penghapusan Tahun Ajaran akan secara otomatis menghapus data lain yang memiliki hubungan pada <b>E-Mall</b>.
					</div>
					<form action="<?php echo site_url('tahunajaran/delete'); ?>" method="post">
						<div class="form-group">
							<input type="hidden" class="form-control" value="<?php echo $tahun->tahun_ajaran_id; ?>" name="tahun_ajaran_id" id="tahun_ajaran_id" >
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
