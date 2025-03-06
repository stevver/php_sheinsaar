<?php
$data = array_map('str_getcsv', file('data.csv'), array_fill(0, count(file('data.csv')), ';'));

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
    <title>PHP KT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .box{
            width: 250px;
            height: 250px;
            background: #08aeea50 url(images/profile.jpg) no-repeat;
                background-size: cover;
                background-position: top -10px center;
                background-blend-mode: normal;
            animation: morph 15s ease-in-out infinite;
        }

        @keyframes morph {
            0%{
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }
            50%{
                border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
            }
            100%{
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }
        }

        html {
            scroll-behavior: smooth;
        }

        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            color: #c3c3c3;
            font-size: 20px;
            text-decoration: none;
        }

        .scroll-to-top:hover {
            color: #a4a4a4;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand fw-bold me-auto" href=".">SteverHeinsaar.ee</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?leht=avaleht">Avaleht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?leht=works">Tehtud tööd</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?leht=skills">Oskused</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?leht=contact">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?leht=admin">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <br>
    <br>
    <br>
    
    <div class="text-center container mt-5 ">
        <div class="row align-items-center">
            <div class="col-md-4 offset-md-1 text-md-start">
                <h1><?= ($title1) ?></h1>
                <h4 class="text-secondary"> <?= ($subtitle1) ?> </h4>
                <p class="text-muted"><?= ($text1) ?></p>
                <a href="#" class="btn btn-primary py-2 mb-3">Palka mind <i class="fas fa-paper-plane"></i></a>
            </div>
            <div class="col-md-4 d-flex justify-content-center offset-md-1">
                <div class="box"></div>
            </div>
        </div>
    </div>
    
    <div class="container mt-5 text-center">
        <h2><?= ($title2) ?></h2>
        <h6 class="text-secondary"> <?= ($subtitle2) ?> </h6>
        <div class="row align-items-start mt-5">
            <div class="col-md-5 text-start offset-md-1">  
                <img src="<?= ($image2) ?>" alt="Nerd" class="nerd_img img-fluid rounded">
            </div>
            <div class="col-md-4 text-md-start">
                <p class="text-muted"><?= ($text2) ?></p>
                <div class="d-flex justify-content-center text-center mt-4">
                    <div style="font-size: small;" class="me-5 text-muted"><strong style="font-size: 22px; color: black;">1+</strong><br>aastat<br>kogemust</div>
                    <div style="font-size: small;" class="me-5 text-muted"><strong style="font-size: 22px; color: black;">2+</strong><br>projekti<br>lõpetanud</div>
                    <div style="font-size: small;" class="me-5 text-muted"><strong style="font-size: 22px; color: black;">0</strong><br>ettevõttes<br>töötanud</div>
                </div>
                <a href="download.php" class="btn btn-primary mt-3 py-2">Lae alla CV <i class="fas fa-download"></i></a>
            </div>
        </div>
    </div>
    
    <footer class="text-center mt-5 py-3">
        &copy; SteverHeinsaar
        <a href="#top" class="scroll-to-top">
            <i class="fas fa-arrow-up"></i>
        </a>
    </footer>
</body>
</html>