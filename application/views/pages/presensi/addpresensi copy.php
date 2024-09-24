<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

					 <?php if (!empty($shifts)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama Shift</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Durasi</th>
                    <th>Hari</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shifts as $shift): ?>
                    <tr>
                        <td><?php echo $shift->nama_shift; ?></td>
                        <td><?php echo $shift->jam_mulai; ?></td>
                        <td><?php echo $shift->jam_selesai; ?></td>
                        <td><?php echo $shift->durasi; ?></td>
                        <td><?php echo $shift->hari; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data shift yang tersedia.</p>
    <?php endif; ?>

	<?php if ($check_in_active): ?>
		<button type="button" onclick="window.location.href='<?php echo site_url('presensi/check_in'); ?>'" class="btn btn-primary waves-effect waves-light w-sm">
			<i class="mdi mdi-upload d-block font-size-16"></i> Check In
		</button>
	<?php else: ?>
		<button type="button" class="btn btn-light waves-effect waves-light w-sm">
			<i class="mdi mdi-upload d-block font-size-16" disabled></i> Check In
		</button>
	<?php endif; ?>

	<?php if ($check_out_active): ?>
		<button type="button" onclick="window.location.href='<?php echo site_url('presensi/check_out'); ?>'" class="btn btn-primary  waves-effect waves-light w-sm">
			<i class="mdi mdi-download d-block font-size-16"></i>Check Out</button>
	<?php else: ?>
		<button type="button" class="btn btn-light waves-effect waves-light w-sm">
			<i class="mdi mdi-download d-block font-size-16" disabled></i> Check Out
		</button>
	<?php endif; ?>

						<!-- Form Check In -->
    

                </div>
            </div>
        </div>
    </div>
