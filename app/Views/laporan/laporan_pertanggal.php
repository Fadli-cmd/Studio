<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body onload="window.print()">

    <table style="width: 100%;">
        <tr>
            <th style="text-align: center;" rowspan="3"><img width="100" height="100" src="\dist\img\Production.png" alt="Italian Trulli"></th>
            <th style="height: 10px;">
                <br><br>Man Photo Digital Studio<br>Jln.imam bonjol no 37 balai balai Kota Padang Panjang, Sumatera Barat<br>Telp: +62 831 2147 4685
            </th>
            <th style="text-align: left;" rowspan="3"><img width="100" height="100" src="\dist\img\boxed-bg.png" alt="Italian Trulli"></th>
        </tr>
        <tr>
            <td style="text-align: center;">
                <p></p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
            </td>
        </tr>
    </table>
    <br><br>
    <h3 style="text-align: center;">Laporan Pemesanan </h3>
    <h3 style="text-align: center;">PerTanggal</h3>
    <p><b>PERIODE :</b> <?= $tglAwal ?> s/d. <?= $tglAkhir ?></p>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Booking</th>
            <th>Nama Pelanggan</th>
            <th>Jenis Paket</th>
            <th>Tanggal Take</th>
            <th>Biaya</th>
            <th>Sisa</th>
            <th>Status</th>
            <th>Ket. Pembayaran</th>
        </tr>
        <?php $a = 1;
        for ($i = 0; $i < count($tanggal); $i++) { ?>
            <tr>
                <td><?= $a; ?></td>
                <td><?= $tanggal[$i]['id_pemesanan'] ?></td>
                <td><?= $tanggal[$i]['nama_member'] ?></td>
                <td><?= $tanggal[$i]['nama_paket'] ?></td>
                <td><?= $tanggal[$i]['tgl_take'] ?></td>
                <td>Rp.<?= number_format($tanggal[$i]['ttl_bayar']) ?></td>
                <td>Rp.<?= number_format($tanggal[$i]['sisa_bayar']) ?></td>
                <td><?= $tanggal[$i]['stts_trx'] ?></td>
                <td><?php if ($tanggal[$i]['sisa_bayar'] > 0) {
                        echo "LUNAS";
                    } else {
                        echo "BELUM LUNAS";
                    } ?></td>
            </tr>
        <?php $a++;
        } ?>
    </table>
    <br><br>
    <table style="width: 100%;">
        <tr>
            <th style="text-align: left;"><img width="100" height="100" src="\dist\img\boxed-bg.png" alt="Italian Trulli"></th>
            <th style="height: 10px;">
            <th style="text-align: left;"><img width="100" height="100" src="\dist\img\boxed-bg.png" alt="Italian Trulli"></th>
            <td style="text-align: center;">Padang <?= date("Y-M-d") ?></td>
        </tr>
        <tr>
            <th style="text-align: left;"></th>
            <th style="height: 10px;">
            <th style="text-align: left;"></th>
            <td style="text-align: center;">Pimpinan</td>
        </tr>
        <tr>
            <td style="text-align: center;">
            </td>
        </tr>
    </table>
</body>

</html>