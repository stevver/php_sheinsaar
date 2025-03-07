<!--Stever Heinsaar
07.03.2025 -->

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Harjutus 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Harjutus 7</h1>
        <h3>Tervitus:</h3>
        <?php
            function tervitus() {
                echo "Tere päiksekesekene!";
            }
            tervitus();
        ?>

        <br>
        <h3>Liitu uudiskirjaga:</h3>
        <?php
            function uudiskiri() {
                return '<form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Liitu</button>
                </form>';
            }
            echo uudiskiri();
        ?>

        <br>
        <h3>Kasutajanimi ja email:</h3>
        <form action="" method="get">
                <div class="mb-3">
                    <label class="form-label">Kasutajanimi</label>
                    <input type="text" class="form-control" name="kasutaja">
                </div>
                <button type="submit" class="btn btn-primary">Saada</button>
            </form>
        <?php
            function kasutaja($kas_nimi) {
                $kas_nimi = strtolower($kas_nimi);
                $kas_email = "$kas_nimi@hkhk.edu.ee";
                $kood = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 7);
                echo "Kasutajanimi: $kas_nimi<br>";
                echo "Email: $kas_email<br>";
                echo "Kood: $kood";
            }
            if (isset($_GET['kasutaja'])) {
                kasutaja($_GET['kasutaja']);
            }
        ?>

        <br>
        <h3>Arvud:</h3>
        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Arv 1</label>
                <input type="number" class="form-control" name="arv1">
            </div>
            <div class="mb-3">
                <label class="form-label">Arv 2</label>
                <input type="number" class="form-control" name="arv2">
            </div>
            <div class="mb-3">
                <label class="form-label">Sammupikkus</label>
                <input type="number" class="form-control" name="samm">
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>
        <?php
            function arvud($arv1, $arv2, $samm) {
                for ($arv = $arv1; $arv <= $arv2; $arv += $samm) {
                    echo "$arv ";
                    echo ", ";
                }

            }

            if (isset($_GET['arv1'], $_GET['arv2'], $_GET['samm'])) {
                $arv1 = $_GET['arv1'];
                $arv2 = $_GET['arv2'];
                $samm = $_GET['samm'];
                arvud($arv1, $arv2, $samm);
            }
        ?>

        <br>
        <h3>Ristküliku pindala:</h3>
        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Külg 1</label>
                <input type="number" class="form-control" name="kulg1">
            </div>
            <div class="mb-3">
                <label class="form-label">Külg 2</label>
                <input type="number" class="form-control" name="kulg2">
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>

        <?php
            function pindala($kulg1, $kulg2) {
                $pindala = $kulg1 * $kulg2;
                echo "Pindala on $pindala ruutühikut.";
            }

            if (isset($_GET['kulg1'], $_GET['kulg2'])) {
                $kulg1 = $_GET['kulg1'];
                $kulg2 = $_GET['kulg2'];
                pindala($kulg1, $kulg2);
            }
        ?>

        <br>
        <h3>Isikukood:</h3>
        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Isikukood</label>
                <input type="text" class="form-control" name="isikukood">
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>

        <?php
            function isikukood($isikukood){
                $isikukood = strval($isikukood);
                if(strlen($isikukood) == 11){
                    $sugu = substr($isikukood, 0, 1);
                    if($sugu % 2 == 0){
                        $sugu = "Naine";
                    }else{
                        $sugu = "Mees";
                    }
                    $paev = substr($isikukood, 5, 2);
                    $kuu = substr($isikukood, 3, 2);
                    $aasta = substr($isikukood, 1, 2);
                    if($aasta > date("y")){
                        $aasta = "19" . $aasta;
                    }else{
                        $aasta = "20" . $aasta;
                    }
                    $synnipaev = $paev . "." . $kuu . "." . $aasta;
                    echo "Sugu: $sugu<br>";
                    echo "Sünnipäev: $synnipaev";
                }else{
                    echo "Isikukood peab olema 11-kohaline!";
                }
            }

            if (isset($_GET['isikukood'])) {
                isikukood($_GET['isikukood']);
            }
        ?>

        <br>
        <h3>Head mõtted:</h3>
        <?php
            function motted(){
                $alus = array("Tarkus", "Õnn", "Armastus");
                $oeldis = array("on", "tuleb", "läheb");
                $sihitis = array("kõigil", "varsti", "minema");
                $sona1 = $alus[array_rand($alus)];
                $sona2 = $oeldis[array_rand($oeldis)];
                $sona3 = $sihitis[array_rand($sihitis)];
                echo "$sona1 $sona2 $sona3.";
            }
            motted();
        ?>
    </div>
</body>
</html>