<!--Stever Heinsaar
07.03.2025 -->

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Harjutus 9</h1>
        <h3>Tervitus:</h3>
        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Nimi</label>
                <input type="text" class="form-control" name="nimi">
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>

        <?php
            if (isset($_GET['nimi'])) {
                $nimi = $_GET['nimi'];
                $nimi = ucfirst(strtolower($nimi));
                echo 'Tere, ' . $nimi . '!';
            }
        ?>

        <br>
        <h3>Tükeldamine:</h3>
        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Tekst</label>
                <input type="text" class="form-control" name="tekst">
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>

        <?php
            if (isset($_GET["tekst"])) {
                $tekst = $_GET["tekst"];
                $tekst = strtoupper($tekst);
                $tekst = str_split($tekst);
                $tekst = implode(".", $tekst);
                echo $tekst;
            }
        ?>

        <br>
        <h3>Ropud sõnad:</h3>
        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Sisesta tekst</label>
                <p class="text-muted">Ropud sõnad on: noob, loll, jobu, tatt</p>
                <input type="text" class="form-control" name="ropp">
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>

        <?php
            $asendus = array("noob", "loll", "jobu", "tatt");
            if (isset($_GET["ropp"])) {
                $ropp = $_GET["ropp"];
                $ropp = str_replace($asendus, "****", $ropp);
                echo $ropp;
            }
        ?>

        <br>
        <h3>Email:</h3>
        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Eesnimi</label>
                <input type="text" class="form-control" name="eesnimi">
            </div>
            <div class="mb-3">
                <label class="form-label">Perenimi</label>
                <input type="text" class="form-control" name="perenimi">
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>

        <?php
            if (isset($_GET["eesnimi"]) && isset($_GET["perenimi"])) {
                $eesnimi = strtolower($_GET["eesnimi"]);
                $perenimi = strtolower($_GET["perenimi"]);
                
                $vahetus = array(
                    'ä' => 'a', 'Ä' => 'a',
                    'ö' => 'o', 'Ö' => 'o',
                    'ü' => 'y', 'Ü' => 'y',
                    'õ' => 'o', 'Õ' => 'o'
                );
                
                $eesnimi = strtr($eesnimi, $vahetus);
                $perenimi = strtr($perenimi, $vahetus);
                
                $email = $eesnimi . '.' . $perenimi . '@hkhk.edu.ee';
                echo $email;
            }
        ?>
    </div>
</body>
</html>