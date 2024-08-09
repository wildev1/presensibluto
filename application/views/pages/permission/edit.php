<?php foreach ($permission as $permission) {?>
<!-- add modal -->
<div class="modal fade permission<?php echo $permission->permission_id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Delete permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('permission/update'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_permission">Nama permission</label>
                        <input type="hidden" class="form-control" id="permission_id" name="permission_id" value="<?php echo $permission->permission_id; ?>">
                        <input type="text" class="form-control" id="nama_permission" name="nama_permission"  value="<?php echo $permission->nama_permission; ?>">
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
