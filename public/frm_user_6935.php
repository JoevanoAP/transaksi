<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<script src="https://kit.fontawesome.com/14cfca22c7.js" crossorigin="anonymous"></script>

<body>
    <section class="container">
        <div class="max-width">
            <header class="header">
                <h2>Transaksi XI TKJ</h2>
            </header>
        </div>
        <div class="main">
            <div class="max-width">
                <div class="main-content">
                    <div class="main-title">
                        <h3>Register</h3>
                    </div>

                    <!-- Ketika password tidak sesuai/sesuai -->
                    <?php
                    // Ketika password tidak sesuai
                    if (isset($_SESSION["!pass"])) {
                    ?>
                    <p style="color: red;"><?php echo $_SESSION["!pass"] ?></p>
                    <?php
                        // Exit
                        unset($_SESSION["!pass"]);
                        // Ketika password sesuai
                    } else if (isset($_SESSION['pass'])) {
                    ?>
                    <p style="color: green;"><?php echo $_SESSION["pass"] ?></p>
                    <?php
                        // Exit
                        unset($_SESSION["pass"]);
                    }
                    ?>

                    <form action="../src/components/_register.php" method="POST">
                        <div class="user-details">
                            <span>Kodeuser</span>
                            <input type="text" name="kodeuser" id="">
                        </div>
                        <div class="user-details">
                            <span>Nama</span>
                            <input type="text" name="nama" id="">
                        </div>
                        <div class="user-details">
                            <span>Status</span>
                            <input type="text" name="status" id="">
                        </div>
                        <div class="user-details ">
                            <span>Password</span>
                            <input type="password" name="password" id="">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                        <div class="user-details">
                            <span>Confirm Password</span>
                            <input type="password" name="password2" id="">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                        <div class="user-details">
                            <span>Ket</span>
                            <input type="text" name="ket" id="">
                        </div>

                        <!-- Submit -->
                        <button class="btn" name="button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>