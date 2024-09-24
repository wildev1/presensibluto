<!-- application/views/pages/presensi/cetak-laporan.php -->
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
   <style>
        @media print {
            body {
                font-size: 12;
                margin: 0; /* Hapus margin default body */
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th {
                border: 1px solid #ddd;
                text-align: center;
                padding: 10px;
            }
            td {
                border: 1px solid #ddd;
                text-align: center;
                padding: 5px;
            }
            .ttd {
                text-align: right;
            }
            .ttd p {
                margin: 0; /* Menghilangkan margin default dari tag <p> */
            }
            /* Letakkan footer di paling bawah halaman */
            #footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #fff; /* Ganti warna sesuai kebutuhan */
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><?php echo $title; ?></h1>
        <p>Periode: <?php echo $date_awal; ?> / <?php echo $date_akhir; ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
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

	 <script>
        window.onload = function () {
            window.print();
            window.onafterprint = function () {
                window.history.back();
            };
        };
    </script>
</body>
</html>
