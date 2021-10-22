<?php

session_start();
include '../conn.php';

// Data
$kodeuser = $_POST["kodeuser"];
$nama = $_POST["nama"];
$status = $_POST["status"];
$password = $_POST["password"];
$password2 = $_POST["password2"]; // Confirm Password 
$ket = $_POST["ket"];

// Verify Password
if ($password != $password2) {
    // Show Message
    $_SESSION["!pass"] = "Password tidak sesuai!!";
    header("Location: ../../public/frm_user_6935.php");
} else {
    $sql = "insert into tbuser values('$kodeuser', '$nama', '$status', '$password', '$kket')";
    mysqli_query($conn, $sql);

    // Show Message
    $_SESSION["pass"] = "Registrasi Berhasil!!";
    header("Location: ../../public/frm_user_6935.php");
}