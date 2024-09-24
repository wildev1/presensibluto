<!-- application/views/pages/presensi/laporan.php -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form id="filter-form" method="post" action="<?php echo site_url('laporan'); ?>">
                    <div class="d-flex">
                        <div class="form-group mb-0 mr-2">
                            <input type="date" id="date_awal" class="form-control" name="date_awal" value="<?php echo set_value('date_awal'); ?>">
                        </div>
                        <div class="form-group mb-0 mr-2">
                            <input type="date" id="date_akhir" class="form-control" name="date_akhir" value="<?php echo set_value('date_akhir'); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye mr-2"></i> Tampilkan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <!-- Tombol Print -->
                    <?php if ($this->input->post('date_awal') && $this->input->post('date_akhir')): ?>
                        <div class="float-right">
                            <a target="_blank" href="<?php echo site_url('laporan/print') . '?date_awal=' . urlencode($this->input->post('date_awal')) . '&date_akhir=' . urlencode($this->input->post('date_akhir')); ?>" class="btn btn-danger btn-sm no-print">
                                <i class="bx bx-printer label-icon"></i> Cetak PDF
                            </a>
                        </div>
                    <?php endif; ?>

                    <h4 class="card-title mb-4"><?php echo $title ?></h4>
                    <hr>
                </div>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Shift</th>
                                <th>WM</th>
                                <th>TM</th>
                                <th>WK</th>
                                <th>KA</th>
                                <th>Status</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($presensi as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row->nama; ?></td>
                                    <td><?php echo $row->nama_shift; ?> (<?php echo $row->jam_mulai; ?> - <?php echo $row->jam_selesai; ?>)</td>
                                    <td><?php echo $row->waktu_masuk; ?></td>
                                    <td><?php echo $row->terlambat ? 'Ya' : 'Tidak'; ?>, <?php echo $row->lama_terlambat; ?> Menit</td>
                                    <td><?php echo $row->waktu_keluar; ?></td>
                                    <td><?php echo $row->lebih_awal ? 'Ya' : 'Tidak'; ?>, <?php echo $row->waktu_lebih_awal; ?> Menit</td>
                                    <td><?php echo $row->status; ?></td>
                                    <td>
                                        <?php if ($row->photo_path): ?>
                                            <img src="<?php echo base_url('upload/presensi/' . $row->photo_path); ?>" width="30"> | 
                                            <img src="<?php echo base_url('upload/presensiout/' . $row->photo_path_keluar); ?>" width="30">
                                        <?php else: ?>
                                            Tidak ada foto
                                        <?php endif; ?>
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
