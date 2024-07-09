<?php
if (isset($_GET['halaman'])) {
    $halaman = $_GET['halaman'];

    switch ($halaman) {
        case 'home':
            include "home/index.php";
            break;
        case 'databobot':
            include "hitung_alternatif.php";
            break;
        case 'tambahdatabobot':
            include "pembobotan/add.php";
            break;
        case 'editdatabobot':
            include "pembobotan/edit.php";
            break;
        case 'hapusdatabobot':
            include "pembobotan/delete.php";
            break;
        case 'datapenilaian':
            include "hasil.php";
            break;
    }
} else {
    include "home/index.php";
}
