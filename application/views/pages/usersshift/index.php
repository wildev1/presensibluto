<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-primary btn-sm" ><i class="fa fa-spinner"></i></button>
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
                                    <th>Nama</th>
                                    <th>No Pegawai</th>
									<th>Shift Group</th>
									<th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>	
								<?php $no = 1; foreach ($users_shift_groups as $user_shift_group): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $user_shift_group->user_name; ?></td>
										<td><?php echo $user_shift_group->no_pegawai; ?></td>
										<td>
											<?php 
											$group_names = array();
											if (isset($user_shift_group->shift_groups) && !empty($user_shift_group->shift_groups)) {
												foreach ($user_shift_group->shift_groups as $shift_group) {
													$group_names[] = $shift_group->nama_group;
												}
												echo implode(', ', $group_names);
											} else {
												echo '<span class="badge badge-danger">Shift Group Belum di Set</span>';
											}
											?>
										</td>
										<td width="10px">
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".add<?php echo $user_shift_group->users_id; ?>"><i class="bx bx-plus"></i></button>
											<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".delete<?php echo $user_shift_group->users_id; ?>"><i class="mdi mdi-trash-can"></i></button>
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

<?php $this->load->view('pages/usersshift/add');?>
<?php $this->load->view('pages/usersshift/edit');?>
<?php $this->load->view('pages/usersshift/delete');?>
