<?php
// Read CSV file
$data = array_map('str_getcsv', file('data.csv'), array_fill(0, count(file('data.csv')), ';'));

// Extract content
$data[0] = array_map('trim', $data[0]);
$data[1] = array_map('trim', $data[1]);

$image1 = $data[0][0];
$title1 = $data[0][1];
$subtitle1 = $data[0][2];
$text1 = $data[0][3];

$image2 = $data[1][0];
$title2 = $data[1][1];
$subtitle2 = $data[1][2];
$text2 = $data[1][3];
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaleht</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div>
            <a class="navbar-brand fw-bold" href=".">SteverHeinsaar</a>
        </div>
        <div style="padding-left: 500px;">
            <ul class="navbar-nav">
                <a class="nav-link" href="index.php?leht=avaleht">Avaleht</a>
                <a class="nav-link" href="index.php?leht=tehtud_tood">Tehtud tööd</a>
                <a class="nav-link" href="index.php?leht=oskused">Oskused</a>
                <a class="nav-link" href="index.php?leht=kontakt">Kontakt</a>
                <a class="nav-link" href="index.php?leht=admin">Admin</a>
            </ul>
        </div>
    </nav>
    
    <div class="text-center container mt-5 ">
        <div class="row align-items-center">
            <div class="column left col-md-6 text-md-start">
                <h1><?= ($title1) ?></h1>
                <h4 class="text-secondary"> <?= ($subtitle1) ?> </h4>
                <p class="text-muted"><?= ($text1) ?></p>
                <a href="#" class="btn btn-primary">Palka mind <i class="fas fa-paper-plane"></i></a>
            </div>
            <div class="column right col-md-6">
                <img src="<?= ($image1) ?>" alt="Profile" class="profile_img img-fluid rounded-circle">
            </div>
        </div>
    </div>
    
    <div class="container mt-5 text-center">
        <h2><?= ($title2) ?></h2>
        <h6 class="text-secondary"> <?= ($subtitle2) ?> </h6>
        <div class="row align-items-start mt-5">
            <div class="col-md-6 text-end pe-5">
                <img src="<?= ($image2) ?>" alt="Nerd" class="nerd_img img-fluid rounded">
            </div>
            <div class="col-md-6 text-md-start">
                <p class="text-muted"><?= ($text2) ?></p>
                <div class="d-flex text-center mt-4">
                    <div style="font-size: small;" class="me-5 text-muted"><strong style="font-size: 22px; color: black;">1+</strong><br>aastat<br>kogemust</div>
                    <div style="font-size: small;" class="me-5 text-muted"><strong style="font-size: 22px; color: black;">2+</strong><br>projekti<br>lõpetanud</div>
                    <div style="font-size: small;" class="me-5 text-muted"><strong style="font-size: 22px; color: black;">0</strong><br>ettevõttes<br>töötanud</div>
                </div>
                <a href="#" class="btn btn-primary mt-3">Lae alla CV <i class="fas fa-download"></i></a>
            </div>
        </div>
    </div>
    
    <footer class="text-center mt-5 py-3">
        &copy; SteverHeinsaar
    </footer>
</body>
</html>