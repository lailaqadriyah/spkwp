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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar has-shadow" role="navigation" aria-label="main navigation" style="background-color: #D4EBF8;">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="index.php?halaman=home">
                <h3 class="title is-size-4">Pemilihan Kos Sekitar Unand</h3>
                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="NavbarUtama">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="NavbarUtama" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item" href="index.php?halaman=home">Home</a>
                    <a class="navbar-item" href="index.php?halaman=datales">Alternatif</a>
                    <a class="navbar-item" href="index.php?halaman=datakriteria">Kriteria</a>
                    <a class="navbar-item" href="index.php?halaman=databobot">Pembobotan</a>
                    <a class="navbar-item" href="index.php?halaman=datapenilaian">Perhitungan</a>
                    <a class="navbar-item" href="index.php?halaman=aboutus">About Us</a>

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
            event.preventDefault(); // Biar tidak langsung redirect
            var yakin = confirm("Apakah Anda yakin ingin keluar?");
            if (yakin) {
                window.location.href = "../logout.php"; // Logout kalau yakin
            }
            // Kalau batal, tetap di halaman
        }
    </script>
</body>

</html>