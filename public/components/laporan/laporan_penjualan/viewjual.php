<?php
include '../../../../src/conn.php';

$nojual = $_GET['nojual'];
$tanggal = $_GET['tanggal'];
$tanggal2 = $_GET['tanggal2'];
$user = $_GET['user'];
$namapel = $_GET['namapel'];

$syarat = "";
if ($nojual == "") {
    $syarat = "no !=''";
} else {
    $syarat = "no='$nojual'";
}
if (($tanggal != "") && ($tanggal2 != "")) {
    $syarat .= "and tgl between '$tanggal' and '$tanggal2'";
}
if ($namapel != "") {
    $syarat .= "and kodepel='$namapel' ";
}

$result = mysqli_query($conn, ("SELECT*FROM tbjual Where $syarat"))

?>
<table class="table" border="1">
    <tr>
        <th>
            No
        </th>
        <th>
            No jual
        <th>
            Tanggal
        </th>
        <th>
            Nama Pelangan
        </th>
        <th>
            User
        </th>
        <th>
            Nama Barang
        </th>
        <th>
            Jumlah
        </th>
        <th>
            Harga
        </th>
        <th>
            Total
        </th>
        <th>
            Sub Total
        </th>
        <th>
            Disc
        </th>
        <th>
            Pajak
        </th>
        <th>
            grandtotal
        </th>
    </tr>
    <?php
    $x = 1;
    $sumsubtotal = "0";
    $sumdisc = "0";
    $sumpajak = "0";
    $sumgrandtotal = "0";

    while ($row = mysqli_fetch_assoc($result)) {
        $no = $row['no'];
        $subtotal = $row['subtotal'];
        $disc = $row['disc'];
        $pajak = $row['pajak'];
        $grandtotal = $row['grandtotal'];
        $tgl = $row['tgl'];
        $kodepel = $row['kodepel'];
        $kodeuser = $row['kodeuser'];
        $sumsubtotal += $subtotal;
        $sumdisc += $disc;
        $sumpajak += $pajak;
        $sumgrandtotal += $grandtotal;
        $nomor = $x++;
        $result2 = mysqli_query($conn, ("SELECT tmp.*,tb.nama FROM tbjualdetil as tmp INNER join tbbarang as tb on tmp.kodebarang = tb.kodebarang WHERE tmp.no='$no'"));

        while ($row2 = mysqli_fetch_assoc($result2)) {
            $namabarang = $row2['nama'];
            $jlh = $row2['jlh'];
            $harga = $row2['harga'];
            $total = $row2['total'];
    ?>
            <tr>
                <td>
                    <?= $nomor ?>
                </td>
                <td>
                    <?= $no ?>
                </td>
                <td>
                    <?= $tgl ?>
                </td>
                <td>
                    <?= $kodepel ?>
                </td>
                <td>
                    <?= $kodeuser ?>
                </td>
                <td>
                    <?= $namabarang ?>
                </td>
                <td>
                    <?= $jlh ?>
                </td>
                <td>
                    <?= $harga ?>
                </td>
                <td>
                    <?= $total ?>
                </td>
                <td>
                    <?= $subtotal ?>
                </td>
                <td>
                    <?= $disc ?>
                </td>
                <td>
                    <?= $pajak ?>
                </td>
                <td>
                    <?= $grandtotal ?>
                </td>
            </tr>
    <?php

            $no = "";
            $subtotal = "";
            $pajak = "";
            $disc = "";
            $grandtotal = "";
            $tgl = "";
            $kodepel = "";
            $kodeuser = "";
            $nomor = "";
        }
    }
    ?>
    <tr>
        <td colspan="8"></td>
        <td>TOTAL</td>
        <td>
            <?= $sumsubtotal ?>
        </td>
        <td><?= $sumdisc ?></td>
        <td><?= $sumpajak ?></td>
        <td><?= $sumgrandtotal ?></td>
    </tr>
</table>