<?php $no =1;  foreach ($group_shifts as $group_shift): ?>
    <div class="modal fade delete<?php echo $group_shift->group_shift_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title mt-0">Delete Group Shift</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="alert alert-info" role="alert" align="center">
								<b>Yakin </b>ingin menghapus data group shift?
						</div>
						<?php echo form_open('groupShift/delete/'); ?>
                    	<input type="hidden" name="group_shift_id" value="<?php echo $group_shift->group_shift_id; ?>">

						<hr>
							<div class="text-right">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
<?php endforeach; ?>
