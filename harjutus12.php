<!--Stever Heinsaar
07.03.2025 -->

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Harjutus 12</h1>
        <h3>Sõiduaeg:</h3>
        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Algus aeg</label>
                <input type="text" class="form-control" name="algus" placeholder="hh:mm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lõpp aeg</label>
                <input type="text" class="form-control" name="lopp" placeholder="hh:mm" required>
            </div>
            <button type="submit" class="btn btn-primary">Arvuta</button>
        </form>

        <?php
            if (isset($_GET['algus'], $_GET['lopp'])) {
                $algus = $_GET['algus'];
                $lopp = $_GET['lopp'];
                $algus = explode(":", $algus);
                $lopp = explode(":", $lopp);
                $algus = $algus[0] * 60 + $algus[1];
                $lopp = $lopp[0] * 60 + $lopp[1];
                $soiduaeg = $lopp - $algus;
                $tunnid = floor($soiduaeg / 60);
                $minutid = $soiduaeg % 60;
                echo 'Sõiduaeg: ' . $tunnid . ' tundi ja ' . $minutid . ' minutit';
            }
        ?>

        <br>
        <h3>Palkade võrdlus:</h3>

        <?php
            $allikas = 'tootajad.csv';
            $fail = fopen($allikas, 'r');
            $meeste_palk = 0;
            $naiste_palk = 0;
            $meeste_arv = 0;
            $naiste_arv = 0;
            $meeste_max = 0;
            $naiste_max = 0;

            while (($rida = fgetcsv($fail, 1000, ';')) !== false) {
                if (count($rida) < 3) {
                    continue;
                }
                $nimi = $rida[0];
                $sugu = $rida[1];
                $palk = $rida[2];
                if ($sugu == 'm') {
                    $meeste_palk += $palk;
                    $meeste_arv++;
                    if ($palk > $meeste_max) {
                        $meeste_max = $palk;
                    }
                } elseif ($sugu == 'n') {
                    $naiste_palk += $palk;
                    $naiste_arv++;
                    if ($palk > $naiste_max) {
                        $naiste_max = $palk;
                    }
                }
            }
            fclose($fail);

            $meeste_keskmine = $meeste_palk / $meeste_arv;
            $naiste_keskmine = $naiste_palk / $naiste_arv;

            echo 'Meeste keskmine palk: ' . round($meeste_keskmine) . ' €<br>';
            echo 'Meeste maksimaalne palk: ' . $meeste_max . ' €<br>';
            echo '<br>';
            echo 'Naiste keskmine palk: ' . round($naiste_keskmine) . ' €<br>';
            echo 'Naiste maksimaalne palk: ' . $naiste_max . ' €<br>';
            echo '<br>';
            echo '<p>Diskrimineerimine: ';
            if (abs($meeste_keskmine - $naiste_keskmine) > 100) {
                echo 'Jah';
            } else {
                echo 'Ei';
            }
        ?>
    </div>
</body>
</html>