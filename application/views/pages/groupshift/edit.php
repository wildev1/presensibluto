<?php $no =1;  foreach ($group_shifts as $group_shift): ?>
   <div class="modal fade edit<?php echo $group_shift->group_shift_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0">Edit Group Shift</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo validation_errors(); ?>
				<?php echo form_open('groupShift/update/'); ?>
					<div class="form-group">
						<input type="hidden" name="group_shift_id" value="<?php echo $group_shift->group_shift_id; ?>">
					</div>
					<div class="form-group">
						<label for="group_shift">Group Shift </label>
						<input type="text" class="form-control" id="group_shift" name="group_shift" value="<?php echo $group_shift->group_shift; ?>">
					</div>
					<div class="form-group">
						<label for="shift_id">Shift</label>
						<select id="shift_id" class="form-control" name="shift_id">
							<?php foreach ($shifts as $shift): ?>
								<option value="<?php echo $shift->shift_id; ?>" <?php echo ($shift->shift_id == $group_shift->shift_id) ? 'selected' : ''; ?>>
									<?php echo $shift->nama_shift; ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="day">Pilih Hari</label>
						<select id="day" class="form-control" name="hari">
							<option value="" disabled>Pilih Hari</option>
							<option value="Senin,Selasa,Rabu,Kamis,Jumat,Sabtu" <?php echo ($group_shift->hari == 'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu') ? 'selected' : ''; ?>>Senin-Sabtu</option>
							<option value="Senin" <?php echo ($group_shift->hari == 'Senin') ? 'selected' : ''; ?>>Senin</option>
							<option value="Selasa" <?php echo ($group_shift->hari == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
							<option value="Rabu" <?php echo ($group_shift->hari == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
							<option value="Kamis" <?php echo ($group_shift->hari == 'Thursday') ? 'selected' : ''; ?>>Kamis</option>
							<option value="Jumat" <?php echo ($group_shift->hari == 'Friday') ? 'selected' : ''; ?>>Jumat</option>
							<option value="Sabtu" <?php echo ($group_shift->hari == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
							<option value="Minggu" <?php echo ($group_shift->hari == 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
						</select>
					</div>


					<hr>
					<div align="right">
						<button type="submit" class="btn btn-primary w-md">Update</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
