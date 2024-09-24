<?php $no =1; foreach ($shift_groups as $shift): ?>
 <div class="modal fade edit<?php echo $shift->shift_group_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title mt-0">Edit Shift Group</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo validation_errors(); ?>
					<?php echo form_open('shiftGroup/update'); ?>
                    <input type="hidden" name="shift_group_id" value="<?php echo $shift->shift_group_id; ?>">

						<div class="form-group">
							<label for="nama_group">Nama Group</label>
							<input type="text" id="nama_group" class="form-control" name="nama_group" value="<?php echo set_value('nama_group', $shift->nama_group); ?>">
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi</label>
							<textarea id="deskripsi" class="form-control" name="deskripsi"><?php echo set_value('deskripsi', $shift->deskripsi); ?></textarea>
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
