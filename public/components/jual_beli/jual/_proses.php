<?php
include "../../../../src/conn.php";

$nojual = $_POST['nojual'];
$tgl = $_POST['tgl'];
$kodeuser = $_POST['kodeuser'];
$kodepel = $_POST['kodepel'];
$kodesales = $_POST['kodesales'];
$subtotal = $_POST['subtotal'];
$disc = $_POST['disc'];
$pajak = $_POST['pajak'];
$grandtotal = $_POST['grandtotal'];

$s1 = "insert into tbjual (no, tgl, kodepel, kodeuser, kodesales, subtotal, disc, pajak, grandtotal) values ('$nojual','$tgl','$kodepel','$kodeuser','$kodesales','$subtotal','$disc','$pajak','$grandtotal')";
$q1 = mysqli_query($conn, $s1);
$s2 = "select * from tempjualdetil where no='$nojual'";
$q2 = mysqli_query($conn, $s2);

while ($re2 = mysqli_fetch_array($q2)) {
    $kodebarang = $re2['kodebarang'];
    $jlh = $re2['jlh'];
    $harga = $re2['harga'];
    $total = $re2['total'];

    $s3 = "insert into tbjualdetil(no, kodebarang, jlh, harga, total) values ('$nojual','$kodebarang','$jlh','$harga','$total')";
    $q3 = mysqli_query($conn, $s3);

    $s4 = "update tbbarang set jlh_stok= jlh_stok - $jlh where kodebarang='$kodebarang'";
    $q4 = mysqli_query($conn, $s4);
}
$s5 = "delete from tempjualdetil where no='$nojual'";
$q5 = mysqli_query($conn, $s5);
header("location:frm_jual.php");
