<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAKTUR PELUNASAN</title>
</head>

<body onload="window.print();">
    <table border="0" style="text-align: center; width: 100%;">
        <tr>
            <td colspan="3">
                <h2 style="height: 2px;">Man Photo Digital Studio</h2>
                <small style="height: 2px;"> Telp : +62 822 8747 4767</small>
                <hr style="border: none;border-top: 2px solid #000;">
            </td>
        </tr>
        <tr style="text-align: left;">
            <td>INVOICE</td>
            <td>:</td>
            <td><?= $id_pemesanan ?></td>
        </tr>
        <tr style="text-align: left;">
            <td>TANGGAL BOOKING</td>
            <td>:</td>
            <td><?= date('d-m-Y', strtotime($tgl_trx)) ?></td>
        </tr>
        <tr style="text-align: left;">
            <td>JAM BOOKING</td>
            <td>:</td>
            <td><?= $jam ?></td>
        </tr>
        <tr style="text-align: left;">
            <td>NAMA PELANGGAN</td>
            <td>:</td>
            <td><?= $nama_member ?></td>
        </tr>
        <tr style="text-align: left;">
            <td>PAKET</td>
            <td>:</td>
            <td><?= $nama_paket ?></td>
        </tr>
        <tr style="text-align: left;">
            <td>STATUS</td>
            <td>:</td>
            <td><?php if ($sisa_bayar == 0) {
                    echo "LUNAS";
                } else {
                    echo "BELUM LUNAS";
                }  ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <hr style="border: none;border-top: 2px dashed #000;">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table style="width: 100%; text-align: left; font-size: 10pt;">



                </table>

            </td>
        </tr>
        <tr style="text-align: right;">
            <td></td>
            <td></td>
            <td>
                <b> Total bayar : Rp. <?= number_format($ttl_bayar, 0, ",", ".") ?></b><br>
                <b> Sisa Bayar : Rp. <?= number_format($sisa_bayar, 0, ",", ".") ?></b>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr style="border: none;border-top: 2px dashed #000;">
            </td>
        </tr>

        <tr style="text-align: right;">
            <td style="text-align: left;"><?php if ($sisa_bayar > 0) {
                                                echo "note: pelunasan dilakukan setelah pemberian album.";
                                            } ?></td>
            <td></td>
            <td>
                <b> Total Keseluruhan : Rp. <?= number_format($ttl_bayar + $sisa_bayar, 0, ",", ".") ?></b><br>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <h5>---TERIMA KASIH TELAH BEKERJASAMA DENGAN KAMI---</h5>

            </td>
        </tr>

    </table>

</body>

</html>