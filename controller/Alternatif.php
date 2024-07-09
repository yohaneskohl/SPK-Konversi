<?php
function Koneksi()
{
    return mysqli_connect("localhost", "root", "", "tubes_spk");
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
    $id_alternatif = htmlspecialchars($data["id_alternatif"]);
    $tempatles = htmlspecialchars($data["nama"]);
    $query = "INSERT INTO $table VALUES (null, '$id_alternatif', '$tempatles')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Edit($table, $data)
{
    $koneksi = Koneksi();
    $id_alternatif = htmlspecialchars($data["id_alternatif"]);
    $nama_alternatif = htmlspecialchars($data["nama"]);
    $query = "UPDATE $table SET id_alternatif = '$id_alternatif', nama = '$nama_alternatif' WHERE id_alternatif = $id_alternatif";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Delete($table, $tableid, $id)
{
    $koneksi = Koneksi();
    $query = "DELETE FROM $table WHERE $tableid = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
