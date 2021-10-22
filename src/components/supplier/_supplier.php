<?php

include "../../conn.php";

$kodesup = $_GET["kodesup"];
$nama = $_GET["nama"];
$alamat = $_GET["alamat"];
$telp = $_GET["telp"];
$button = $_GET["button"];

if ($button == "simpan") {
    $sql = "insert into tbsupplier(kodesup,nama,alamat,telp) values('$kodesup', '$nama', '$alamat', '$telp')";
    mysqli_query($conn, $sql);
}
if ($button == "delete") {
    $sql = "delete from tbsupplier where kodesup='$kodesup'";
    mysqli_query($conn, $sql);
}
if ($button == 'edit') {
    $sql = "update tbsupplier set nama='$nama', alamat='$alamat', telp='$telp' where kodesup='$kodesup'";
    mysqli_query($conn, $sql);
}

?>

<section class="table">
    <div class="table-content">
        <table border="1">
            <thead>
                <tr>
                    <th>Kodesup</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php

            $query = mysqli_query($conn, "select * from tbsupplier");
            $num = mysqli_num_rows($query);

            for ($i = 1; $i <= $num; $i++) {
                $result = mysqli_fetch_array($query);

                $kodesup = $result["kodesup"];
                $nama = $result["nama"];
                $alamat = $result["alamat"];
                $telp = $result["telp"];
            ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $kodesup ?>
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
                            onclick="edit(<?php echo "'$kodesup', '$nama', '$alamat', '$telp'" ?>)"><i
                                class="fas fa-pen"></i></button>
                        <button name="delete" value="delete" onclick="del(<?php echo "'$kodesup'" ?>)"><i
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