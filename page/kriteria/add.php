<?php
require("../controller/Kriteria.php");

// Koneksi database (jika belum tersedia di controller/Kriteria.php)
$conn = mysqli_connect("localhost", "root", "", "belajar"); // GANTI dengan koneksi sesuai konfigurasi

// Fungsi untuk cek apakah kode kriteria sudah ada
function cekDuplikatKriteria($kode)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM kriteria WHERE kriteria_kode = '$kode'");
    return mysqli_num_rows($query) > 0;
}

// Fungsi untuk validasi kode (hanya huruf dan angka yang diterima)
function validasiKode($kode)
{
    if (preg_match("/^[A-Za-z0-9]+$/", $kode)) {
        return true;
    }
    return false;
}

// Fungsi untuk validasi nama kriteria (harus mengandung huruf, tidak boleh angka semua)
function validasiNamaKriteria($nama)
{
    if (preg_match("/[A-Za-z]/", $nama) && !preg_match("/^\d+$/", $nama)) {
        return true;
    }
    return false;
}

// Fungsi untuk validasi bobot (pecahan)
function validasiBobot($bobot)
{
    if (preg_match("/^\d+(\.\d+)?$/", $bobot)) {  // Menangani angka dan pecahan
        return true;
    }
    return false;
}

if (isset($_POST["add"])) {
    $kode = htmlspecialchars($_POST["kriteria_kode"]);
    $namaKriteria = htmlspecialchars($_POST["nm_kriteria"]);
    $bobot = htmlspecialchars($_POST["bobot"]);

    // Validasi apakah kode hanya mengandung huruf dan angka
    if (!validasiKode($kode)) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Input Tidak Valid',
            text: 'Kode kriteria hanya boleh berisi huruf dan angka, tanpa simbol.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
        </script>";
    } elseif (!validasiNamaKriteria($namaKriteria)) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Input Tidak Valid',
            text: 'Nama kriteria harus mengandung huruf dan tidak boleh hanya angka.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
        </script>";
    } elseif (!validasiBobot($bobot)) {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Input Tidak Valid',
            text: 'Bobot harus berupa angka atau pecahan.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
        </script>";
    } elseif (cekDuplikatKriteria($kode)) {
        echo "<script>
        Swal.fire({
            icon: 'warning',
            title: 'Kode Sudah Digunakan',
            text: 'Kode kriteria \"$kode\" sudah ada di database. Silakan gunakan kode lain.',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
        </script>";
    } else {
        if (Add("kriteria", $_POST) > 0) {
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil masuk kedalam database',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then(() => {
                window.location.href = 'index.php?halaman=datakriteria';
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Data gagal masuk kedalam database',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then(() => {
                window.location.href = 'index.php?halaman=datakriteria';
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
<!-- FORM HTML -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-header-title">Form Tambah Kriteria</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-maroon" href="index.php?halaman=datakriteria">
                                    <ion-icon name="arrow-back-circle" class="mr-2"></ion-icon>Kembali
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <form action="" method="post">
                                <div class="field">
                                    <label class="label">Kode Kriteria</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Kode Kriteria, Contoh : K1" name="kriteria_kode" required>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="qr-code"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nama Kriteria</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Nama Kriteria" name="nm_kriteria" required>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="pricetag"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Bobot</label>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" placeholder="Bobot" name="bobot" required>
                                        <span class="icon is-small is-left">
                                            <ion-icon name="barbell"></ion-icon>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Status</label>
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select name="status" required>
                                                <option selected disabled>Pilih Status</option>
                                                <option value="COST">COST</option>
                                                <option value="BENEFIT">BENEFIT</option>
                                            </select>
                                        </div>
                                        <div class="icon is-small is-left">
                                            <ion-icon name="chevron-down"></ion-icon>
                                        </div>
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