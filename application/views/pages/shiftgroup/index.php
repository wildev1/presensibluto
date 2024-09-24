<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".addshiftgroup"><i class="bx bx-plus"></i></button>
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
									<th>Nama Group</th>
									<th>Deskripsi</th>
									<th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>	
								<?php $no =1; foreach ($shift_groups as $shift_group): ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $shift_group->nama_group; ?></td>
											<td><?php echo $shift_group->deskripsi; ?></td>
											<td width="10px">
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".edit<?php echo $shift_group->shift_group_id; ?>"><i class="mdi mdi-pencil"></i></button>
												<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".delete<?php echo $shift_group->shift_group_id; ?>"><i class="mdi mdi-trash-can"></i></button>
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


<?php $this->load->view('pages/shiftgroup/edit');?>
<?php $this->load->view('pages/shiftgroup/add');?>
<?php $this->load->view('pages/shiftgroup/delete');?>
