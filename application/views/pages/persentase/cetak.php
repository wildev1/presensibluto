<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style>
    @media print {
        body {
            font-size: 12;
            margin: 0;
			font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .logo {
            height: 80px;
            margin-right: 20px;
            margin-left: 0;
        }

        .text-container {
            display: flex;
            flex-direction: column;
        }

        .title {
            font-size: 18px;
            color: #333;
            margin: 2px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
            background-color: #f0f0f0;
        }

        td {
            border: 1px solid #ddd;
            padding: 5px;
        }

        .ttd {
            text-align: right;
        }

        .ttd p {
            margin: 0;
        }

        #footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            text-align: center;
        }
    }
    </style>
</head>

<body>
    <header class="header">
		<img src="<?php echo base_url('upload/logo/logo.png'); ?>" alt="Logo" class="logo">
        <div class="title-container">
            <h1 class="title">KEUANGAN SPP</h1>
            <h1 class="title">PONDOK PESANTREN ANNUQAYAH LATEE</h1>
            <h1 class="title">GULUK-GULUK SUMENEP JAWA TIMUR</h1>
			<h1 class="title">
                MASA KHIDMAT <?php echo date("Y") . "/" . (date("Y") + 1); ?>
            </h1>
        </div>
    </header>
    <h4 align="center">PERSENTASE KEUANGAN SPP PER-ESELON</h4>


    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th width="10px">No</th>
                    <th>Tingkatan Santri</th>
                    <th>Pembayaran</th>
                    <th>Potongan</th>
                    <th>Keterangan</th>
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
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <br>
    <br>
    <b>Keterangan :</b>
    <p><i>Pembayaran bisa dilakukan dua tahap, semester I dan II</i></p>

    <script>
		window.onload = function() {
			window.print();
			window.onafterprint = function() {
				window.history.back();
			};
		};
    </script>
</body>

</html>
