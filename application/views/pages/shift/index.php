<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".addshift"><i class="bx bx-plus"></i></button>
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
                                    <th>Nama Shift</th>
									<th>Jam Mulai</th>
									<th>Jam Selesai</th>
									<th>Durasi</th>
									<th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>	
								 <?php $no =1; foreach ($shifts as $shift): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $shift->nama_shift; ?></td>
										<td><?php echo $shift->jam_mulai; ?></td>
										<td><?php echo $shift->jam_selesai; ?></td>
										<td><?php echo $shift->durasi; ?></td>
										<td width="10px">
											<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".editshift<?php echo $shift->shift_id; ?>">
												<i class="mdi mdi-pencil"></i>
											</button>
											<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" data-toggle="modal" data-target=".deleteshift<?php echo $shift->shift_id; ?>">
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


<?php $this->load->view('pages/shift/edit');?>
<?php $this->load->view('pages/shift/add');?>
<?php $this->load->view('pages/shift/delete');?>
