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
    $idalternatif = isset($data["id_alternatif"]) ? htmlspecialchars($data["id_alternatif"]) : '';
    $idkriteria = isset($data["id"]) ? htmlspecialchars($data["id"]) : '';
    $nilai = isset($data["nilai"]) ? htmlspecialchars($data["nilai"]) : '';
    
    $query = "INSERT INTO $table (id_alternatif, id, nilai) VALUES ('$idalternatif', '$idkriteria', '$nilai')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function Edit($table, $data)
{
    $koneksi = Koneksi();
    $idnilai = htmlspecialchars($data["id_nilai"]);
    $idalternatif = htmlspecialchars($data["id_alternatif"]);
    $idkriteria = htmlspecialchars($data["id"]);
    $nilai = htmlspecialchars($data["nilai"]);
    $query = "UPDATE $table SET id_alternatif= '$idalternatif', id = '$idkriteria', nilai = '$nilai' WHERE id_nilai = $idnilai";

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
