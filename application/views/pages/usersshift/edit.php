 <?php foreach ($users_shift_groups as $user_shift_group): ?>
    <div class="modal fade edit<?php echo $user_shift_group->users_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit User Shift Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('usersShiftGroup/create'); ?>
                        <div class="form-group">
                            <label for="users_id">User</label>
								<input type="hidden" class="form-control" name="users_id" value="<?php echo $user_shift_group->users_id; ?>">
								<input type="text" class="form-control"  value="<?php echo $user_shift_group->user_name; ?>">

                        </div>
                        <div class="form-group">
                            <label for="shift_group_id">Shift Group</label>
                            <select id="shift_group_id" class="form-control" name="shift_group_id">
                                <?php foreach ($shift_groups as $shift_group): ?>
                                    <option value="<?php echo $shift_group->shift_group_id; ?>">
                                        <?php echo $shift_group->nama_group; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
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
