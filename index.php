<?php
require("controller/Login.php");
session_start();

// Jika sudah login, redirect ke halaman utama
if (isset($_SESSION['login'])) {
    header("Location: page/index.php");
    exit;
}

// Proses login jika tombol ditekan
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
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(-45deg,rgb(176, 34, 79),rgb(185, 156, 163),rgb(199, 155, 164),rgb(203, 40, 92));
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            width: 100%;
            max-width: 1000px;
            margin: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background: #6A142F;
        }

        .card-header-title {
            color: #FFFFFF;
        }

        .button.is-maroon {
            background-color: #6A142F;
            color: #fff;
            border: none;
        }

        .button.is-maroon:hover {
            background-color: #8A1F3F;
        }

        .field label.label {
            color: #6A142F;
            font-weight: bold;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <section class="section" id="section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-8">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">SPK PEMILIHAN KOS-KOSAN METODE WEIGHTED PRODUCT (WP)</p>
                        </div>
                        <div class="card-content">

                            <?php if (isset($login['error'])) : ?>
                                <script>
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
                                </script>
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

                                <div class="buttons card-header-icon">
                                    <button class="button is-maroon" type="submit" name="login">
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
