<?php

include "../../../../src/conn.php";
$kodebarang = $_GET['kodebarang'];
$barang = mysqli_query($conn, "SELECT jlh_stok from tbbarang where kodebarang = '$kodebarang'")->fetch_array()['jlh_stok'];

if ($barang == 150) {
    echo '=';
} else if ($barang > 150) {
    echo '>';
} else if ($barang < 150) {
    echo '<';
}
