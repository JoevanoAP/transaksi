<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<script src="https://kit.fontawesome.com/14cfca22c7.js" crossorigin="anonymous"></script>

<body>
    <section class="container">
        <header class="header">
            <div class="max-width">
                <h2 class="title">Transaksi XI TKJ</h2>
            </div>
        </header>
        <div class="main">
            <div class="max-width">
                <div class="main-title">
                    <h3>Login</h3>
                    <p>Don't have any account ?
                        <a href="public/frm_user_6935.php">Register</a>
                    </p>
                </div>

                <!-- Ketika kodeuser/password tidak sesuai & Tidak memiliki akses -->
                <?php
                // ketika tidak memiliki akses
                if (isset($_SESSION["!admin"])) {
                ?>
                <p><?php echo $_SESSION["!admin"] ?></p>
                <?php
                    // Exit
                    unset($_SESSION["!admin"]);
                } else if (isset($_SESSION["!both"])) { // Ketika keduanya salah
                ?>
                <p><?php echo $_SESSION["!both"] ?></p>
                <?php
                    // Exit
                    unset($_SESSION["!both"]);
                }
                ?>

                <form action=" src/components/_login.php" method="POST">
                    <div class="user-details">
                        <span>Kodeuser</span>
                        <input type="text" name="kodeuser" id="">
                    </div>
                    <div class="user-details">
                        <span>Password</span>
                        <div class="user-pass">
                            <input type="password" name="password" id="">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button class="btn">Submit</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>