<?php

include "../../../../src/conn.php";
$query = mysqli_query($conn, 'SELECT jlh_stok from tbbarang');

?>

<table>

    <head>
        <tr>
            <th>kodebarang</th>
            <th>nama</th>
            <th>jenis</th>
            <th>merk</th>
            <th>satuan</th>
            <th>jlh_stok</th>
            <th>harga jual</th>
            <th>harga beli</th>
        </tr>

    </head>
</table>