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
						<a target="_blank" href="<?php echo site_url('persentase/cetak'); ?>"class="btn btn-info btn-sm"><i class="bx bx-printer label-icon"></i></a>

							<button type="button" class="btn btn-primary btn-sm"
                                data-toggle="modal" data-target=".persentase"><i
                                    class="bx bx-plus label-icon"></i>
                            </button>
                    </div>
                    <h4 class="card-title mb-4"><?php echo $title ?></h4>
                    <hr>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr align="center">
                                <th width="10px">No</th>
                                <th>Tingkatan Santri</th>
                                <th>Pembayaran</th>
                                <th>Potongan</th>
                                <th>Keterangan</th>
                                <th width="15px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php $no = 1;  foreach ($persentase_tagihan as $persentase): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $persentase->jabatan_santri; ?></td>
                                        <td align="center"><?php echo $persentase->pembayaran; ?> %</td>
                                        <td align="center"><?php echo $persentase->potongan; ?> %</td>
                                        <td><?php echo $persentase->deskripsi; ?></td>
                                        <td align="center">
                                            <button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".persentase<?php echo $persentase->persentase_tagihan_id; ?>">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light btn-sm" data-toggle="modal" data-target=".delete<?php echo $persentase->persentase_tagihan_id; ?>">
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


<?php $this->load->view('pages/persentase/add');?>
<?php $this->load->view('pages/persentase/delete');?>
<?php $this->load->view('pages/persentase/edit');?>
