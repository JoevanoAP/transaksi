<?php
session_start();
include '../../../../src/conn.php';
$s1 = "SELECT * FROM tbjual";
$q1 = mysqli_query($conn, $s1);
$num1 = mysqli_num_rows($q1);
$nojual = "JL-" . $num1;
$tgl = date("Y-m-d");
$_SESSION['kodeuser'] = $kodeuser;
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Jual</title>
</head>

<body>
    <form action="_proses.php" method="POST">
        <table border="0">
            <tr>
                <td>No Jual</td>
                <td>:</td>
                <td><input type="text" name="nojual" id="nojual" value="<?php echo $nojual; ?>" readonly></td>
                <td></td>
                <td>Pelanggan</td>
                <td>:</td>
                <td>
                    <select name="kodepel" id="kodepel">
                        <?php
                        $sql = "SELECT * FROM tbpelanggan";
                        $query = mysqli_query($conn, $sql);
                        while ($re = mysqli_fetch_array($query)) : {
                                $kodepel = $re['kodepel'];
                                $nama = $re['nama'];
                                $telp = $re['telp'];
                                $alamat = $re['alamat'];
                        ?>
                        <option value="<?php echo $kodepel; ?>"
                            onclick="tampil_sup(<?php echo "'$nama','$alamat','$telp'"; ?>)">
                            <?php echo $nama; ?>
                        </option>
                        <?php
                            };
                        endwhile;
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>
                    <input type="text" name="tgl" id="tgl" value="<?php echo $tgl; ?>" readonly>
                </td>
                <td>&nbsp;</td>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <textarea name="alamat" id="alamat" readonly></textarea>
                </td>
            </tr>

            <tr>
                <td>User</td>
                <td>:</td>
                <td>
                    <select name="kodeuser" id="kodeuser">
                        <?php
                        $s2 = "SELECT * FROM tbuser";
                        $q2 =  mysqli_query($conn, $s2);
                        while ($re2 = mysqli_fetch_array($q2)) {
                            $kodeuser = $re2['kodeuser'];
                            $namauser = $re2['nama'];
                        ?>
                        <option value="<?php echo $kodeuser; ?>"><?php echo $namauser; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
                <td></td>
                <td>Telp</td>
                <td>:</td>
                <td>
                    <select id="unique" name="unique">
                        <option value="0">ID(+62)</option>
                    </select>
                    <input type="text" name="telp" id="telp" value="" readonly>
                </td>
            </tr>

            <tr>
                <td>Sales</td>
                <td>:</td>
                <td>
                    <select name="kodesales" id="kodesales">
                        <?php
                        $s2 = "SELECT * FROM tbsales";
                        $q2 =  mysqli_query($conn, $s2);
                        while ($re2 = mysqli_fetch_array($q2)) {
                            $kodesales = $re2['kodesales'];
                            $namauser = $re2['nama'];
                        ?>
                        <option value="<?php echo $kodesales; ?>"><?php echo $namauser; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>

        <table border="0">
            <tr>
                <td>
                    <select name="kodebarang" id="kodebarang">
                        <?php
                        $s3 = "SELECT * FROM tbbarang";
                        $q3 = mysqli_query($conn, $s3);
                        while ($re3 = mysqli_fetch_array($q3)) {
                            $kodebarang = $re3['kodebarang'];
                            $namabarang = $re3['nama'];
                            $jenis = $re3['jenis'];
                            $merk = $re3['merk'];
                            $satuan = $re3['satuan'];
                            $hargabeli = $re3['hargabeli'];
                        ?>
                        <option value="<?php echo $kodebarang; ?>"
                            onclick="tampil_barang(<?php echo "'$jenis','$merk','$satuan','$hargabeli'" ?>)">
                            <?php echo $namabarang; ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="text" name="jenis" id="jenis" value="" readonly placeholder="Jenis">
                </td>

                <td>
                    <input type="text" name="merk" id="merk" readonly placeholder="Merk">
                </td>

                <td>
                    <input type="text" name="satuan" id="satuan" readonly placeholder="Satuan">
                </td>

                <td>
                    <input type="text" name="jlh" id="jlh" value="" onkeyup="htg_total()" placeholder="Jumlah">
                </td>

                <td>
                    <input type="text" name="harga" id="harga" onkeyup="htg_total()" readonly placeholder="Harga">
                </td>

                <td>
                    <input type="text" name="total" id="total" readonly placeholder="Total">
                    <input type="hidden" name="notemp" id="notemp">
                </td>

                <td>
                    <input type="button" name="cmd_add" id="cmd_add" value="ADD" onclick="add_data()">
                </td>
            </tr>
        </table>
        <div id="div_data"></div>
        <table>
            <tr>
                <td>Subtotal</td>
                <td>:</td>
                <td>
                    <input type="text" name="subtotal" id="subtotal" readonly>
                </td>
                <td></td>
            </tr>

            <tr>
                <td>Disc (%)</td>
                <td>:</td>
                <td>
                    <input type="number" name="discper" id="discper" value="0" onclick="htg_gtotal()"> = <input
                        type="text" name="disc" id="disc" readonly>
                </td>
                <td><label id="rp_disc"></label></td>
            </tr>

            <tr>
                <td>Pajak (%) </td>
                <td>:</td>
                <td>
                    <input type="number" name="pajakper" id="pajakper" value="0" onclick="htg_gtotal()"> = <input
                        type="text" name="pajak" id="pajak" readonly>
                </td>
                <td><label id="rp_pajak"></label></td>
            </tr>

            <tr>
                <td>Grand Total</td>
                <td>:</td>
                <td>
                    <input type="text" name="grandtotal" id="grandtotal" readonly>
                </td>
                <td></td>
            </tr>

            <tr>
                <td><input type="submit" value="Proses"></td>
            </tr>
        </table>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
document.getElementById('kodeuser').value = "<?php echo $kodeuser; ?>";

function tampil_sup(nama, alamat, telp) {
    document.getElementById("alamat").value = alamat;
    document.getElementById("telp").value = telp;
}

function tampil_barang(jenis, merk, satuan, harga) {
    document.getElementById('jenis').value = jenis;
    document.getElementById('merk').value = merk;
    document.getElementById('satuan').value = satuan;
    document.getElementById('harga').value = harga;
    document.getElementById('jlh').focus();
    var tombol = document.getElementById('cmd_add').value = "ADD";
    //htg_total();
}

function htg_total() {
    var jlh = document.getElementById('jlh').value;
    var harga = document.getElementById('harga').value;
    var total = jlh * harga;
    document.getElementById('total').value = total;
}

function add_data() {
    const ajaxku = new XMLHttpRequest();
    ajaxku.onload = function() {
        document.getElementById("div_data").innerHTML = this.responseText;
    }
    ajaxku.onreadystatechange = function() {
        var data = this.responseText;
        data = data.split('#');
        document.getElementById("div_data").innerHTML = data[0];
        document.getElementById('subtotal').value = data[1];
        document.getElementById('grandtotal').value = data[1];
    };
    var nojual = document.getElementById('nojual').value;
    var notemp = document.getElementById('notemp').value;
    var kodebarang = document.getElementById('kodebarang').value;
    var jlh = document.getElementById('jlh').value;
    var harga = document.getElementById('harga').value;
    var total = document.getElementById('total').value;
    var tombol = document.getElementById('cmd_add').value;

    url = "_addjual.php?nojual=" + nojual + "&notemp=" + notemp + "&kodebarang=" + kodebarang + "&jlh=" + jlh +
        "&harga=" + harga + "&total=" + total + "&cmd=" + tombol;

    ajaxku.open("GET", url);
    ajaxku.send();
}

function f_del(notemp) {
    const ajaxku = new XMLHttpRequest();
    ajaxku.onload = function() {
        var data = this.responseText;
        data = data.split('#');
        document.getElementById("div_data").innerHTML = data[0];
        document.getElementById('subtotal').value = data[1];
        document.getElementById('grandtotal').value = data[1];
    }
    var url = "_addjual.php?&notemp=" + notemp + "&cmd=hapus";

    ajaxku.open("GET", url);
    ajaxku.send();


}

function f_edit(notemp, kodebarang, jenis, merk, satuan, jlh, harga, total) {
    document.getElementById('notemp').value = notemp;
    document.getElementById('kodebarang').value = kodebarang;
    document.getElementById('jenis').value = jenis;
    document.getElementById('merk').value = merk;
    document.getElementById('satuan').value = satuan;
    document.getElementById('jlh').value = jlh;
    document.getElementById('harga').value = harga;
    document.getElementById('total').value = total;
    document.getElementById('cmd_add').value = "ubah";
}

function htg_gtotal() {
    var subtotal = document.getElementById('subtotal').value;
    var disc = document.getElementById('discper').value;
    var hrg_disc = disc / 100 * subtotal;
    $('#disc').val(hrg_disc);

    var pajak = document.getElementById('pajakper').value;
    var hrg_pajak = pajak / 100 * (subtotal - hrg_disc);
    $('#pajak').val(hrg_pajak);

    var grandtotal = subtotal - hrg_disc + hrg_pajak;
    $('#grandtotal').val(grandtotal);
}
</script>

</html>