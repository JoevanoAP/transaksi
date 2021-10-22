<?php

include "../../src/conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/css/main.css">
    <title>Data Barang</title>
</head>

<script src="https://kit.fontawesome.com/14cfca22c7.js" crossorigin="anonymous"></script>
<script src="../../src/js/_barang.js"></script>

<body>
    <section class="container">
        <section class="block" id="form">
            <form>
                <div class="user-details">
                    <div class="user-input">
                        <label for="">Kode Barang</label>
                        <input type="text" name="kodebarang" id="kodebarang">
                    </div>
                    <div class="user-input">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama">
                    </div>
                    <div class="user-input">
                        <label for="">Jenis</label>
                        <input type="text" name="jenis" id="jenis">
                    </div>
                    <div class="user-input">
                        <label for="">Merk</label>
                        <input type="text" name="merk" id="merk">
                    </div>
                    <div class="user-input">
                        <label for="">Satuan</label>
                        <input type="text" name="satuan" id="satuan">
                    </div>
                    <div class="user-input">
                        <label for="">Jumlah Stok</label>
                        <input type="number" name="jumlahstok" id="jumlahstok">
                    </div>
                    <div class="user-input">
                        <label for="">Harga Jual</label>
                        <input type="text" name="hargajual" id="hargajual">
                    </div>
                    <div class="user-input">
                        <label for="">Harga Beli</label>
                        <input type="text" name="hargabeli" id="hargabeli">
                    </div>
                    <div class="user-input">
                        <label for="">Ket</label>
                        <input type="text" name="ket" id="ket">
                    </div>
                </div>
                <button type="button" class="btn" id="button" name="button" value="simpan" onclick="simpan()">Insert
                    Data</button>
            </form>
        </section>
    </section>
    <div id="data"></div>
</body>

</html>