<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".addgroupshift"><i class="bx bx-plus"></i></button>
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
									<th>Shift Group</th>
									<th>Shift</th>
									<th>Hari</th>
									<th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>	
								<?php $no =1;  foreach ($group_shifts as $group_shift): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $group_shift->group_shift; ?></td>
											<td><?php echo $group_shift->nama_shift; ?></td>
											<td><?php echo $group_shift->hari; ?></td>
											<td width="10px">
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".edit<?php echo $group_shift->group_shift_id; ?>"><i class="mdi mdi-pencil"></i></button>
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".delete<?php echo $group_shift->group_shift_id; ?>"><i class="mdi mdi-trash-can"></i></button>
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

<?php $this->load->view('pages/groupshift/edit');?>
<?php $this->load->view('pages/groupshift/add');?>
<?php $this->load->view('pages/groupshift/delete');?>
