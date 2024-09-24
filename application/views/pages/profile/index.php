<div class="row">
		<div class="col-xl-4">
			<div class="card overflow-hidden">
				<div class="bg-soft-primary">
					<div class="row">
						<div class="col-7">
							<div class="text-primary p-3">
								<h5 class="text-primary"></h5>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body pt-0">
					<div class="row" align="center">
						<div class="col-sm-12">
							<div  style="margin-top: 4px; margin-bottom: 4px;">
								<img src="<?php echo base_url('upload/photo/'.$user->photo); ?>" class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;">
							</div>
							<h5 class="font-size-15 text-truncate"><?php echo $user->nama; ?></h5>
							<p class="text-muted mb-0 text-truncate"><?php echo $user->roles; ?></p>
							<hr>
							<div class="mt-2">
								<button type="button" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="modal" data-target=".edit<?php echo $user->users_id; ?>">
									Edit Profile  <i class="mdi mdi-pencil ml-1"></i>
								</button>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- end card -->

		</div>

	<?php if ($user): ?>
		<div class="col-xl-8">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title mb-4">Profile Karyawan</h4>
					<div class="table-responsive">
						<table class="table table-nowrap mb-0">
							<tbody>
								<tr>
									<th scope="row">Nama Lengkap</th>
									<td><?php echo $user->nama; ?></td>
								</tr>
								<tr>
									<th scope="row">Nomor Pegawai</th>
									<td><?php echo $user->no_pegawai; ?></td>
								</tr>
								<tr>
									<th scope="row">Jenis Kelamin</th>
									<td><?php echo $user->jenis_kelamin; ?></td>
								</tr>
								<tr>
									<th scope="row">Email</th>
									<td><?php echo $user->email; ?></td>
								</tr>
								<tr>
									<th scope="row">No/Tlp</th>
									<td><?php echo $user->telepon; ?></td>
								</tr>
								<tr>
									<th scope="row">Alamat </th>
									<td><?php echo $user->alamat; ?></td>
								</tr>
								<tr>
									<th scope="row">Status Kepegawain</th>
									<td><?php echo $user->nama_status_pegawai; ?></td>
								</tr>
								<tr>
									<th scope="row">Status</th>
									<td><?php echo $user->status; ?></td>
								</tr>
								<tr>
									<th scope="row">Tanggal Pembuatan Akun</th>
									<td><?php echo $user->created_at; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
<?php else: ?>
<p>Data user tidak ditemukan.</p>
<?php endif; ?>
</div>

<?php $this->load->view('pages/profile/edit');?>
