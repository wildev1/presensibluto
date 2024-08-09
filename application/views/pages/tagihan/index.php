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
								<a target="_blank" href="<?php echo site_url('admin/dosen/cetak'); ?>"class="btn btn-danger btn-sm"><i class="bx bx-printer label-icon"></i></a>
								<!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".importdosen"><i class="mdi mdi-cloud-upload"></i></button> -->
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".addtagihan"><i class="bx bx-plus"></i></button>
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
									<th>Santri</th>
									<th>Tahun Ajaran</th>
									<th>Jenis Tagihan</th>
									<th>Jumlah Tagihan</th>
									<th>Potongan</th>
									<th>Jumlah Pembayaran</th>
									<th>Status</th>
									<th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>	
							<?php $no = 1; foreach ($tagihan as $result): ?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $result->nama_santri; ?></td>
								<td><?php echo $result->tahun_ajaran; ?></td>
								<td><?php echo $result->jenis_tagihan; ?></td>
								<td><?php echo number_format($result->jumlah_tagihan, 0, ',', '.'); ?></td>
								<td><?php echo $result->potongan; ?> %</td>
								<td><?php echo number_format($result->total_tagihan, 0, ',', '.'); ?></td>
								<td><?php echo $result->status; ?></td>
								<td>
									<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".dosen">
										<i class="mdi mdi-pencil"></i>
									</button>
									<button type="button" class="btn btn-info waves-effect waves-light btn-sm" onclick="hapusdosen('')">
										<i class="fa fa-eye"></i>
									</button>
									<a href="<?php echo site_url('tagihan/delete/'.$result->tagihan_id); ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger waves-effect waves-light btn-sm" onclick="hapusdosen('')">
										<i class="mdi mdi-trash-can"></i>
									</a>

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

<?php $this->load->view('pages/tagihan/add');?>
