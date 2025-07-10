<?php
require("../controller/Bobot.php");

$halaman = 5;
$hasil = count(Index("SELECT * FROM pembobotan"));
$total = ceil($hasil / $halaman);
$aktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awal = ($halaman * $aktif) - $halaman;

$data = Index("SELECT * FROM pembobotan LIMIT $awal,$halaman");
$banding1 = Index("SELECT * FROM alternatif");
$banding2 = Index("SELECT * FROM kriteria");
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
    </style>
</head>

<body>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="card animate__animated animate__zoomIn">
                        <div class="card-header">
                            <p class="card-header-title">Table Pembobotan</p>
                            <div class="buttons card-header-icon">
                                <a class="button is-maroon" href="index.php?halaman=tambahdatabobot">
                                    <ion-icon name="add-circle" class="mr-2"></ion-icon>Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-container">
                                <table class="table is-fullwidth">
                                    <thead class="has-background-maroon">
                                        <tr>
                                            <th class="has-text-white">No</th>
                                            <th class="has-text-white">Kriteria</th>
                                            <th class="has-text-white">Alternatif</th>
                                            <th class="has-text-white">Nilai</th>
                                            <th class="has-text-white">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 + $awal ?>
                                        <?php foreach ($data as $row) : ?>
                                            <tr>
                                                <th><?= $i ?></th>
                                                <td>
                                                    <?php foreach ($banding2 as $hasil) : ?>
                                                        <?php if ($row["id_kriteria"] == $hasil["id_kriteria"]) : ?>
                                                            <?= $hasil["nm_kriteria"] ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </td>
                                                <td>
                                                    <?php foreach ($banding1 as $result) : ?>
                                                        <?php if ($row["id_les"] == $result["id_les"]) : ?>
                                                            <?= $result["nm_les"] ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </td>
                                                <td>
                                                    <?php if ($row["nilai"] > 1000000) : ?>
                                                        <?= "Rp " . number_format($row["nilai"], 2, ',', '.'); ?>
                                                    <?php else : ?>
                                                        <?= $row["nilai"] ?>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <div class="buttons">
                                                        <a class="button is-link" href="index.php?halaman=editdatabobot&id=<?= $row['id_nilai']; ?>">
                                                            <ion-icon name="create"></ion-icon>
                                                        </a>
                                                        <button class="button is-maroon" onclick="DeleteData(<?= $row['id_nilai']; ?>)">
                                                            <ion-icon name="trash"></ion-icon>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php require '../controller/PaginationBobot.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function DeleteData(id) {
            Swal.fire({
                title: 'Yakin mau hapus data ini?',
                text: "Kalau sudah dihapus, tidak bisa dibalikin ya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#276CDA',
                cancelButtonColor: '#F03A5F',
                confirmButtonText: 'Iya, hapus aja',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `index.php?halaman=hapusdatabobot&id=${id}`;
                }
            });
        }
    </script>
</body>

</html>