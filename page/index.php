<?php
require("../controller/Login.php");

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK</title>
    <link rel="stylesheet" href="../asset/css/bulma.min.css">
    <link rel="stylesheet" href="../asset/css/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        html,
        container,
        body {
            height: 100%;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(to bottom right, #E3F2FD, #FFFFFF);
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar has-shadow " role="navigation" aria-label="main navigation" style="background-color: #6A142F;">
        <div class="container" style="background-color: #6A142F">
            <div class="navbar-brand">
                <a class="navbar-item" href="index.php?halaman=home">
                    <img src="../asset/img/logo.png" alt="Logo" style="height: 36px; margin-right: 10px;">
                    <h3 class="title is-size-4" style=" color: white;">Pemilihan Kos Sekitar Unand</h3>
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="NavbarUtama">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="NavbarUtama" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item" href="index.php?halaman=home" style="color: white;">Home</a>
                    <a class="navbar-item" href="index.php?halaman=datales" style="color: white;">Alternatif</a>
                    <a class="navbar-item" href="index.php?halaman=datakriteria" style="color: white;">Kriteria</a>
                    <a class="navbar-item" href="index.php?halaman=databobot" style="color: white;">Pembobotan</a>
                    <a class="navbar-item" href="index.php?halaman=datapenilaian" style="color: white;">Perhitungan</a>
                    <a class="navbar-item" href="index.php?halaman=aboutus" style="color: white;">About Us</a>

                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-danger" href="#" onclick="confirmLogout(event)">
                                <strong>Logout</strong>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
    <!-- AKHIR NAVBAR -->

    <!-- HALAMAN -->
    <?php require '../controller/Menu.php' ?>
    <!-- AKHIR HALAMAN -->

    <!-- JAVASCRIPT -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="asset/js/main.js"></script>

    <script>
        function confirmLogout(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari sistem.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../logout.php";
                }
            });
        }
    </script>
</body>

</html>