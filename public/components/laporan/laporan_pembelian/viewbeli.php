<?php
include '../../../../src/conn.php';

$nobeli = $_GET['nobeli'];
$tanggal = $_GET['tanggal'];
$tanggal2 = $_GET['tanggal2'];
$user = $_GET['user'];
$namasup = $_GET['namasup'];

$syarat = "";
if ($nobeli == "") {
    $syarat = "no !=''";
} else {
    $syarat = "no='$nobeli'";
}
if (($tanggal != "") && ($tanggal2 != "")) {
    $syarat .= "and tgl between '$tanggal' and '$tanggal2'";
}
if ($namasup != "") {
    $syarat .= "and kodesup='$namasup' ";
}

$result = mysqli_query($conn, ("SELECT*FROM tbbeli Where $syarat"))

?>
<table class="table-content" border="1">
    <tr>
        <th>
            NO
        </th>
        <th>
            Nobeli
        <th>
            Tanggal
        </th>
        <th>
            supplier
        </th>
        <th>
            User
        </th>
        <th>
            namabarang
        </th>
        <th>
            jumlah
        </th>
        <th>
            harga
        </th>
        <th>
            total
        </th>
        <th>
            subtotal
        </th>
        <th>
            disc
        </th>
        <th>
            pajak
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
        $kodesup = $row['kodesup'];
        $kodeuser = $row['kodeuser'];
        $sumsubtotal += $subtotal;
        $sumdisc += $disc;
        $sumpajak += $pajak;
        $sumgrandtotal += $grandtotal;
        $nomor = $x++;
        $result2 = mysqli_query($conn, ("SELECT tmp.*,tb.nama FROM tbbelidetil as tmp INNER join tbbarang as tb on tmp.kodebarang = tb.kodebarang WHERE tmp.no='$no' "));

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
                    <?= $no; ?>
                </td>
                <td>
                    <?= $tgl; ?>
                </td>
                <td>
                    <?= $kodesup; ?>
                </td>
                <td>
                    <?= $kodeuser; ?>
                </td>
                <td>
                    <?php echo $namabarang; ?>
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
            $kodesup = "";
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