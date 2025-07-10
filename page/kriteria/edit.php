<?php
require("../controller/Kriteria.php");

$id = $_GET["id"];

$query = Index("SELECT * FROM kriteria WHERE id_kriteria = $id");
foreach ($query as $row) {
    $row["kriteria_kode"];
    $row["nm_kriteria"];
    $row["bobot"];
    $row["status"];
}

if (isset($_POST["add"])) {
    if (Edit("kriteria", $_POST) > 0) {
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
        }).then(function() {
            window.location.href = 'index.php?halaman=datakriteria';
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
                                <p class="card-header-title">Form Edit Kriteria</p>
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
                                            <input type="hidden" name="id_kriteria" value="<?= $row["id_kriteria"] ?>">
                                            <input class="input" type="text" pattern="[A-Za-z0-9]+" placeholder="Kode " name="kriteria_kode" value="<?= $row["kriteria_kode"] ?>">
                                            <span class="icon is-small is-left">
                                                <ion-icon name="qr-code"></ion-icon>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Nama Kriteria</label>
                                        <div class="control has-icons-left">
                                            <input class="input" type="text" placeholder="Nama Kriteria" name="nm_kriteria" value="<?= $row["nm_kriteria"]; ?>">
                                            <span class="icon is-small is-left">
                                                <ion-icon name="pricetag"></ion-icon>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Bobot</label>
                                        <div class="control has-icons-left">
                                            <input class="input" type="text" placeholder="Bobot" name="bobot" value="<?= $row["bobot"]; ?>">
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
</body>

</html>