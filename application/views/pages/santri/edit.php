<!-- edit modal -->
<?php foreach ($santri as $result): ?>
<div class="modal fade editsantri<?php echo $result->santri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Data Santri</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('santri/update'); ?>" method="post">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $result->nis; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="no_kk">No KK</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?php echo $result->no_kk; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="nik_santri">NIK Santri</label>
                        <input type="text" class="form-control" id="nik_santri" name="nik_santri" value="<?php echo $result->nik_santri; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="nama_santri">Nama Santri</label>
                        <input type="text" class="form-control" id="nama_santri" name="nama_santri" value="<?php echo $result->nama_santri; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $result->tempat_lahir; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $result->tanggal_lahir; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="rayon_id">Nama Rayon</label>
                        <select class="form-control" id="rayon_id" name="rayon_id">
                            <?php foreach ($rayon as $r): ?>
                            <option value="<?php echo $r->rayon_id; ?>"><?php echo $r->nama_rayon; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun_ajaran_id">Tahun Masuk</label>
                        <select class="form-control" id="tahun_ajaran_id" name="tahun_ajaran_id">
                            <?php foreach ($tahun_ajaran as $ta): ?>
                            <option value="<?php echo $ta->tahun_ajaran_id; ?>"><?php echo $ta->nama_tahun_ajaran; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

					<div class="form-group">
                        <label for="persentase_tagihan_id">Status Santri</label>
                        <select class="form-control" id="persentase_tagihan_id" name="persentase_tagihan_id">
                            <?php foreach ($persentase_tagihan as $persentase): ?>
                            <option value="<?php echo $persentase->persentase_tagihan_id; ?>"><?php echo $persentase->jabatan_santri; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
					
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required><?php echo $result->alamat; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama_ayah">Nama Wali/Orangtua</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo $result->nama_ayah; ?>"  required>
                    </div>

					<div class="form-group">
					<div class="card border border-danger">
						<div class="card-body">
							<small style="color: red;"><b>PERHATIAN!!</b></small>
							<br>
							<small>1. Foto yang diizinkan *PNG *JPG *JPEG!</small>
							<br>
							<small>2. Foto berukuran *3x4</small>
							<br>
							<small>3. Warna latar belakang *merah </small>
							<br>
							<small>4. Ukuran file maksimal *500 Kb</small>
						</div>
					</div>
					<div class="custom-control custom-checkbox custom-checkbox-outline  custom-checkbox-danger mb-3">
						<input type="checkbox" class="custom-control-input" id="customCheck-outlinecolor4" required>
						<label class="custom-control-label" for="customCheck-outlinecolor4"><small>Pastikan data yang anda masukkan sudah sesuai!</small></label>
					</div>
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
<?php endforeach; ?>
<!-- /.modal -->
