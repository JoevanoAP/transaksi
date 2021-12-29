<?php
include '../../../../src/conn.php';

$kodebarang = $_GET['namabarang'];
$op = $_GET['op'];
$jlh = $_GET['jlh'];
$merek = $_GET['merek'];
$jenis = $_GET['jenis'];
$syarat = "";

if ($kodebarang == "") {
    $syarat = "kodebarang !=''";
} else {
    $syarat = "kodebarang='$kodebarang'";
}
if ($jlh != "") {
    $syarat .= "and jlh_stok $op $jlh";
}

if ($merek != "") {
    $syarat .= "and merk='$merek' ";
}
if ($jenis != "") {
    $syarat .= "and jenis='$jenis' ";
}

$result = mysqli_query($conn, "SELECT * FROM tbbarang WHERE $syarat")

?>

<table class="table" border="1">
    <tr>
        <th>No</th>
        <th>Kode barang</th>
        <th>Nama barang</th>
        <th>Jenis</th>
        <th>Merk</th>
        <th>Satuan</th>
        <th>Jumlah</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
    </tr>
    <?php
    $x = 1;

    while ($row = mysqli_fetch_array($result)) : {
            $kodebarang = $row['kodebarang'];
            $namabarang = $row['nama'];
            $jenis = $row['jenis'];
            $merk = $row['merk'];
            $satuan = $row['satuan'];
            $jlh_stok = $row['jlh_stok'];
            $hargajual = $row['hargajual'];
            $hargabeli = $row['hargabeli'];


    ?>
            <tr>
                <td><?= $x ?></td>
                <td><?= $kodebarang ?></td>
                <td><?= $namabarang ?></td>
                <td><?= $jenis ?></td>
                <td><?= $merk ?></td>
                <td><?= $satuan ?></td>
                <td><?= $jlh_stok ?></td>
                <td><?= $hargajual ?></td>
                <td><?= $hargabeli ?></td>

            </tr>

    <?php
            $x++;
        }
    endwhile;
    ?>
</table>