<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&family=PT+Sans&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <style>
        body {
            font-family: 'Josefin Sans', sans-serif;
            background-color: #f8f9fa;
        }

        nav {
            background-color: #343a40;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            color: white;
            font-weight: bold;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-end;
        }

        .menu li {
            margin: 0 15px;
            position: relative;
        }

        .menu li a {
            color: white;
            text-decoration: none;
            font-family: 'PT Sans', sans-serif;
            font-size: 16px;
            transition: color 0.3s;
        }

        .menu li a:hover {
            color: #ffc107;
        }

        .menu li a i {
            margin-left: 8px;
            font-size: 12px;
            transition: transform 0.3s;
        }

        .menu li a:hover i {
            transform: rotate(90deg);
        }

        .menu li a .bi {
            margin-right: 8px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <nav class="d-flex justify-content-between align-items-center">
        <div class="logo">Tugas Konversi Mata Kuliah SPK</div>
        <ul class="menu">
            <li><a href="index.php"><i class="bi bi-house-door"></i> Home <i class="bi bi-chevron-right panah"></i></a></li>
            <li><a href="kriteria.php"><i class="bi bi-list-task"></i> Kriteria <i class="bi bi-chevron-right panah"></i></a></li>
            <li><a href="alternatif.php"><i class="bi bi-graph-up"></i> Alternatif <i class="bi bi-chevron-right panah"></i></a></li>
            <li><a href="bobot_kriteria.php"><i class="bi bi-sliders"></i> Perbandingan Kriteria <i class="bi bi-chevron-right panah"></i></a></li>
            <li><a href="hitung_alternatif.php"><i class="bi bi-calculator"></i> Hitung Alternatif <i class="bi bi-chevron-right panah"></i></a></li>
            <li><a href="hasil.php"><i class="bi bi-trophy"></i> Ranking</a></li>
        </ul>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
