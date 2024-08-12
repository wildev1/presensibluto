<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="clearfix">
                        <div class="float-right">
								<a target="_blank" href="<?php echo site_url('admin/dosen/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
								<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".importdosen"><i class="mdi mdi-cloud-upload"></i></button>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".addsantri"><i class="bx bx-plus"></i></button>
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
                                    <th>No KK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Rayon</th>
                                    <th>Status</th>
                                    <th>Aktivasi</th>
                                    <th>Jumlah Saudara</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
							<tbody>
							    	<?php foreach ($santri as $key => $result) : ?>
										<tr>
											<td><?php echo $key + 1; ?></td>
											<td><?php echo $result->nama_santri; ?></td>
											<td><?php echo $result->no_kk; ?></td>
											<td><?php echo $result->jenis_kelamin;?></td>
											<td><?php echo $result->tempat_lahir . ', ' . date('d-m-Y', strtotime($result->tanggal_lahir)); ?></td>
											<td><?php echo $result->nama_rayon; ?></td>
											<td><?php echo $result->jabatan_santri; ?></td>
											<td><?php echo $result->status_santri; ?></td>
											<td>
												<?php if ($result->siblings_count > 1): ?>
													<?php echo $result->siblings_count . ' bersudara'; ?>
												<?php else: ?>
													<?php echo 'Tidak Bersaudara'; ?>
												<?php endif; ?>
											</td>
											<td>
												<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target=".editsantri<?php echo $result->santri_id; ?>"><i class="mdi mdi-pencil"></i></button>
												<a href="<?php echo base_url('santri/edit/' . $result->santri_id); ?>" class="btn btn-info waves-effect waves-light btn-sm"><i class="fa fa-eye"></i></a>
												<a href="<?php echo base_url('santri/delete/' . $result->santri_id); ?>" class="btn btn-danger waves-effect waves-light btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-trash-can"></i></a>
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

<?php $this->load->view('pages/santri/add');?>
<?php $this->load->view('pages/santri/edit');?>
