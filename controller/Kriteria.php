<?php
// Periksa apakah fungsi Koneksi() sudah ada sebelumnya
if (!function_exists('Koneksi')) {
    // Deklarasikan fungsi Koneksi() jika belum ada
    function Koneksi() {
        return mysqli_connect("localhost", "root", "", "tubes_spk");
    }
}

// Periksa apakah fungsi Index() sudah ada sebelumnya
if (!function_exists('Index')) {
    // Deklarasikan fungsi Index() jika belum ada
    function Index($query) {
        // Implementasi fungsi Index()
        $koneksi = Koneksi();
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

// Periksa apakah fungsi Add() sudah ada sebelumnya
if (!function_exists('Add')) {
    // Deklarasikan fungsi Add() jika belum ada
    function Add($table, $data) {
        $koneksi = Koneksi();
        $id = htmlspecialchars($data["id"]);
        $tempatles = htmlspecialchars($data["nama"]);
        $query = "INSERT INTO $table VALUES (null, '$id', '$tempatles')";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
}

// Periksa apakah fungsi Edit() sudah ada sebelumnya
if (!function_exists('Edit')) {
    // Deklarasikan fungsi Edit() jika belum ada
    function Edit($table, $data) {
        $koneksi = Koneksi();
        $id = htmlspecialchars($data["id"]);
        $tempatles = htmlspecialchars($data["nama"]);
        $query = "UPDATE $table SET id = '$id', nama = '$tempatles' WHERE id = $id";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
}

// Periksa apakah fungsi Delete() sudah ada sebelumnya
if (!function_exists('Delete')) {
    // Deklarasikan fungsi Delete() jika belum ada
    function Delete($table, $tableid, $id) {
        $koneksi = Koneksi();
        $query = "DELETE FROM $table WHERE $tableid = $id";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
}
