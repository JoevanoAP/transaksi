<?php

include "../../../../src/conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stock</title>
</head>

<script src="_lp_stock.js"></script>

<body>
    <section class="container">
        <form>
            <table border="0">
                <tr>
                    <td>Nama Barang</td>
                    <td>:</td>
                    <td>
                        <select name="barang" id="barang">
                            <?php

                            $query = mysqli_query($conn, "SELECT * from tbbarang");
                            while ($re = mysqli_fetch_array($query)) : {
                                    $kodebarang = $re['kodebarang'];
                                    $namabarang = $re['nama'];
                                    $merk = $re['merk'];
                                    $jenis = $re['jenis'];
                            ?>
                                    <option value="<?= $kodebarang ?>" id="nama_barang" onclick="tampil_barang(<?= "'$kodebarang', '$namabarang', '$merk', '$jenis'" ?>)">
                                        <?= $namabarang ?>
                                    </option>
                            <?php
                                };
                            endwhile;
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah Stock</td>
                    <td>
                        <p id="operation"></p>
                    </td>
                    <td>
                        <input type="number" name="jumlah" id="jumlah" value="150">
                    </td>
                </tr>
                <tr>
                    <td>Merk</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="merk" id="merk" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Jenis</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="jenis" id="jenis" readonly>
                    </td>
                </tr>
            </table>
            <button type="button" name="view" id="view" onclick="view()">View</button>
        </form>
        <div class="data"></div>
    </section>

</body>

<script>
    var x;

    const ajax = new XMLHttpRequest();

    function tampil_barang(kodebarang, namabarang, merk, jenis) {
        ajax.onload = function() {
            document.getElementById('operation').innerHTML = this.responseText;
        }

        document.getElementById('merk').value = merk
        document.getElementById('jenis').value = jenis

        ajax.open('GET', 'data_lp_stock.php?kodebarang=' + kodebarang);
        ajax.send();

        x = kodebarang;
    }

    function view() {
        const ajax = new XMLHttpRequest();
        ajax.onload = function() {
            document.getElementById('data').innerHTML = this.responseText;
        }


    }
</script>

</html>