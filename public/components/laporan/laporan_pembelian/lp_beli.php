<?php

include "../../../../src/conn.php";

$query = "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembelian</title>
</head>

<script src="_lp_beli.js"></script>

<body>
    <section class="container">
        <form action="">
            <table border="0">
                <tr>
                    <td>Tgl</td>
                    <td>:</td>
                    <td>
                        <input type="date" name="tgl" id="tgl"> -
                        <input type="date" name="tgl2" id="tgl2">
                    </td>
                </tr>
                <tr>
                    <td>No Beli</td>
                    <td>:</td>
                    <td>
                        <select name="kodebeli" id="kodebeli">
                            <?php

                            $sql = "SELECT * FROM tbbeli";
                            $query = mysqli_query($conn, $sql);
                            while ($re = mysqli_fetch_array($query)) : {
                                    $kodebeli = $re['no'];
                                    $subtotal = $re['subtotal'];
                                    $disc = $re['disc'];
                                    $pajak = $re['pajak'];
                                    $grandtotal = $re['grandtotal']
                            ?>

                                    <option value="<?= $kodebeli ?>">
                                        <?= $kodebeli ?>
                                    </option>

                            <?php
                                }
                            endwhile;
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nama Supplier</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="supplier" id="supplier" readonly>
                    </td>
                </tr>
                <tr>
                    <td>User</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="user" id="user" readonly>
                    </td>
                </tr>
            </table>
            <button id="view" name="view" value="view">View</button>
        </form>
    </section>
</body>

</html>