<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
							<div class="btn-group" role="group" aria-label="Basic example">
								<a target="_blank" href="<?php echo site_url('admin/dosen/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
								<!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".importdosen"><i class="mdi mdi-cloud-upload"></i></button> -->
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".adddosen"><i class="bx bx-plus"></i></button>
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
                                    <th>Golongan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>	
									<tr>
										<td>1</td>
										<td>Shift Pagi</td>
										<td>08:00</td>
										<td>14:00</td>
										<td>A</td>
										<td align="center">
											<div class="btn-group" role="group" aria-label="Basic example">
											    <button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".dosen">
													<i class="mdi mdi-pencil"></i>
												</button>
												<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapusdosen('')">
													<i class="mdi mdi-trash-can"></i>
												</button>
											 </div>
											</td>
										</td>
									</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
