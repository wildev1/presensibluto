<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
								<a target="_blank" href="<?php echo site_url('admin/dosen/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
								<!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".importdosen"><i class="mdi mdi-cloud-upload"></i></button> -->
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".users"><i class="bx bx-plus"></i></button>
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
									<th>Username</th>
									<th>Email</th>
									<th>Telepon</th>
									<th>Telepon</th>
									<th>Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>	
								<?php $no =1; foreach ($users as $user): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $user->nama; ?></td>
										<td><?php echo $user->username; ?></td>
										<td><?php echo $user->email; ?></td>
										<td><?php echo $user->telepon; ?></td>
										<td><?php echo $user->roles; ?></td>
										<td><?php echo $user->status; ?></td>
										<td>
											<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".dosen">
												<i class="mdi mdi-pencil"></i>
											</button>
											<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapusdosen('')">
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


<?php $this->load->view('pages/users/add');?>
