<?php

include "../../conn.php";

$kodesales = $_GET["kodesales"];
$nama = $_GET["nama"];
$alamat = $_GET["alamat"];
$telp = $_GET["telp"];
$button = $_GET["button"];

if ($button == "simpan") {
    $sql = "insert into tbsales(kodesales,nama,alamat,telp) values('$kodesales', '$nama', '$alamat', '$telp')";
    mysqli_query($conn, $sql);
}
if ($button == "delete") {
    $sql = "delete from tbsales where kodesales='$kodesales'";
    mysqli_query($conn, $sql);
}
if ($button == 'edit') {
    $sql = "update tbsales set nama='$nama', alamat='$alamat', telp='$telp' where kodesales='$kodesales'";
    mysqli_query($conn, $sql);
}

?>

<section class="table">
    <div class="table-content">
        <table border="1">
            <thead>
                <tr>
                    <th>Kodesales</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php

            $query = mysqli_query($conn, "select * from tbsales");
            $num = mysqli_num_rows($query);

            for ($i = 1; $i <= $num; $i++) {
                $result = mysqli_fetch_array($query);

                $kodesales = $result["kodesales"];
                $nama = $result["nama"];
                $alamat = $result["alamat"];
                $telp = $result["telp"];
            ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $kodesales ?>
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
                            onclick="edit(<?php echo "'$kodesales', '$nama', '$alamat', '$telp'" ?>)"><i
                                class="fas fa-pen"></i></button>
                        <button name="delete" value="delete" onclick="del(<?php echo "'$kodesales'" ?>)"><i
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