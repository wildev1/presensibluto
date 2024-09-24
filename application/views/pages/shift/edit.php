<?php $no =1; foreach ($shifts as $shift): ?>
<div class="modal fade editshift<?php echo $shift->shift_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit Shift</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('shift/update'); ?>
                    <input type="hidden" name="shift_id" value="<?php echo $shift->shift_id; ?>">
                    
                    <div class="form-group">
                        <label for="nama_shift">Nama Shift</label>
                        <input type="text" id="nama_shift" class="form-control" name="nama_shift" value="<?php echo set_value('nama_shift', $shift->nama_shift); ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="time" id="jam_mulai" class="form-control" name="jam_mulai" value="<?php echo set_value('jam_mulai', $shift->jam_mulai); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="time" id="jam_selesai" class="form-control" name="jam_selesai" value="<?php echo set_value('jam_selesai', $shift->jam_selesai); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi Presensi</label>
                        <input type="number" id="durasi" name="durasi" class="form-control" value="<?php echo set_value('durasi', $shift->durasi); ?>">
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
