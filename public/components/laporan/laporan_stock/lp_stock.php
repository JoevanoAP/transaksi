<?php

include "../../../../src/conn.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok</title>
</head>

<body>
    <div class="lap">
        <div class="lap-content">
            <div class="lap-content-inner">
                <label for="exampleInputPassword1">Nama Barang</label>

                <select id="namabarang" onclick="tampil_barang(this.value)">
                    <option value="">Nama Barang</option>
                    <?php

                    $result = mysqli_query($conn, "SELECT * FROM tbbarang");

                    while ($row = mysqli_fetch_assoc($result)) {
                        $kodebarang = $row['kodebarang'];
                        $nama = $row['nama'];
                        $jenis = $row['jenis'];
                        $merk = $row['merk'];
                        $satuan = $row['satuan'];
                        $jlh = $row['jlh_stok'];
                        $hargabeli = $row['hargabeli']
                    ?>
                        <option class="option" value="<?= $kodebarang ?>" id="nama">
                            <?php echo $nama; ?>
                        </option>
                    <?php
                    };
                    ?>

                </select>
            </div>
            <div class="lap-content-inner">
                <label for="exampleInputEmail1">Jumlah Stok</label>

                <select name="" id="operator">
                    <option value="">Jumlah</option>
                    <option value="=">=</option>
                    <option value=">=">>=</option>
                    <option value="<=">
                        <= </option>
                    <option value=">">></option>
                    <option value="<">
                        < </option>
                </select>
                <input type="text " id="jlh">
            </div>
            <div class="lap-content-inner">
                <label for="exampleInputEmail1">Merk</label>
                <input type="text" id="merek">

            </div>
            <div class="lap-content-inner">
                <label for="exampleInputEmail1">Jenis</label>
                <input type="text" id="jenis">

            </div>
            <div class="mt-3 row">
                <button class="btn btn-outline-info" onclick="viewstock()">View</button>
            </div>
        </div>
        <div id="table" class="table"></div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script>
            function viewstock() {
                const ajaxku = new XMLHttpRequest();
                ajaxku.onload = function() {
                    document.getElementById("table").innerHTML = this.responseText;
                };
                var namabarang = document.getElementById("namabarang").value;
                var op = document.getElementById("operator").value;
                var jlh = document.getElementById("jlh").value;
                var merek = document.getElementById("merek").value;
                var jenis = document.getElementById("jenis").value;
                var url = "viewstock.php?op=" + op + "&jlh=" + jlh + "&merek=" + merek + "&jenis=" + jenis + "&namabarang=" + namabarang;

                ajaxku.open("GET", url);
                ajaxku.send();

                return false;
            }
        </script>
</body>

</html>