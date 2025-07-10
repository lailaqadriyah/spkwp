<?php
require("../controller/Kriteria.php");

$halaman = 5;
$aktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awal = ($halaman * $aktif) - $halaman;

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$whereClause = "";

if ($search !== '') {
    $search = htmlspecialchars($search);
    $whereClause = "WHERE kriteria_kode LIKE '%$search%' OR nm_kriteria LIKE '%$search%'";
}

$hasil = count(Index("SELECT * FROM kriteria $whereClause"));
$total = ceil($hasil / $halaman);
$data = Index("SELECT * FROM kriteria $whereClause LIMIT $awal,$halaman");
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
    <main>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <div class="card animate__animated animate__zoomIn">
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-header-title">Table Kriteria</p>
                                    <div class="card-header-icon" style="width: 100%;">
                                        <div class="is-flex is-align-items-center is-justify-content-flex-end" style="width: 100%;">
                                            <form method="GET" action="index.php" class="field has-addons mb-0">
                                                <input type="hidden" name="halaman" value="datakriteria">
                                                <div class="control">
                                                    <input class="input" type="text" name="search" placeholder="Cari kriteria..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                                                </div>
                                                <div class="control">
                                                    <button class="button is-maroon" type="submit">Cari</button>
                                                </div>
                                            </form>

                                            <a class="button is-maroon ml-3" href="index.php?halaman=tambahdatakriteria">
                                                <ion-icon name="add-circle" class="mr-2"></ion-icon>Tambah Data
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-content">
                                    <div class="table-container">
                                        <table class="table is-fullwidth">
                                            <thead class="has-background-maroon">
                                                <tr>
                                                    <th class="has-text-white">No</th>
                                                    <th class="has-text-white">Kode Kriteria</th>
                                                    <th class="has-text-white">Nama Kriteria</th>
                                                    <th class="has-text-white">Bobot</th>
                                                    <th class="has-text-white">Status</th>
                                                    <th class="has-text-white">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 + $awal; ?>
                                                <?php if (empty($data)) : ?>
                                                    <tr>
                                                        <td colspan="6" class="has-text-centered">Data tidak ditemukan.</td>
                                                    </tr>
                                                <?php else : ?>
                                                    <?php foreach ($data as $row) : ?>
                                                        <tr>
                                                            <th><?= $i ?></th>
                                                            <td><?= $row["kriteria_kode"] ?></td>
                                                            <td><?= $row["nm_kriteria"] ?></td>
                                                            <td><?= $row["bobot"] ?></td>
                                                            <td><?= $row["status"] ?></td>
                                                            <td>
                                                                <div class="buttons">
                                                                    <a class="button is-link" href="index.php?halaman=editdatakriteria&id=<?= $row['id_kriteria']; ?>">
                                                                        <ion-icon name="create"></ion-icon>
                                                                    </a>
                                                                    <button class="button is-maroon" onclick="DeleteData(<?= $row['id_kriteria']; ?>)">
                                                                        <ion-icon name="trash"></ion-icon>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="pagination-container">
                                        <?php require '../controller/PaginationKriteria.php'; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>

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
                    popup: 'animate_animated animate_fadeInDown'
                },
                hideClass: {
                    popup: 'animate_animated animate_fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `index.php?halaman=hapusdatakriteria&id=${id}`;
                }
            });
        }
    </script>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>