<?php if ($this->session->flashdata('alert')): ?>
<div id="alert">
    <?php echo $this->session->flashdata('alert'); ?>
</div>
<script>
setTimeout(function() {
    document.getElementById("alert").remove();
}, <?php echo $this->session->flashdata('alert_timeout'); ?>);
</script>
<?php endif; ?>
<div class="row">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
				<?php echo form_open('rolespermission/save_permissions'); ?>

					<div class="clearfix">
						<div class="float-right">
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="submit" class="btn btn-primary btn-sm waves-effect btn-label waves-light"><i class="fa fa-save label-icon"></i> Simpan</button>
							</div>
						</div>
						<h4 class="card-title mb-4"><?php echo $title ?></h4>
						<hr>
					</div>
					<div class="table-responsive">
						<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
							style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead  align="center">
								<tr>
									<th>Roles Pengguna</th>
									<?php foreach ($permissions as $permission): ?>
									<th><?php echo $permission['nama_permission']; ?></th>
									<?php endforeach; ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($roles as $role): ?>
								<tr>
									<td><?php echo $role['nama_roles']; ?></td>
									<?php foreach ($permissions as $permission): ?>
									<td  align="center">
										<input type="checkbox"  name="permission[<?php echo $role['roles_id']; ?>][]"
											value="<?php echo $permission['permission_id']; ?>"
											<?php echo in_array($permission['permission_id'], array_column($role['permission'], 'permission_id')) ? 'checked' : ''; ?>>
									</td>
									<?php endforeach; ?>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				<?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
