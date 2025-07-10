<?php
require("../controller/Les.php");

$id = $_GET["id"];

$query = Index("SELECT * FROM alternatif WHERE id_les = $id");
foreach ($query as $row) {
    $row["kode_alternatif"];
    $row["nm_les"];
}

if (isset($_POST["add"])) {
    if (Edit("alternatif", $_POST) > 0) {
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
        }).then(function() {
            window.location.href = 'index.php?halaman=datales';
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
        }).then(function() {
            window.location.href = 'index.php?halaman=datales';
        });
        </script>";
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
        html,
        body {
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
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="columns">
                    <div class="column">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-header-title">Form Ubah Data Alternatif</p>
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
                                            <input type="hidden" value="<?= $row["id_les"]; ?>" name="id_les">
                                            <input class="input" type="text" placeholder="Kode Alternatif" name="kode_alternatif" value="<?= $row["kode_alternatif"] ?>">
                                            <span class="icon is-small is-left">
                                                <ion-icon name="qr-code"></ion-icon>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Nama Alternatif</label>
                                        <div class="control has-icons-left">
                                            <input class="input" type="text" placeholder="Nama Kos" name="nm_les" value="<?= $row["nm_les"]; ?>">
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
</body>

</html>