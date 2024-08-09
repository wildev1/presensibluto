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
                <div class="clearfix">
                    <div class="float-right">
                        <div class="btn-group" role="group" aria-label="Basic example">
							<button type="button" class="btn btn-primary btn-sm waves-effect btn-label waves-light"
                                data-toggle="modal" data-target=".permission"><i
                                    class="bx bx-plus label-icon"></i> Add
                            </button>
                        </div>
                    </div>
                    <h4 class="card-title mb-4"><?php echo $title ?></h4>
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama permission</th>
                                <th>Createt at</th>
                                <th width="15px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $no = 1;  foreach ($permission as $permission): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $permission->nama_permission; ?></td>
                                        <td><?php echo $permission-> created_at; ?></td>
                                        <td align="center">
                                            <button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".permission<?php echo $permission->permission_id; ?>">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light btn-sm" data-toggle="modal" data-target=".deletepermission<?php echo $permission->permission_id; ?>">
                                                <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('pages/permission/add');?>
<?php $this->load->view('pages/permission/delete');?>
<?php $this->load->view('pages/permission/edit');?>
