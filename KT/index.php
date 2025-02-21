<?php
include 'functions.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$data = getDataFromCSV('data.csv');
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="index.php">SteverHeinsaar.ee</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Avaleht</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/works.php">Tehtud tööd</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/skills.php">Oskused</a></li>
                        <li class="nav-item"><a class="nav-link" href="pages/contact.php">Kontakt</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <h1 class="fw-bold text-wrap" style="width: 12rem;"><?= $data[0]['title'] ?></h1>
                <h4 class="text-secondary"><?= $data[0]['subtitle'] ?></h4>
                <p class="text-wrap text-muted" style="width: 20rem;"><?= $data[0]['text'] ?></p>
                <a href="#" class="btn btn-primary mt-3">Palka mind</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="<?= $data[0]['image'] ?>" alt="Profile Image" class="profile-img img-fluid rounded-circle" style="object-fit: cover;">
            </div>
        </div>
    </main>

    <main class="container mt-5">
        <h1 class="fw-bold"><?= $data[1]['title'] ?></h1>
        <h4 class="text-secondary"><?= $data[1]['subtitle'] ?></h4>
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <img src="<?= $data[1]['image'] ?>" alt="Nerd Image" class="nerd-img img-fluid" style="object-fit: cover;">
            </div>
            <div class="col-md-6 text-center text-md-start">
                <p class="text-wrap text-muted" style="width: 20rem;"><?= $data[1]['text'] ?></p>
                <a href="#" class="btn btn-primary mt-3">Lae alla CV</a>
            </div>
        </div>
    </main>

    <footer class="text-center mt-5 p-5 text-white" style="background-color: #5023f3cf;">
        © <?= date("Y") ?> SteverHeinsaar.ee
    </footer>
</body>
</html>