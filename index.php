<?php
require("controller/Login.php");

session_start();

if (isset($_SESSION['login'])) {
    header("Location: page/index.php");
    exit;
}

if (isset($_POST['login'])) {
    $login = Login($_POST);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/bulma.min.css">
    <link rel="stylesheet" href="asset/css/animate.min.css">
    <link rel="stylesheet" href="asset/css/costume.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url('asset/img/alo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            /* Transparansi opsional */
            width: 100%;
            max-width: 1000px;
            /* Lebar maksimum yang lebih besar */
            margin: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <section class="section" id="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-8"> <!-- Lebar kolom ditingkatkan -->
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">SPK PEMILIHAN KOS-KOSAN METODE WEIGHTD PRODUCT (WP) </p>
                        </div>
                        <div class="card-content">
                            <?php if (isset($login['error'])) : ?>
                                <p>
                                    <?= "<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Gagal login, periksa kembali username dan password anda!',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then(function() {
        window.location.href = 'index.php';
    });
    </script>"; ?></p>
                            <?php endif ?>
                            <form action="" method="post">
                                <div class="field">
                                    <label class="label">Username</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Username" name="username" required autocomplete="off" autofocus>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="person"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Password</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="password" placeholder="Password" name="password" required autocomplete="off">
                                        <span class="icon is-small is-left">
                                            <ion-icon name="lock-closed"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button class="button is-link" type="submit" name="login">
                                        <ion-icon name="log-in" class="mr-2"></ion-icon>Login
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</body>

</html>