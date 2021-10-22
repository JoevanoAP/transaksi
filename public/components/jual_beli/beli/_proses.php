<?php
include "../../../../src/conn.php";

$nobeli = $_POST['nobeli'];
$tgl = $_POST['tgl'];
$kodeuser = $_POST['kodeuser'];
$kodesup = $_POST['kodesup'];
$subtotal = $_POST['subtotal'];
$disc = $_POST['disc'];
$pajak = $_POST['pajak'];
$grandtotal = $_POST['grandtotal'];

$s1 = "INSERT INTO tbbeli (no, tgl, kodesup, kodeuser, subtotal, disc, pajak, grandtotal) VALUES ('$nobeli','$tgl','$kodesup','$kodeuser','$subtotal','$disc','$pajak','$grandtotal')";
$q1 = mysqli_query($conn, $s1);
$s2 = "SELECT * FROM tempbelidetil WHERE no='$nobeli'";
$q2 = mysqli_query($conn, $s2);
while ($re2 = mysqli_fetch_array($q2)) {
    $kodebarang = $re2['kodebarang'];
    $jlh = $re2['jlh'];
    $harga = $re2['harga'];
    $total = $re2['total'];

    $s3 = "INSERT INTO tbbelidetil(no, kodebarang, jlh, harga, total) VALUES ('$nobeli','$kodebarang','$jlh','$harga','$total')";
    $q3 = mysqli_query($conn, $s3);

    $s4 = "UPDATE tbbarang SET jlh_stok= jlh_stok + $jlh WHERE kodebarang='$kodebarang'";
    $q4 = mysqli_query($conn, $s4);
}
$s5 = "DELETE FROM tempbelidetil WHERE no='$nobeli'";
$q5 = mysqli_query($conn, $s5);
header("location:frm_beli.php");