<?php
$data = array_map('str_getcsv', file('data.csv'), array_fill(0, count(file('data.csv')), ';'));

$data[3] = array_map('trim', $data[3]);

$image = $data[3][0];
$title = $data[3][1];
$text1 = $data[3][2];
$text2 = $data[3][3];
$text3 = $data[3][4];
$text4 = $data[3][5];
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
    <style>
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
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?leht=avaleht">Avaleht</a>
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

        <div class="container mt-5">
            <div class="row">
                <div class="col text-center">
                    <h1><?php echo $title; ?></h1>
                </div>
            </div>
            <br>
            <div class="row mt-4">
                <div class="col-md-6">
                    <p><i class="fas fa-asterisk"></i> <?php echo $text1; ?></p>
                    <p><i class="fas fa-asterisk"></i> <?php echo $text2; ?></p>
                    <p><i class="fas fa-asterisk"></i> <?php echo $text3; ?></p>
                    <p><i class="fas fa-asterisk"></i> <?php echo $text4; ?></p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="<?php echo $image; ?>" alt="Hacker" class="img-fluid rounded">
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <footer class="text-center mt-5 py-3">
            &copy; SteverHeinsaar
            <a href="#top" class="scroll-to-top">
                <i class="fas fa-arrow-up"></i>
            </a>
        </footer>

</body>
</html>