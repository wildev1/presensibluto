<!-- Modal Delete -->
<?php foreach ($users_shift_groups as $user_shift_group): ?>
    <div class="modal fade delete<?php echo $user_shift_group->users_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?php echo $user_shift_group->users_id; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel<?php echo $user_shift_group->users_id; ?>">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus semua data untuk user <strong><?php echo $user_shift_group->user_name; ?></strong>?</p>
                </div>
                <div class="modal-footer">
                    <?php echo form_open('usersShiftGroup/delete/' . $user_shift_group->users_id); ?>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
