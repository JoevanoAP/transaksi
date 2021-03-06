<?php

include '../../../../src/conn.php';
$tanggal = date('Y-m-d');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Beli</title>
</head>

<body>
    <div class="lap">
        <div class="lap-content">
            <div class="lap-content-inner">
                <label for="exampleInputPassword1">Tanggal</label>
                <input type="text" id="tanggal" value="">
                <input type="text" id="tanggal2" value="<?= $tanggal ?>">
            </div>
            <div class="lap-content-inner">
                <label for="exampleInputEmail1">No beli</label>
                <input type="text" id="nobeli">

            </div>
            <div class="lap-content-inner">
                <label for="exampleInputEmail1">Nama Supplier</label>
                <input type="text" id="namasup">

            </div>
            <div class="lap-content-inner">
                <label for="exampleInputEmail1">User</label>
                <input type="text" id="user">

            </div>
            <div class="lap-content-inner">
                <button class="btn" onclick="viewbeli()">View</button>
            </div>
        </div>
        <div id="table" class="table"></div>

        <!-- Jquery Inject -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script>
            function viewbeli() {
                var nobeli = $("#nobeli").val();
                var tanggal = $("#tanggal").val();
                var tanggal2 = $("#tanggal2").val();
                var user = $("#user").val();
                var namasup = $("#namasup").val();
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById("table").innerHTML = this.responseText;
                };
                var url = "viewbeli.php?nobeli=" + nobeli + "&tanggal=" + tanggal + "&tanggal2=" + tanggal2 + "&user=" + user + "&namasup=" + namasup;
                xhttp.open("GET", url)
                xhttp.send();
                return false;
            }
        </script>
    </div>
</body>

</html>