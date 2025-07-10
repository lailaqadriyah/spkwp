<?php
require("../controller/Kriteria.php");

$kriteria = Index("SELECT * FROM kriteria");
$alternatif = Index("SELECT * FROM alternatif");
$bobot = Index("SELECT * FROM pembobotan");
$maxkriteria = Index("SELECT SUM(bobot) AS Total FROM kriteria");
$test = [];
$varV = [];
$totalS = 0;
?>
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
    </style>
</head>

<body>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="columns">
                <div class="column">
                    <div class="card animate_animated animate_zoomIn">
                        <div class="card-header">
                            <p class="card-header-title">Table Penilaian</p>
                        </div>
                        <div class="card-content">
                            <div class="table-container">
                                <!-- Tabel awal penilaian -->
                                <table class="table is-fullwidth">
                                    <thead class="has-background-maroon">
                                        <tr>
                                            <th class="has-text-white">No</th>
                                            <th class="has-text-white">Alternatif</th>
                                            <?php foreach ($kriteria as $header) : ?>
                                                <th class="has-text-white"><?= $header["nm_kriteria"] ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1 ?>
                                        <?php foreach ($alternatif as $row) : ?>
                                            <tr>
                                                <th><?= $a++ ?></th>
                                                <td><?= $row["nm_les"] ?></td>
                                                <?php foreach ($kriteria as $k) : ?>
                                                    <?php
                                                    $found = false;
                                                    foreach ($bobot as $pembobot) {
                                                        if (
                                                            $pembobot["id_les"] == $row["id_les"] &&
                                                            $pembobot["id_kriteria"] == $k["id_kriteria"]
                                                        ) {
                                                            echo "<td>" . $pembobot["nilai"] . "</td>";
                                                            $found = true;
                                                            break;
                                                        }
                                                    }
                                                    if (!$found) {
                                                        echo "<td>-</td>";
                                                    }
                                                    ?>
                                                <?php endforeach ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                            <hr>
                            <!-- BAGIAN 1 -->
                            <h4 class="subtitle">Bagian 1 : Mencari Nilai W</h4>
                            <hr>
                            <p>Bobot Tiap Kriteria :</p>
                            <p>W = [
                                <?php foreach ($kriteria as $tampildoang) : ?>
                                    <?= $tampildoang["bobot"] . "," ?>
                                <?php endforeach ?>
                                ]
                            </p>
                            <hr>
                            <p>Pembobotan :</p>
                            <?php $b = 1 ?>
                            <?php foreach ($kriteria as $bagibobot) : ?>
                                <?php foreach ($maxkriteria as $TotalLah) : ?>
                                    <p>W<?= $b++ ?> =
                                        <?= $bagibobot["bobot"] . "/" . $TotalLah["Total"] ?> = <?= round($bagibobot["bobot"] / $TotalLah["Total"], 3) ?>
                                    </p>
                                <?php endforeach ?>
                            <?php endforeach ?>
                            <hr>
                            <p>Normalisasi Berdasarkan Pembobotan :</p>
                            <?php $c = 1 ?>
                            <?php foreach ($kriteria as $bagibobot) : ?>
                                <?php foreach ($maxkriteria as $TotalLah) : ?>
                                    <p>W<?= $c++ ?> =
                                        <?php if ($bagibobot["status"] == "COST") : ?>
                                            <?= round($bagibobot["bobot"] / $TotalLah["Total"], 3) * -1 ?></p>
                                <?php else : ?>
                                    <?= round($bagibobot["bobot"] / $TotalLah["Total"], 3) ?></p>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endforeach ?>
                        <hr>

                        <!-- BAGIAN 2 -->
                        <h4 class="subtitle">Bagian 2 : Mencari Nilai Vector (S)</h4>
                        <p>Pembobotan :</p>
                        <?php $d = 1 ?>
                        <?php $e = 0 ?>
                        <?php foreach ($alternatif as $les) : ?>
                            <?php $idles = $les["id_les"] ?>
                            <?php $bobot = Index("SELECT * FROM pembobotan WHERE id_les = $idles"); ?>
                            <?php $test[$e] = 1 ?>
                            S<?= $d++ ?> =
                            <?php foreach ($bobot as $pembobot) : ?>
                                <?php $idbobot = $pembobot["id_kriteria"] ?>
                                <?php $kriteria = Index("SELECT * FROM kriteria WHERE id_kriteria = $idbobot"); ?>
                                <?php foreach ($kriteria as $bagibobot) : ?>
                                    <?php $maxkriteria = Index("SELECT SUM(bobot) AS Total FROM kriteria"); ?>
                                    <?php foreach ($maxkriteria as $TotalLah) : ?>
                                        <?php if ($bagibobot["status"] == "COST") : ?>
                                            (<?= $pembobot["nilai"] . "<sup>" . round($bagibobot["bobot"] / $TotalLah["Total"], 3) * -1 . "</sup>" ?>)
                                            <?php $test[$e] = $test[$e] * pow($pembobot["nilai"], round($bagibobot["bobot"] / $TotalLah["Total"], 3) * -1) ?>
                                        <?php else : ?>
                                            (<?= $pembobot["nilai"] . "<sup>" . round($bagibobot["bobot"] / $TotalLah["Total"], 3) . "</sup>" ?>)
                                            <?php $test[$e] = $test[$e] * pow($pembobot["nilai"], round($bagibobot["bobot"] / $TotalLah["Total"], 3)) ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            <?php endforeach ?>
                            =
                            <?= round($test[$e], 3) ?>
                            <?php $totalS = $totalS + $test[$e] ?>
                            <?php $e++ ?>
                            <br>
                        <?php endforeach ?>
                        <hr>

                        <!-- BAGIAN 3 -->
                        <h4 class="subtitle">Bagian 3 : Mencari Nilai V (V)</h4>
                        <?php $f = 1 ?>
                        <?php $g = 0 ?>
                        <?php foreach ($test as $row) : ?>
                            <p>V<?= $f++ ?> = <?= round($test[$g], 3) . "/" . round($totalS, 3) ?>
                                = <?= round(round($test[$g], 3) / round($totalS, 3), 3) ?></p>
                            <?php $g++ ?>
                        <?php endforeach ?>
                        <hr>

                        <!-- HASIL -->
                        <h4 class="subtitle">Hasil</h4>
                        <div class="table-container">
                            <table class="table is-fullwidth">
                                <thead class="has-background-ifo">
                                    <tr>
                                        <th class="has-text-white">No</th>
                                        <th class="has-text-white">Alternatif</th>
                                        <th class="has-text-white">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $h = 1 ?>
                                    <?php $i = 0 ?>
                                    <?php $j = 0 ?>
                                    <?php foreach ($alternatif as $row) : ?>
                                        <?php $varV[$j] = 1 ?>
                                        <?php $varV[$j] = $test[$i] / $totalS ?>
                                        <tr>
                                            <th><?= $h++ ?></th>
                                            <td><?= $row["nm_les"] ?></td>
                                            <td><?= round(round($test[$i], 3) / round($totalS, 3), 3) ?></td>
                                        </tr>
                                        <?php $i++ ?>
                                        <?php $j++ ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <hr>

                            <!-- RANKING -->
                            <div id="ranking-section">
                                <h4 class="subtitle">Ranking</h4>
                                <div class="table-container">
                                    <table class="table is-fullwidth">
                                        <thead class="has-background-maroon">
                                            <tr>
                                                <th class="has-text-white">Ranking</th>
                                                <th class="has-text-white">Alternatif</th>
                                                <th class="has-text-white">Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $h = 1;
                                            $i = 0;
                                            $j = 0;
                                            $varV = array();
                                            foreach ($alternatif as $row) {
                                                $varV[$j] = $test[$i] / $totalS;
                                                $i++;
                                                $j++;
                                            }
                                            arsort($varV);
                                            $i = 0;
                                            ?>
                                            <?php foreach ($varV as $key => $value) : ?>
                                                <tr>
                                                    <th><?= ++$i ?></th>
                                                    <td><?= $alternatif[$key]["nm_les"] ?></td>
                                                    <td><?= round($value, 3) ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- PRINT BUTTON -->
                            <div class="mt-4">
                                <button class="button is-maroon" onclick="printRanking()">Print Ranking</button>
                            </div>

                            <!-- JAVASCRIPT -->
                            <script>
                                function printRanking() {
                                    const printContents = document.getElementById("ranking-section").innerHTML;
                                    const originalContents = document.body.innerHTML;
                                    document.body.innerHTML = printContents;
                                    window.print();
                                    document.body.innerHTML = originalContents;
                                }
                            </script>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
</body>
</html>