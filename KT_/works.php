<?php
$data = array_map('str_getcsv', file('data.csv'), array_fill(0, count(file('data.csv')), ';'));

$data[2] = array_map('trim', $data[2]);

$title = $data[2][0];
$text1 = $data[2][1];
$text2 = $data[2][2];
$text3 = $data[2][3];
$text4 = $data[2][4];
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP KT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div>
                <a class="navbar-brand fw-bold" href=".">SteverHeinsaar.ee</a>
            </div>
            <div style="padding-left: 500px;">
                <ul class="navbar-nav">
                    <a class="nav-link" href="index.php?leht=avaleht">Avaleht</a>
                    <a class="nav-link" href="index.php?leht=works">Tehtud tööd</a>
                    <a class="nav-link" href="index.php?leht=skills">Oskused</a>
                    <a class="nav-link" href="index.php?leht=contact">Kontakt</a>
                    <a class="nav-link" href="index.php?leht=admin">Admin</a>
                </ul>
            </div>
        </nav>

        <div class="text-center container mt-5 ">
            <div class="row">
                <div class="text-md-center">
                    <h1><?= ($title) ?></h1>
                </div>
                <div class="text-md-start">
                    <i class="fa-solid fa-asterisk"></i><p><?= ($text1) ?></p>
                </div>
</body>
</html>