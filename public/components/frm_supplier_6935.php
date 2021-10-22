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
    <title>Data Supplier</title>
</head>

<script src="https://kit.fontawesome.com/14cfca22c7.js" crossorigin="anonymous"></script>
<script src="../../src/js/_supplier.js"></script>

<body>
    <section class="container">
        <section class="block" id="form">
            <form>
                <div class="user-details">
                    <div class="user-input">
                        <label for="">Kode Supplier</label>
                        <input type="text" name="kodesup" id="kodesup">
                    </div>
                    <div class="user-input">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama">
                    </div>
                    <div class="user-input">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="alamat"></textarea>
                    </div>
                    <div class="user-input">
                        <label for="">Telp</label>
                        <select id="unique" name="unique">
                            <option value="0">ID(+62)</option>
                        </select>
                        <input type="number" name="telp" id="telp" placeholder="085...">
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