<?php

include "../../conn.php";

$kodepel = $_GET["kodepel"];
$nama = $_GET["nama"];
$alamat = $_GET["alamat"];
$telp = $_GET["telp"];
$button = $_GET["button"];

if ($button == "simpan") {
    $sql = "insert into tbpelanggan(kodepel,nama,alamat,telp) values('$kodepel', '$nama', '$alamat', '$telp')";
    mysqli_query($conn, $sql);
}
if ($button == "delete") {
    $sql = "delete from tbpelanggan where kodepel='$kodepel'";
    mysqli_query($conn, $sql);
}
if ($button == 'edit') {
    $sql = "update tbpelanggan set nama='$nama', alamat='$alamat', telp='$telp' where kodepel='$kodepel'";
    mysqli_query($conn, $sql);
}

?>

<section class="table">
    <div class="table-content">
        <table border="1">
            <thead>
                <tr>
                    <th>Kodepel</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php

            $query = mysqli_query($conn, "select * from tbpelanggan");
            $num = mysqli_num_rows($query);

            for ($i = 1; $i <= $num; $i++) {
                $result = mysqli_fetch_array($query);

                $kodepel = $result["kodepel"];
                $nama = $result["nama"];
                $alamat = $result["alamat"];
                $telp = $result["telp"];
            ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $kodepel ?>
                    </td>
                    <td>
                        <?php echo $nama ?>
                    </td>
                    <td>
                        <?php echo $alamat ?>
                    </td>
                    <td>
                        <?php echo $telp ?>
                    </td>
                    <!-- Action -->
                    <td>
                        <button name="edit" value="edit" id="edit"
                            onclick="edit(<?php echo "'$kodepel', '$nama', '$alamat', '$telp'" ?>)"><i
                                class="fas fa-pen"></i></button>
                        <button name="delete" value="delete" onclick="del(<?php echo "'$kodepel'" ?>)"><i
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