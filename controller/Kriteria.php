<?php
function Koneksi()
{
    return mysqli_connect("localhost", "root", "", "belajar");
}

function Index($query)
{
    $koneksi = Koneksi();
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function Add($table, $data)
{
    $koneksi = Koneksi();

    // Amankan input
    $kode = isset($data["kriteria_kode"]) ? htmlspecialchars($data["kriteria_kode"]) : '';
    $tempatles = isset($data["nm_kriteria"]) ? htmlspecialchars($data["nm_kriteria"]) : '';
    $bobot = isset($data["bobot"]) ? htmlspecialchars($data["bobot"]) : '';
    $status = isset($data["status"]) ? htmlspecialchars($data["status"]) : '';

    // Query insert
    $query = "INSERT INTO $table VALUES (null, '$kode', '$tempatles', '$bobot', '$status')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Edit($table, $data)
{
    $koneksi = Koneksi();
    $idkriteria = htmlspecialchars($data["id_kriteria"]);
    $kode = htmlspecialchars($data["kriteria_kode"]);
    $tempatles = htmlspecialchars($data["nm_kriteria"]);
    $bobot = htmlspecialchars($data["bobot"]);
    $status = htmlspecialchars($data["status"]);

    // Query update
    $query = "UPDATE $table SET kriteria_kode = '$kode', nm_kriteria = '$tempatles', bobot = '$bobot', status = '$status' WHERE id_kriteria = $idkriteria";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Delete($table, $tableid, $id)
{
    $koneksi = Koneksi();

    // Prepare the SQL statement
    $stmt = mysqli_prepare($koneksi, "DELETE FROM $table WHERE $tableid = ?");
    
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, 'i', $id); // Assuming $id is an integer

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Check for errors
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $result = mysqli_stmt_affected_rows($stmt);
    } else {
        $result = 0; // No rows affected
    }

    // Close the statement
    mysqli_stmt_close($stmt);
    
    // Close the connection
    mysqli_close($koneksi);

    return $result;
}
?>
