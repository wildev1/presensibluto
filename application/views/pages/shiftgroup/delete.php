<?php $no =1; foreach ($shift_groups as $shift): ?>
<div class="modal fade delete<?php echo $shift->shift_group_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
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
                <?php echo form_open('shiftGroup/delete'); ?>
                    <input type="hidden" name="shift_group_id" value="<?php echo $shift->shift_group_id; ?>">
					<div class="alert alert-info" role="alert" align="center">
							<b>Yakin </b>ingin menghapus data shift <?php echo $shift->nama_group; ?>?
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
