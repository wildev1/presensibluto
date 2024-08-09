<?php foreach ($roles_permission as $roles_permission) {?>
<!-- add modal -->
<div class="modal fade roles_permission<?php echo $roles_permission->roles_id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Delete Roles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('permission/update'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_roles">Nama Roles</label>
                        <input type="hidden" class="form-control" id="roles_id" name="roles_id" value="<?php echo $roles_permission->roles_id; ?>">
                        <input type="text" class="form-control" id="nama_roles" name="nama_roles"  value="<?php echo $roles_permission->nama_roles; ?>">
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
<!-- /.modal -->
<?php }?>
