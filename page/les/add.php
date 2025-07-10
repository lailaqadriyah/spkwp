<?php
require("../controller/Les.php"); // pastikan file ini mengandung koneksi DB dan fungsi Add()

// Koneksi database (jika belum ada di Les.php)
$conn = mysqli_connect("localhost", "root", "", "belajar"); // ganti sesuai konfigurasi DB kamu

// Fungsi cek duplikat
function cekDuplikatKode($kode)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM alternatif WHERE kode_alternatif = '$kode'");
    return mysqli_num_rows($query) > 0;
}

// Validasi kode_alternatif (hanya huruf dan angka)
function isValidKode($kode)
{
    return preg_match('/^[a-zA-Z0-9]+$/', $kode);
}

// Validasi nm_les (tidak boleh full angka)
function isValidNama($nama)
{
    return preg_match('/[a-zA-Z]/', $nama); // harus mengandung setidaknya satu huruf
}

// Proses tambah data
if (isset($_POST["add"])) {
    $kode = htmlspecialchars($_POST["kode_alternatif"]);
    $nama = htmlspecialchars($_POST["nm_les"]);

    if (!isValidKode($kode)) {
        echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Kode Tidak Valid',
            text: 'Kode alternatif hanya boleh terdiri dari huruf dan angka tanpa simbol.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
        </script>";
    } elseif (!isValidNama($nama)) {
        echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Nama Tidak Valid',
            text: 'Nama alternatif harus mengandung huruf. Tidak boleh berupa angka saja.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
        </script>";
    } elseif (cekDuplikatKode($kode)) {
        echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Kode Sudah Ada',
            text: 'Kode alternatif \"$kode\" sudah digunakan. Silakan gunakan kode lain.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
        </script>";
    } else {
        if (Add("alternatif", $_POST) > 0) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil masuk ke dalam database',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then(() => {
                window.location.href = 'index.php?halaman=datales';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data gagal masuk ke dalam database',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then(() => {
                window.location.href = 'index.php?halaman=datales';
            });
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SPK Kos Sekitar Unand</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: #F1E7E7;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .has-background-maroon {
            background-color: #800000 !important;
        }

        .button.is-maroon {
            background-color: #800000;
            color: #fff;
            border: none;
        }

        .button.is-maroon:hover {
            background-color: #a00000;
        }

        .pagination-container {
            margin-top: 1rem;
        }
         .input:focus,
        .textarea:focus {
            border-color: #800000 !important;
            box-shadow: 0 0 0 0.125em rgba(128, 0, 0, 0.25) !important;
            outline: none !important;
        }
    </style>
</head>

<body>
<!-- HTML FORM -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Form Tambah Data</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-maroon" href="index.php?halaman=datales">
                                    <ion-icon name="arrow-back-circle" class="mr-2"></ion-icon>Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <form action="" method="post">
                                <div class="field">
                                    <label class="label">Kode Alternatif</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Kode Alternatif, Contoh : A1" name="kode_alternatif" required>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="qr-code"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama Alternatif</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Nama Kos" name="nm_les" required>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="home"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <button class="button is-maroon" type="submit" name="add">
                                        <ion-icon name="save" class="mr-2"></ion-icon>Simpan
                                    </button>
                                    <button class="button is-maroon" type="reset">
                                        <ion-icon name="refresh-circle" class="mr-2"></ion-icon>Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>