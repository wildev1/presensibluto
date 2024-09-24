<div class="modal fade addgroupshift" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Group Shift</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('groupShift/create'); ?>
                        <div class="form-group">
                            <label for="group_shift">Shift Group</label>
							<input type="text" class="form-control" id="group_shift" name="group_shift" value="<?php echo set_value('group_shift'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="shift_id">Shift</label>
                            <select id="shift_id" class="form-control" name="shift_id">
                                <?php foreach ($shifts as $shift): ?>
                                    <option value="<?php echo $shift->shift_id; ?>">
                                        <?php echo $shift->nama_shift; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
						<div class="form-group">
							<label for="day">Pilih Hari</label>
							<select id="day" class="form-control" name="hari">
								<option value="Senin,Selasa,Rabu,Kamis,Jumat,Sabtu">Senin-Sabtu</option>
								<option value="Senin">Senin</option>
								<option value="Selasa">Selasa</option>
								<option value="Rabu">Rabu</option>
								<option value="Kamis">Kamis</option>
								<option value="Jumat">Jumat</option>
								<option value="Sabtu">Sabtu</option>
								<option value="Minggu">Minggu</option>
							</select>
						</div>
                        <hr>
                        <div align="right">
                            <button type="submit" class="btn btn-primary  w-md">Save</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
