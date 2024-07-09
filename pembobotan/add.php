<?php
require("../controller/bobot_alternatif.php");

$alternatif = Index("SELECT * FROM alternatif");
$kriteria = Index("SELECT * FROM kriteria");

if (isset($_POST["add"])) {
    if (Add("pembobotan", $_POST) > 0) {
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
            window.location.href = 'hitung_alternatif.php';
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
            window.location.href = 'hitung_alternatif.php';
        });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Pembobotan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
    <section class="d-flex align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Form Tambah Pembobotan</h5>
                            <a class="btn btn-light btn-sm" href="../hitung_alternatif.php">
                                <i class="bi bi-arrow-left-circle mr-2"></i>Kembali
                            </a>
                        </div>
                        <div class="card-body">
                            <form action="add.php" method="post">
                                <div class="mb-3">
                                    <label for="id_alternatif" class="form-label">Data Alternatif</label>
                                    <div class="input-group">
                                        <select class="form-select" id="id_alternatif" name="id_alternatif" required>
                                            <option selected disabled>Pilih Alternatif</option>
                                            <?php foreach ($alternatif as $row) : ?>
                                                <option value="<?= $row["id_alternatif"] ?>"><?= $row["nama"] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <span class="input-group-text"><i class="bi bi-chevron-down"></i></span>
                                    </div>
                                </div>

                                
                                <div class="mb-3">
                                    <label for="id_kriteria" class="form-label">Data Kriteria</label>
                                    <div class="input-group">
                                        <select class="form-select" id="id_kriteria" name="id" required>
                                            <option selected disabled>Pilih Kriteria</option>
                                            <?php foreach ($kriteria as $row) : ?>
                                                <option value="<?= $row["id"] ?>"><?= $row["nama"] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <span class="input-group-text"><i class="bi bi-chevron-down"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nilai" class="form-label">Nilai</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="nilai" placeholder="Nilai untuk setiap alternatif" name="nilai" required>
                                        <span class="input-group-text"><i class="bi bi-bar-chart-line"></i></span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-success me-2" type="submit" name="add">
                                        <i class="bi bi-save mr-2"></i>Simpan
                                    </button>
                                    <button class="btn btn-secondary" type="reset">
                                        <i class="bi bi-arrow-clockwise mr-2"></i>Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
