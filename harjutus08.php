<!--Stever Heinsaar
07.03.2025 -->

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Harjutus 8</h1>
        <h3>Kuupäev ja kellaaeg:</h3>
        <?php
            date_default_timezone_set('Europe/Tallinn');
            echo date('d.m.Y H:i');
        ?>

        <br>
        <h3>Vanus:</h3>
        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Sünniaasta</label>
                <input type="number" class="form-control" name="aasta">
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>
        <?php
            function vanus($aasta) {
                $vanus = date('Y') - $aasta;
                echo "Saate või olete $vanus aastat vana.";
            }
            if (isset($_GET['aasta'])) {
                vanus($_GET['aasta']);
            }
        ?>

        <br>
        <h3>Kooliaasta lõpuni:</h3>
        <?php
            $tana = date('d.m.Y');
            $koolilopp = date('20.06.Y');
            $paevi = strtotime($koolilopp) - strtotime($tana);
            $paevi = round($paevi / (60 * 60 * 24));
            echo "Kooliaasta lõpuni on $paevi päeva.";
        ?>

        <br>
        <?php
            $kuu = date('n');

            if ($kuu == 12 || $kuu == 1 || $kuu == 2) {
                $aastaaeg = 'talv';
            } elseif ($kuu >= 3 && $kuu <= 5) {
                $aastaaeg = 'kevad';
            } elseif ($kuu >= 6 && $kuu <= 8) {
                $aastaaeg = 'suvi';
            } else {
                $aastaaeg = 'sugis';
            }

            echo "<h3>Aastaaeg on: $aastaaeg</h3>";
            echo "<img src='img/{$aastaaeg}.jpg' alt='{$aastaaeg}'>";
        ?>
    </div>
</body>
</html>