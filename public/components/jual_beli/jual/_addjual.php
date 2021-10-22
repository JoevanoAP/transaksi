<?php
include '../../../../src/conn.php';
$nojual = $_GET['nojual'];
$notemp = $_GET['notemp'];
$kodebarang = $_GET['kodebarang'];
$jlh = $_GET['jlh'];
$harga = $_GET['harga'];
$total = $_GET['total'];
$tombol = $_GET['cmd'];

if ($tombol == "ADD") {
    $sql = "INSERT INTO tempjualdetil(notemp,no, kodebarang, jlh, harga, total) VALUES ('','$nojual','$kodebarang','$jlh','$harga','$total')";
    $query = mysqli_query($conn, $sql);
} elseif ($tombol == "hapus") {
    $sqldel =  "DELETE FROM tempjualdetil WHERE notemp='$notemp'";
    $querydel = mysqli_query($conn, $sqldel);
} elseif ($tombol == "ubah") {
    $supdate = "UPDATE tempjualdetil SET kodebarang='$kodebarang',jlh='$jlh',harga='$harga',total='$total'  WHERE notemp='$notemp'";
    $qupdate = mysqli_query($conn, $supdate);
}
?>

<table border="1">
    <tr>
        <td>No</td>
        <td>Notemp</td>
        <td>Nama</td>
        <td>Jenis</td>
        <td>Merk</td>
        <td>Jumlah</td>
        <td>Satuan</td>
        <td>Harga</td>
        <td>Total</td>
        <td>Action</td>
    </tr>

    <?php
    $q1 = mysqli_query($conn, "SELECT tmp.*,tb.nama,tb.merk,tb.jenis,tb.satuan 
FROM tempjualdetil as tmp 
    left join tbbarang as tb 
    on tmp.kodebarang = tb.kodebarang 
WHERE tmp.no='$nojual'");
    $x = 1;
    $subtotal = 0;

    while ($re1 = mysqli_fetch_array($q1)) : {
            $notemp = $re1['notemp'];
            $kodebarang = $re1['kodebarang'];
            $nama = $re1['nama'];
            $jenis = $re1['jenis'];
            $merk = $re1['merk'];
            $satuan = $re1['satuan'];
            $jlh = $re1['jlh'];
            $harga = $re1['harga'];
            $total = $re1['total'];
            $subtotal += $total;
    ?>
    <tr>
        <td><?php echo "$x"; ?></td>
        <td><?php echo "$notemp"; ?></td>
        <td><?php echo "$nama"; ?></td>
        <td><?php echo "$jenis"; ?></td>
        <td><?php echo "$merk"; ?></td>
        <td><?php echo "$satuan"; ?></td>
        <td><?php echo "$jlh"; ?></td>
        <td><?php echo "$harga"; ?></td>
        <td><?php echo "$total"; ?></td>
        <td>
            <input type="button" name="cmd_edit" id="cmd_edit" value="Edit"
                onclick="f_edit(<?php echo "'$notemp','$kodebarang','$jenis','$merk','$satuan','$jlh','$harga','$total'"; ?>)">
            <input type="button" name="cmd_del" id="cmd_del" value="Delete" onclick="f_del(<?php echo "'$notemp'"; ?>)">
        </td>
    </tr>
    <?php
            $x++;
        }
    endwhile;
    ?>
</table>
<?php echo "#$subtotal"; ?>