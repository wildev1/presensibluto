<div class="modal fade addshiftgroup" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Shift Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('shiftGroup/create'); ?>
                        <div class="form-group">
                            <label for="nama_group">Nama Group</label>
                            <input type="text" id="nama_group" class="form-control" name="nama_group" value="<?php echo set_value('nama_group'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi"><?php echo set_value('deskripsi'); ?></textarea>
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
