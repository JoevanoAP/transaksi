<?php
session_start();
include '../conn.php';

// Data
$kodeuser = $_POST["kodeuser"];
$password = $_POST["password"];

$query = mysqli_query($conn, "select * from tbuser where kodeuser='$kodeuser' and pass='$password'");
$num = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);

// Ambil Data
if ($num == 1) {
    if ($kodeuser == 'admin') {
        header("Location: ../../public/home.html");
    } else {
        $_SESSION["!admin"] = "Anda tidak memiliki akses!!";
        header("Location: ../../index.php");
    }
} else {
    $_SESSION["!both"] = "Kodeuser atau Password salah!!";
    header("Location: ../../index.php");
}