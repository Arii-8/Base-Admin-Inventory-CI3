<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>

    <!-- Include CSS styles for printing -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/adminlte.min.css">
    <style>
        @media print {
            /* Set paper size to A4 and landscape orientation */
            @page {
                size: A4 landscape;
                margin: 20px;
            }

            /* Remove margin and padding from body */
            body {
                margin: 0;
                padding: 0;
                font-weight: bold;
            }

            /* Set font styles and sizes for printing */
            body {
                font-family: Arial;
                font-size: 12pt;
            }

            th {
                background-color: #D7DBDD ;
            }

            td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            /* Hide elements that should not be printed */
            .no-print {
                display: none;
            }

            footer.footer {
                /* position: fixed; */
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #f5f5f5;
                text-align: center;
                padding: 10px 0;
                font-size: 10pt;
                border-top: 1px solid #ddd;
            }
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <br><br>
        <h1 class="text-center">Laporan Barang Keluar</h1>
        <hr style="border-bottom: 3px solid #212529; width: 405px;">
        <p class="text-center">Laporan Tanggal: <?php echo date( "Y-m-d-h"); ?> (Indonesia)</p>
        <br>
        <table class="table table-bordered table-vecenter card-table table-nowrap text-nowrap table-hover responsive w-100" id="dataTable" width="100%" cellspacing="0">
            <thead> 
                <tr>
                    <th>ID Transaksi</th> 
                    <th>Tanggal Keluar Barang</th>
                    <th>Lokasi</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan Barang</th>
                    <th>Jumlah Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($report_data)) : ?>
                <tr>
                    <td><?php echo $report_data[0]->id_transaksi; ?></td>
                    <td><?php echo $report_data[0]->tanggal_keluar; ?></td>
                    <td><?php echo $report_data[0]->lokasi; ?></td>
                    <td><?php echo $report_data[0]->kode_barang; ?></td>
                    <td><?php echo $report_data[0]->nama_barang; ?></td>
                    <td><?php echo $report_data[0]->nama_satuan; ?></td>
                    <td><?php echo $report_data[0]->jumlah_barang; ?></td>
                </tr>
                <?php else : ?>
                    <?php echo "<h1>Lah, Kok Hilang??</h1>"; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <br>

        <table class="table table-bordered table-vecenter card-table table-nowrap text-nowrap table-hover responsive w-100" id="dataTable" width="100%" cellspacing="0">
            <thead> 
                <tr>
                    <th>Nama Kurir</th> 
                    <th>Alamat Kurir</th>
                    <th>Jenis Kelamin Kurir</th>
                    <th>Usia Kurir</th>
                    <th>Jenis Kurir</th>
                    <th>Kode Barang</th>
                    <th>Waktu Pengantaran</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($report_data)) : ?>
                <tr>
                    <td><?php echo $report_data[0]->tabelkurir_name; ?></td>
                    <td><?php echo $report_data[0]->tabelkurir_alamat; ?></td>
                    <td><?php echo $report_data[0]->tabelkurir_jekel; ?></td>
                    <td><?php echo $report_data[0]->tabelkurir_usia; ?></td>
                    <td><?php echo $report_data[0]->tabelkurir_jeken; ?></td>
                    <td><?php echo $report_data[0]->kode_barang; ?></td>
                    <td><?php echo date( "Y-m-d"); ?></td>
                </tr>
                <?php else : ?>
                    <?php echo "<h1>Lah, Kok Hilang??</h1>"; ?>
                <?php endif; ?>
            </tbody>
        </table>
        
        <footer class="footer">
            <div class="container-fluid">
                <span class="text-muted"><h4>PT.XXX-XXX-XXX.</h4></span>
                <br>
                <span class="text-muted">Alamat: XXX-XXX-XXX.</span>
                <br>
                <span class="text-muted">Phone: XXX-XXX-XXX. | WEB: WWW.XXX-XXX-XXX. | Email: XXX@XXX.co.id </span>
            </div>
        </footer>
    </div>

    <script>
        window.print();
    </script>

    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>
