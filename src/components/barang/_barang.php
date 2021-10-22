<?php

include "../../conn.php";

$kodebarang = $_GET["kodebarang"];
$nama = $_GET["nama"];
$jenis = $_GET["jenis"];
$merk = $_GET["merk"];
$satuan = $_GET["satuan"];
$jumlahstok = $_GET["jumlahstok"];
$hargajual = $_GET["hargajual"];
$hargabeli = $_GET["hargabeli"];
$ket = $_GET["ket"];
$button = $_GET["button"];

if ($button == "simpan") {
    $sql = "insert into tbbarang(kodebarang,nama,jenis,merk,satuan,jlh_stok,hargajual,hargabeli,ket) values('$kodebarang', '$nama', '$jenis', '$merk', '$satuan', '$jumlahstok', '$hargajual', '$hargabeli', '$ket')";
    mysqli_query($conn, $sql);
}
if ($button == "delete") {
    $sql = "delete from tbbarang where kodebarang='$kodebarang'";
    mysqli_query($conn, $sql);
}
if ($button == 'edit') {
    $sql = "update tbbarang set nama='$nama', jenis='$jenis', merk='$merk', satuan='$satuan', jlh_stok='$jumlahstok', hargajual='$hargajual', hargabeli='$hargabeli', ket='$ket' where kodebarang='$kodebarang'";
    mysqli_query($conn, $sql);
}

?>

<section class="table">
    <div class="table-content">
        <table border="1">
            <thead>
                <tr>
                    <th>Kodebarang</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Satuan</th>
                    <th>Jumlah Stok</th>
                    <th>Harga Jual</th>
                    <th>Harga beli</th>
                    <th>Ket</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php

            $query = mysqli_query($conn, "select * from tbbarang");
            $num = mysqli_num_rows($query);

            for ($i = 1; $i <= $num; $i++) {
                $result = mysqli_fetch_array($query);

                $kodebarang = $result["kodebarang"];
                $nama = $result["nama"];
                $jenis = $result["jenis"];
                $merk = $result["merk"];
                $satuan = $result["satuan"];
                $jumlahstok = $result["jlh_stok"];
                $hargajual = $result["hargajual"];
                $hargabeli = $result["hargabeli"];
                $ket = $result["ket"];
            ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $kodebarang ?>
                    </td>
                    <td>
                        <?php echo $nama ?>
                    </td>
                    <td>
                        <?php echo $jenis ?>
                    </td>
                    <td>
                        <?php echo $merk ?>
                    </td>
                    <td>
                        <?php echo $satuan ?>
                    </td>
                    <td>
                        <?php echo $jumlahstok ?>
                    </td>
                    <td>
                        <?php echo $hargajual ?>
                    </td>
                    <td>
                        <?php echo $hargabeli ?>
                    </td>
                    <td>
                        <?php echo $ket ?>
                    </td>
                    <!-- Action -->
                    <td>
                        <button name="edit" value="edit" id="edit"
                            onclick="edit(<?php echo "'$kodebarang', '$nama', '$jenis', '$merk', '$satuan', '$jumlahstok', '$hargajual', '$hargabeli', '$ket'" ?>)"><i
                                class="fas fa-pen"></i></button>
                        <button name="delete" value="delete" onclick="del(<?php echo "'$kodebarang'" ?>)"><i
                                class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
    </div>
</section>