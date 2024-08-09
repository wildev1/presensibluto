<!-- add modal -->
<div class="modal fade addtagihan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add Tagihan Santri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
					<?php if ($semester): ?>
					  <form method="post" action="<?php echo site_url('tagihan/create_kolektif_tagihan'); ?>">
						<div class="form-group">
							<label for="tahun_ajaran_id">Tahun Ajaran</label>
                       		<input type="hidden" class="form-control" name="tahun_ajaran_id"  value="<?php echo $semester->tahun_ajaran_id; ?>" required>
                       		<input type="text" class="form-control" readonly  value="<?php echo $semester->nama_tahun_ajaran; ?>" required>
						</div>
						<div class="form-group">
							<label for="jenis_tagihan">Jenis Tagihan:</label>
							<input type="text" class="form-control" id="jenis_tagihan" name="jenis_tagihan" required>
						</div>

						<div class="form-group">
							<label for="jumlah_tagihan">Jumlah Tagihan:</label>
							<input type="number" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" required>
						</div>

						<div class="form-group">
							<label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo:</label>
							<input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo"
								required>
						</div>

						<div class="form-group">
							<label for="deskripsi">Deskripsi:</label>
							<textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
						</div>

						<hr>
						<div align="right">
							<button type="submit" class="btn btn-primary btn-sm w-md">Submit</button>
						</div>
					</form>

                    <?php else: ?>
						<div class="alert alert-info" role="alert" align="center">
							belum ada tahun ajaran yang aktif, silahkan aktifkan tahun ajaran pada menu <b><a href="<?php echo site_url('tahunajaran'); ?>">tahun ajaran</a></b>.
						</div>
					<?php endif; ?>
                  
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
