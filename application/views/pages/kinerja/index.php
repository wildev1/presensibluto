<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
								<a target="_blank" href="<?php echo site_url('admin/dosen/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
								<!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".importdosen"><i class="mdi mdi-cloud-upload"></i></button> -->
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".kinerja"><i class="bx bx-plus"></i></button>
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
									<th>Deskripsi</th>
									<th>File</th>
									<th>Tanggal</th>
									<th>Status</th>
									<th>Catatan</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>	
								<?php $no =1; foreach ($kinerja as $kinerja): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $kinerja->deskripsi; ?></td>
										<td>
											<a data-toggle="modal" data-target=".validasi<?php echo $kinerja->laporan_id; ?>">
												<img src="<?php echo base_url('upload/document/'.$kinerja->photo); ?>" class="img-thumbnail" style="width: 30px;;">
											</a>				
										</td>	
										<td><?php echo $kinerja->hari; ?>, <?php $tanggal = $kinerja->tanggal; $formatted_date = date('d F Y ', strtotime($tanggal)); echo $formatted_date; ?></td>
										<td>
											<?php if ($kinerja->status_validasi == 'Valid'): ?>
												<span class="badge badge-success">Valid</span>
											<?php elseif ($kinerja->status_validasi == 'Tidak Valid'): ?>
												<span class="badge badge-danger">Tidak Valid</span>
											<?php elseif ($kinerja->status_validasi == 'Pending'): ?>
												<span class="badge badge-warning">Pending</span>
											<?php else: ?>
												<span class="badge badge-secondary">Unknown</span>
											<?php endif; ?>
										</td>
										<td><?php echo !empty($kinerja->catatan) ? $kinerja->catatan : '-'; ?></td>
										<td align="center">											
											<button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-toggle="modal" data-target=".validasi<?php echo $kinerja->laporan_id; ?>">
												<i class="mdi mdi-check"></i>
											</button>					
											<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".edit<?php echo $kinerja->laporan_id; ?>">
												<i class="mdi mdi-pencil"></i>
											</button>
											<button type="button" class="btn btn-danger waves-effect waves-light btn-sm" data-toggle="modal" data-target=".delete<?php echo $kinerja->laporan_id; ?>">
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


<?php $this->load->view('pages/kinerja/delete');?>
<?php $this->load->view('pages/kinerja/add');?>
<?php $this->load->view('pages/kinerja/edit');?>
<?php $this->load->view('pages/kinerja/validasi');?>
